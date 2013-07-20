<?php
require("autoCarga.php");

require("header.php");

?>
<div id="centralPanel">
	<h3 class="centrarText">Gestión de Productos no vendidos</h3>
	<div id="itemProveedores" class="centrarText">
		<img src="imagenes/maquetado/depostitoEntrada.jpg" width="150" height="150" alt="Entrada al Deposito" /> 
		<p><a href="gestionDeposito.php?motivo=ingresos">Entrada</a></p>
	</div>
	
	<div id="itemProveedores" class="centrarText">
		<img src="imagenes/maquetado/depostitoSalida.jpg" width="150" height="150" alt="Salida del Deposito" />
		<p><a href="gestionDeposito.php?motivo=salidas">Salida</a></p>
	</div>
</div>
<?php
require("footer.php");
?>
