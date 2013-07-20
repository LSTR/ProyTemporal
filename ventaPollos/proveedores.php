<?php
require("header.php");
?>

<div id="centralPanel">

	<div id="itemProveedores" class="centrarText">
		<img src="imagenes/maquetado/camion.jpg" width="150px" height="150px" title="Proveedores" alt="imagen Provedores" />
		<p><a href="gestionProveedores.php">Gesti&oacute;n de Proveedores</a></p>
	</div>
	
	<div id="itemCompras" class="centrarText">
		<img src="imagenes/maquetado/contactos.jpg" width="150" height="150" title="Contactos" alt="imagen Contactos" />
		<p><a href="gestionContactos.php">Gesti&oacute;n de Contactos</a></p>
	</div>
	<div class="clearFloat"></div>
	<div id="itemPagos" class="centrarText">
		<img src="imagenes/maquetado/dinero.jpg" width="150" height="150" title="Pagos por compra" alt="imagen Pagos Compra" />
		<p><a href="gestionCuentas.php">Gesti&oacute;n de Cuentas</a></p>
	</div>

</div>
<?php
require("footer.php");
?>