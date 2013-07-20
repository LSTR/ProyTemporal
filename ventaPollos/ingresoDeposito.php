<?php
require("autoCarga.php");

//instanciamos la clase para el debugging del codigo
$firephp = FirePHP::getInstance(true);

//$motivo = $_GET['motivo'];
$idDeposito = $_GET['deposito'];

$diaDeposito = $_POST['diaDeposito'];
$mesDeposito = $_POST['mesDeposito'];
$yearDeposito = $_POST['yearDeposito'];

$tipoDeposito = $_POST['tipoDeposito'];

if (!checkdate($mesDeposito, $diaDeposito, $yearDeposito)) {
	header("Location: ".$_SERVER['HTTP_REFERER']);
}
$fechaDeposito =  mktime(0, 0, 0, $mesDeposito, $diaDeposito, $yearDeposito);


$array[0] = $_POST['tipoPolloDet'];
$array[1] = $_POST['proveedorDet'];
$array[2] = $_POST['cantidadDet'];
$array[3] = $_POST['pesoPesadaDet'];
$array[4] = $_POST['pesoJavaDet'];

//Buscamos valores nulos en el array
$indicesVacios = array();
for ($i = 0; $i < count($array[3]); $i++) {
	if (!$array[3][$i] || strlen(trim($array[3][$i])) == 0) {
		$indicesVacios[] = $i;
	}
}

//Configuramos el array detalleDeposito
$detalleDeposito = array();
for ($i = 0; $i < count($array[3]); $i++) {
	for ($j = 0; $j < count($array); $j++) {
		$detalleDeposito[$i][$j] = $array[$j][$i];
	}
}

//Eliminamos las filas que presentan valores vacios
for ($i = 0; $i < count($indicesVacios); $i++) {
	unset($detalleDeposito[$indicesVacios[$i]]);
}


//Realizamos primero la insercion en la tabla Deposito
$deposito = new Deposito();
$detDeposito = new DetalleDeposito();

if (isset($idDeposito) && strlen(trim($idDeposito)) > 0) {
	$where = "idDeposito = $idDeposito";
	$deposito->updateDeposito($fechaDeposito, $tipoDeposito, $where);
	
	foreach ($detalleDeposito as $key => $filaDetalle) {
		$item = $key + 1;
		$cantidad = $filaDetalle[2];
		$pesoBruto = $filaDetalle[3];
		$pesoJava = $filaDetalle[4];
		$pesoNeto = $pesoBruto - $pesoJava;
		$idProveedor = $filaDetalle[1];
		$idTipoPollo = $filaDetalle[0];
		
		$whereDD = "idDeposito = $idDeposito AND item = $item";
		$rsDD = $detDeposito->getDetalleDeposito($whereDD);
		
		if ($rsDD->num_rows) {
			//Estamos frente a una modificación del detalle
			$detDeposito->updateDetalleDeposito($cantidad, $pesoBruto, $pesoJava,
										  $pesoNeto, $idProveedor, $idTipoPollo, $whereDD);
		}
		else {
			//Estamos frente a una inserción en el detalle
			$detDeposito->insertDetalleDeposito($item, $idDeposito, $cantidad,
						  $pesoBruto, $pesoJava, $pesoNeto, $idProveedor, $idTipoPollo);
			
		}
	}
}
else {
	$rsD = $deposito->insertDeposito($fechaDeposito, $tipoDeposito);
	
	//Si se inserto, entonces procedemos a insertar el detalle deposito
	$rsD = $rsD > 0 ? $rsD : 0;
	if ($rsD) {
		for ($i = 0; $i < count($detalleDeposito); $i++) {
			$item = $i + 1;
			$idDeposito = $deposito->getInsertedId();
			$cantidad = $detalleDeposito[$i][2];
			$pesoBruto = $detalleDeposito[$i][3];
			$pesoJava = $detalleDeposito[$i][4];
			
			$pesoNeto = $pesoBruto - $pesoJava;
			
			$idProveedor = $detalleDeposito[$i][1];
			$idTipoPollo = $detalleDeposito[$i][0];
			
			$detDeposito->insertDetalleDeposito($item, $idDeposito, $cantidad,
						  $pesoBruto, $pesoJava, $pesoNeto, $idProveedor, $idTipoPollo);
		}
	}
}

header("Location: ".$_SERVER['HTTP_REFERER']);
?>