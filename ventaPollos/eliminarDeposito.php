<?php
require("autoCarga.php");

$generales = new Generales();

$idDeposito = $generales->verificaVariable($_GET['deposito']);

$deposito = new Deposito();
$detalleDeposito = new DetalleDeposito();

//Eliminamos primero el detalle del deposito
$where = "idDeposito = $idDeposito";
$detalleDeposito->deleteDetalleDeposito($where);

//Procedemos entonces a eliminar el deposito
$deposito->deleteDeposito($where);

header("Location: ".$_SERVER['HTTP_REFERER']);
?>