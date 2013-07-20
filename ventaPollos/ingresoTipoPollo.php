<?php
require("autoCarga.php");
$generales = new Generales();

$nombreTipoPollo = $_POST['nombreTipoPollo'];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];

$idTipoPollo = $generales->verificaVariable($_GET['tipoPollo']);

$tipoPollo = new TipoPollo();

if ($idTipoPollo) {
	$where = "idTipoPollo = $idTipoPollo";
	$tipoPollo->updateTipoPollo($nombreTipoPollo, $descripcion, $estado, $where);
}
else {
	$tipoPollo->insertTipoPollo($nombreTipoPollo, $descripcion, $estado);
}
header("Location: ".$_SERVER['HTTP_REFERER']);
?>