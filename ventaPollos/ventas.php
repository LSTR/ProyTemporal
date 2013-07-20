<?php
require("header.php");
?>
<div id="centralPanel">
	<div id="itemProveedores" class="centrarText">
		<img src="imagenes/maquetado/clientes.jpg" width="150px" height="150px" title="Clientes" alt="Imagen Clientes" />
		<p><a href="gestionClientes.php">Clientes</a></p>
	</div>
	
	<div id="itemCompras" class="centrarText">
		<img src="imagenes/maquetado/compras.jpg" width="150" height="150" title="Ventas" alt="imagen Venta" />
		<p><a href="gestionVentas.php">Ventas</a></p>
	</div>
	<div class="clearFloat"></div>
	<div id="itemProveedores" class="centrarText">
		<img src="imagenes/maquetado/facturas.jpg" width="150px" height="150px" title="Proveedores" alt="imagen Provedores" />
		<p><a href="facturasVenta.php">Facturas de venta</a></p>
	</div>
	<div id="itemCompras" class="centrarText">
		<img src="imagenes/maquetado/dinero.jpg" width="150" height="150" title="Pagos por ventas" alt="imagen Pagos Venta" />
		<p><a href="gestionPagosVentas.php">Pagos</a></p>
	</div>

</div>
<?php
require("footer.php");
?>
