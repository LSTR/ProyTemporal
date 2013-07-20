<?php
require("autoCarga.php");

$generales = new Generales();

$nombreCamal = $_POST['nombreCamal'];
$dirCamal = $_POST['direccionCamal'];
$descCamal = $_POST['descripcionCamal'];

$idCamal = $generales->verificaVariable($_GET['camal']);

$camal = new Camal();

if ($idCamal) {
	$where = "idCamal = $idCamal";
	$camal->updateCamal($nombreCamal, $dirCamal, $descCamal, $where);
}
else {
	$camal->insertCamal($nombreCamal, $dirCamal, $descCamal);
}

header("Location: ".$_SERVER['HTTP_REFERER']);
?>