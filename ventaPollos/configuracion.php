<?php
require("autoCarga.php");
require("header.php");
?>
<div id="centralPanel">
	<div id="itemProveedores" class="centrarText">
		<img src="imagenes/maquetado/tipoPollo.jpg" width="150px" height="150px" alt="Tipo de pollos" />
		<p><a href="gestionTipoPollo.php">Tipos de Pollos</a></p>
	</div>
	
	<div id="itemProveedores" class="centrarText">
		<img src="imagenes/maquetado/igv.jpg" width="150px" height="150px" alt="Imagen inpuestos (IGV)" />
		<p><a href="gestionIgv.php">IGV</a></p>
	</div>
	
	
	<div id="itemPagos" class="centrarText">
		<img src="imagenes/maquetado/camales.jpg" width="150px" height="150px" alt="Imagen Camales" />
		<p><a href="gestionCamal.php">Camales</a></p>
	</div>
</div>
<?php
require("footer.php");
?>