<?php
require("autoCarga.php");

$generales = new Generales();
$camal = new Camal();

$idCamal = $generales->verificaVariable($_GET['camal']);

$where = "idCamal = $idCamal";
$camal->deleteCamal($where);

header("Location: ".$_SERVER['HTTP_REFERER']);
?>