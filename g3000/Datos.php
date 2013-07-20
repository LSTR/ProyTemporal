<?php
	require("connection.php");
	$id = $_POST["txtI"];
	$M = $_GET["m"];
	$Op = $_POST["rb"];
	$Cn = coneccion();
    $sql = "delete from usuario where id_Usuario='" . $id . "'";
    $result = mysql_query($sql, $Cn);
    header("location:inscripcion.php");
?>