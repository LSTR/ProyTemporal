<?php
$id = $_GET["i"];
echo "<form action='Datos.php' method='POST'>";
echo "<table border=1 width='200' style='border-collapse:collapse;'>";
echo "<tr bgcolor='Green'>";
echo "<td><input type='hidden' name='txtI' value='".$id."'/>";
echo "<input type='submit' name='btn' value='Si'/>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</form>";
echo "<form action='inscripcion.php?m=listar' method='POST'>";
echo "<table border=1 width='200' style='border-collapse:collapse;'>";
echo "<tr bgcolor='Green'>";
echo "<td><input type='submit' name='btn' value='No'/>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</form>";
?>