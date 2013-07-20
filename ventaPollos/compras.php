<?php
require("header.php");
?>


<div id="centralPanel">
	<div id="itemProveedores" class="centrarText">
		<img src="imagenes/maquetado/camion.jpg" width="150px" height="150px" title="Proveedores" alt="imagen Provedores" />
		<p><a href="proveedores.php">Proveedores</a></p>
	</div>
	
	<div id="itemCompras" class="centrarText">
		<img src="imagenes/maquetado/compras.jpg" width="150" height="150" title="Compras" alt="imagen Compra" />
		<p><a href="gestionCompras.php">Compras</a></p>
	</div>
	<div class="clearFloat" class="centrarText"></div>
	<div id="itemPagos">
		<img src="imagenes/maquetado/dinero.jpg" width="150" height="150" title="Pagos por compra" alt="imagen Pagos Compra" />
		<p><a href="gestionPagosCompras.php">Pagos</a></p>
	</div>

</div>
<?php
require("footer.php");
?>