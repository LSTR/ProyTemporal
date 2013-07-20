<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
body { font-family:Georgia, "Times New Roman", Times, serif; text-align:center; color:#FF0000;}
body:hover {color:#0000CC;}

</style>
</head>

<body>
<?php
$cn = mysql_connect("localhost", "root", "JAMC");
mysql_select_db("eliminame", $cn);

$query = "SELECT * FROM usuario";
$rs = mysql_query($query, $cn);

echo "<h1>El numeor total de usuarios es: ".mysql_num_rows($rs)."</h1>";

while ($row = mysql_fetch_assoc($rs)) {
	echo "<br />".$row['idUsuario']." - ".$row['username'].' - '.$row['password'];
}


?>
</body>
</html>
