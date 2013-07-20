<?php
require("autoCarga.php");

$tipoPollo = new TipoPollo();

$generales = new Generales();

$idTipoPollo = $generales->verificaVariable($_GET['tipoPollo']);

$where = "idTipoPollo = $idTipoPollo";

$tipoPollo->deleteTipoPollo($where);

header("Location: ".$_SERVER['HTTP_REFERER']);
?>