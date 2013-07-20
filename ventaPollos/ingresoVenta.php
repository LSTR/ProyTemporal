<?php
require("autoCarga.php");

$idVenta = $_GET['venta'];

$cliente = $_POST['cliente'];
$camal = $_POST['camal'];
$diaVenta = $_POST['diaVenta'];
$mesVenta = $_POST['mesVenta'];
$yearVenta = $_POST['yearVenta'];
$pelada = $_POST['pelada'];

if (!checkdate($mesVenta, $diaVenta, $yearVenta)) {
	header("Location: ".$_SERVER['HTTP_REFERER']);
}
$fechaVenta =  mktime(0, 0, 0, $mesVenta, $diaVenta, $yearVenta);


$array[0] = $_POST['tipoPollo'];
$array[1] = $_POST['proveedor'];
$array[2] = $_POST['cantidadDet'];
$array[3] = $_POST['pesoPesadaDet'];
$array[4] = $_POST['pesoJavaDet'];

//Buscamos por filas con valores nulos
$indicesVacios = array();
for ($i = 0; $i < count($array[3]); $i++) {
	if (!$array[3][$i] || strlen(trim($array[3][$i])) == 0) {
		$indicesVacios[] = $i;
	}
}

//Convertir a array detalleProducto
$detalleProducto = array();

for($i = 0; $i < count($array[3]); $i++) {
	for ($j = 0; $j < count($array); $j++) {
		$detalleProducto[$i][$j] = $array[$j][$i];
	}
}
//echo count($detalleProducto)."<br />";
//Eliminamos las filas que tienen valores vacios
foreach ($indicesVacios as $indice) {
	unset($detalleProducto[$indice]);
}

//Procedemos a ingresar la venta
$venta = new Venta();
$detalleVenta = new DetalleVenta();

if (isset($idVenta) && strlen(trim($idVenta)) > 0) {
	//Estamos frente a una actualización
	$where = "idVenta = $idVenta";
	$venta->updateVenta($fechaVenta, $cliente, $camal, $pelada, $where);
	
	//Actualizamos ahora el detalle de la venta
	$item = 1;
	//echo count($detalleProducto)."<br />";
	foreach ($detalleProducto as $filaDetalle) {
		$idTipoPollo = $filaDetalle[0];
		$idProveedor = $filaDetalle[1];
		$cantidad = $filaDetalle[2];
		$pesoPesada = $filaDetalle[3];
		$pesoJava = $filaDetalle[4];
		$pesoNeto = $pesoPesada - $pesoJava;
		
		$whereDV = "idVenta = $idVenta AND item = $item";
		$rsDV = $detalleVenta->getDetalleVenta($whereDV);
		
		if ($rsDV->num_rows) {
			$detalleVenta->updateDetalleVenta($cantidad, $pesoPesada, $pesoJava,
										  $pesoNeto, $idTipoPollo, $idProveedor, $whereDV);
		}
		else {
			$detalleVenta->insertDetalleVenta($idVenta, $item, $cantidad, $pesoPesada,
											  $pesoJava, $pesoNeto, $idTipoPollo, $idProveedor);
		}
		$item++;
	}
}
else {
	$rsV = $venta->insertVenta($fechaVenta, $cliente, $camal, $pelada);
	
	$rsV = $rsV > 0 ? $rsV : 0;
	
	if ($rsV) {
		$idLastInsert = $venta->getInsertedId();	
		//Ingresamos ahora el detalle de la Venta	
		$item = 1;
		foreach ($detalleProducto as $filaDetalle) {
			$idTipoPollo = $filaDetalle[0];
			$idProveedor = $filaDetalle[1];
			$cantidad = $filaDetalle[2];
			$pesoPesada = $filaDetalle[3];
			$pesoJava = $filaDetalle[4];
			$pesoNeto = $pesoPesada - $pesoJava;
		
			$detalleVenta->insertDetalleVenta($idLastInsert, $item, $cantidad, $pesoPesada,
											  $pesoJava, $pesoNeto, $idTipoPollo, $idProveedor);
			$item++;
		}
	}
}

header("Location: ".$_SERVER['HTTP_REFERER']);
?>