<?php
	header("Content-Type: image/JPG");
	$id=$_GET["id"];
	$coneccion = mysql_connect("localhost", "root", "");
	mysql_select_db("g_3000", $coneccion) or die(mysql_error());
	$queEmp = "SELECT Foto FROM fotos where id_Foto='".$id."'";
	$resEmp = mysql_query($queEmp, $coneccion) or die(mysql_error());
	$totEmp = mysql_num_rows($resEmp);
	while ($rowEmp = mysql_fetch_array($resEmp)) {
		$imagen = $rowEmp[0];
		echo $imagen;
	}
?>