<?php
require("autoCarga.php");

$numCompraUpdate = $_GET['compra'];

$numeroCompra = $_POST['numeroCompra'];
$proveedor = $_POST['proveedor'];
$diaCompra = $_POST['diaCompra'];
$mesCompra = $_POST['mesCompra'];
$yearCompra = $_POST['yearCompra'];
$estado = $_POST['estado'];

if (!checkdate($mesCompra, $diaCompra, $yearCompra)) {
	header("Location: ".$_SERVER['HTTP_REFERER']);
}
$fechaCompra =  mktime(0, 0, 0, $mesCompra, $diaCompra, $yearCompra);

$array[0] = $_POST['tipoPolloDet'];
$array[1] = $_POST['cantidadDet'];
$array[2] = $_POST['pesoDet'];
$array[3] = $_POST['precioUnitarioDet'];

//Convertir a array detalleProducto
$detalleProducto = array();

//Sacamos el igv Actual
$where = "estadoIgv = 1";
$igv = new Igv();
$rs = $igv->getIgv($where);
$row = $rs->fetch_assoc();
$idIgv = $row['idIgv'];
$valorIgv = $row['valor'];

//Buscamos por filas que tienen valores vacios
$indicesVacios = array();
foreach ($array[3] as $key => $value) {
	if (!$array[3][$key] || strlen(trim($array[3][$key])) == 0) {
		$indicesVacios[] = $key;
	}
}

for($i = 0; $i < count($array[3]); $i++) {
	for ($j = 0; $j < count($array); $j++) {
		$detalleProducto[$i][$j] = $array[$j][$i];
	}
}

//Eliminamos las filas que presentan valores nulos
foreach ($indicesVacios as $value) {
	unset($detalleProducto[$value]);
}


$compra = new Compra();
$detalleCompra = new DetalleCompra();

/*
 *Verificamos si estamos frente a un ingreso o a una actualización
 */
if (isset($numCompraUpdate) && strlen(trim($numCompraUpdate)) > 0) {
	$where = "idCompra = '$numCompraUpdate'";
	$rsC = $compra->updateCompra($numeroCompra, $proveedor, $fechaCompra, $estado, $idIgv, $where);
	
	//Actualizamos ahora el detalle de la compra
	$total = 0;
	foreach ($detalleProducto as $key => $filaDetalle) {
		$item = $key + 1;
		$idTipoPollo = $filaDetalle[0];
		$cantidad = $filaDetalle[1];
		$peso = $filaDetalle[2];
		$precioUnitario = $filaDetalle[3];		
		$subTotal = $peso * $precioUnitario;
		
		//Verificamos si existe el item en la tabla detalle
		//Si es asi actualizamos sino Insertamos
		$whereDC = "idCompra = '$numCompraUpdate' AND item = $item";
		$rsDC = $detalleCompra->getDetalleCompra($whereDC);
		
		if ($rsDC->num_rows) {
			//Estamos frente a una actualización
			$detalleCompra->updateDetalleCompra($numeroCompra, $idTipoPollo, $cantidad,
												$peso, $precioUnitario, $subTotal, $whereDC);
		}
		else {
			//Estamos frente a una insercion
			$detalleCompra->insertDetalleCompra($item, $numeroCompra, $idTipoPollo, $cantidad,
												$peso, $precioUnitario, $subTotal);
		}
		$total += $subTotal;
	}
	
	$igvAcumulado = $total * $valorIgv;	
	$compra->actualizaCompraIgvSubTotal($numeroCompra, $total, $igvAcumulado);	
}
else {
	$rsC = $compra->insertCompra($numeroCompra, $proveedor, $fechaCompra, $estado, $idIgv);

	//Ingresamos ahora el detalle de la Compra
	$rsC = $rsC > 0 ? $rsC : 0;
	
	if ($rsC) {
		
		$total = 0;
		foreach ($detalleProducto as $key => $filaDetalle) {
			$item = $key + 1;
			$idTipoPollo = $filaDetalle[0];
			$cantidad = $filaDetalle[1];
			$peso = $filaDetalle[2];
			$precioUnitario = $filaDetalle[3];		
			$subTotal = $peso * $precioUnitario;
			
			$detalleCompra->insertDetalleCompra($item, $numeroCompra, $idTipoPollo, $cantidad,
												$peso, $precioUnitario, $subTotal);
			
			$total += $subTotal;
		}
	
		$igvAcumulado = $total * $valorIgv;	
		$compra->actualizaCompraIgvSubTotal($numeroCompra, $total, $igvAcumulado);
	}//End if

}//End else

header("Location: ".$_SERVER['HTTP_REFERER']);
?>