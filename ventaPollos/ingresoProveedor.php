<?php
require("autoCarga.php");
$generales = new Generales();

$idProveedor = $generales->verificaVariable($_GET['prov']);

$ruc = $_POST['ruc'];
$razonSocial = $_POST['razonSocial'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$fax = $_POST['fax'];
$estado = $_POST['estado'];

$estado = ($estado == 0) ? 0 : 1;

$proveedor = new Proveedor;

if (!$idProveedor) {
	$proveedor->insertProveedor($ruc, $razonSocial, $ciudad, $direccion, $telefono, $fax, $estado);
}
else {
	$where = "idProveedor = $idProveedor";
	$proveedor->editarProveedor($ruc, $razonSocial, $ciudad, $direccion, $telefono, $fax, $estado, $where);
}

header("Location:". $_SERVER['HTTP_REFERER']);

?>
