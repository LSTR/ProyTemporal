<?php
require("autoCarga.php");

@$tipoBus = $_GET['tipo'];

$deposito = new Deposito();
$detDeposito = new DetalleDeposito();

if ($_GET['diaBuscar']) {
	$dia = $_GET['diaBuscar'];
	$mes = $_GET['mesBuscar'];
	$year = $_GET['yearBuscar'];
	
	$fechaBuscar = mktime(0, 0, 0, $mes, $dia, $year);
	$where = "fecha = $fechaBuscar";
	
}
elseif($_GET['diaBuscarF']) {
	$diaF = $_GET['diaBuscarF'];
	$mesF = $_GET['mesBuscarF'];
	$yearF = $_GET['yearBuscarF'];
	
	$diaT = $_GET['diaBuscarT'];
	$mesT = $_GET['mesBuscarT'];
	$yearT = $_GET['yearBuscarT'];
	
	$fechaBuscarF = mktime(0, 0, 0, $mesF, $diaF, $yearF);
	$fechaBuscarT = mktime(0, 0, 0, $mesT, $diaT, $yearT);
	
	
	$where = "fecha >= $fechaBuscarF AND fecha < $fechaBuscarT";
}

$rs = $deposito->getDeposito($where);

if ($rs->num_rows) {
	
	$response = "{\"salidas\" : [";
	
	while ($row = $rs->fetch_assoc()) {
		$idDeposito = $row["idDeposito"];
		$fecha = date("d - m - Y", $row["fecha"]);
		$tipo = $row['tipo'];
		
		$whereDD = "idDeposito = $idDeposito";
		$rsDD = $detDeposito->getTotDetDeposito($whereDD);
		$rowDD = ($rsDD->num_rows) ? $rsDD->fetch_assoc() : NULL;
		if ($rowDD) {
			$cantidadT = round($rowDD['cantidad'], 2);
			$pesoT = round($rowDD['peso'], 2);
		}
		if ($tipo == "s") {
			$response .= "{\"idDeposito\" : \"$idDeposito\", \"fecha\" : \"$fecha\", \"cantidad\" : \"$cantidadT\", \"peso\" : \"$pesoT\"}, ";
		}
	}
	
	//$response = substr($response, 0, strlen($response) -2);
	$response .= "], \"ingresos\" : [";
	$rs->data_seek(0);
	while ($row = $rs->fetch_assoc()) {
		$idDeposito = $row["idDeposito"];
		$fecha = date("d - m - Y", $row["fecha"]);
		$tipo = $row['tipo'];
		
		$whereDD = "idDeposito = $idDeposito";
		$rsDD = $detDeposito->getTotDetDeposito($whereDD);
		$rowDD = ($rsDD->num_rows) ? $rsDD->fetch_assoc() : NULL;
		if ($rowDD) {
			$cantidadT = round($rowDD['cantidad'], 2);
			$pesoT = round($rowDD['peso'], 2);
		}
		if ($tipo == "i") {
			$response .= "{\"idDeposito\" : \"$idDeposito\", \"fecha\" : \"$fecha\", \"cantidad\" : \"$cantidadT\", \"peso\" : \"$pesoT\"}, ";
		}
	}
	
	//$response = substr($response, 0, strlen($response) -2);	
	$response .= "]}";
	echo $response;
}
	
?>