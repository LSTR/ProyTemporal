<?php
	session_start();
	$usu=$_POST["user"];
	$clave=$_POST["password"];
	require("connection.php");
	$cnn = coneccion();
	$selectSQL="select * from  login where Usu='".$usu."' and Pass='".$clave."'";
	$tabla = mysql_query($selectSQL, $cnn) or die ("problema con cadena de conexion<br><b>" . mysql_error()."</b>");
	$registro = mysql_fetch_array($tabla);
	$id_Usu=$registro[3];	
	$selectSQL="select * from usuario where id_usuario='".$id_Usu."'";
	$tabla = mysql_query($selectSQL, $cnn) or die ("problema con cadena de conexion<br><b>" . mysql_error()."</b>");
	$registro = mysql_fetch_array($tabla);
	if( $registro[0]!=null){
		$_SESSION["Usuario"]=$registro[0];
		$_SESSION["NivelA"]=$registro[9];
		header("location: index.php");
    }else{ 
		header("location:index.php?e=Error en los Datos");
    } 
?>