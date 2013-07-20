<?php
	DEFINE('host','localhost'); // NOMBRE DEL SERVIDOR 
	DEFINE('bd','g_3000'); // NOMBRE DE LA BASE DE DATOS
	DEFINE('user','root'); // USUARIO DE LA BASE DE DATOS
	DEFINE('pass',''); // PASSWORD DEL USUARIO SELECCIONADO

	function coneccion(){
		$cnn = mysql_connect(host,user,pass);
		mysql_select_db(bd,$cnn);
		if(!$cnn)
			echo("Error : No se puede conectar a la base de datos");
		return $cnn;
	}
?>
