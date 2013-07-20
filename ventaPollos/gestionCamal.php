<?php
require("autoCarga.php");
require("header.php");

$camal = new Camal();
$rs = $camal->getCamal();

?>
<div id="divBloqueador"></div>
<div id="centralPanel">
	<h3 class="centrarText">Geti&oacute;n Camales</h3>	
	<?php
	if ($rs->num_rows) {
	?>
		<table>
			<tr>
				<th>C&oacute;digo</th>
				<th>Nombre</th>
				<th>Direccion</th>
				<th>Descripcion</th>
				<th>Acciones</th>
			</tr>
		<?php
		while ($row = $rs->fetch_assoc()) {
			$idCamal = $row['idCamal'];
			$nombreCamal = $row['nombreCamal'];
			$dirCamal = $row['direccionCamal'];
			$descCamal = $row['descripcion'];			
		?>
			<tr>
				<td><?php echo $idCamal; ?></td>
				<td><?php echo $nombreCamal; ?></td>
				<td><?php echo $dirCamal; ?></td>
				<td><?php echo $descCamal; ?></td>
				<td>
					[<a href="<?php echo $idCamal; ?>" name="itemEditar">Editar</a>]
					[<a href="eliminarCamal.php?camal=<?php echo $idCamal; ?>" name="itemEliminar">Eliminar</a>]
				</td>
			</tr>
		<?php
		}
		?>
		</table>
	<?php
	}
	?>
	<p class="centrarText">
		<a href="configuracion.php"><img src="imagenes/maquetado/folder_previous2.png"
		height="48" width="48" alt="Img Atras" title="Atras" /></a>&nbsp;&nbsp;
		
		<a href="#" id="nuevoCamal"><img src="imagenes/maquetado/pages_add.png"
		width="48" height="48" title="Nueva imagen" alt="Nuevo" /></a>
	</p>
	
	<div id="divIngresoPequenios" class="oculto">
		<form action="ingresoCamal.php" method="post" id="fIngCamal">
			<fieldset>
				<legend>Datos - Nuevo Camal</legend>
				<div class="claveValor">
					<label for="nombreCamal">Nombre: </label>
					<input type="text" id="nombreCamal" name="nombreCamal" maxlength="45" class="campoNormal" />
				</div>
				
				<div class="claveValor">
					<label for="direccionCamal">Direcci&oacute;n: </label>
					<input type="text" id="direccionCamal" name="direccionCamal" maxlength="75" class="campoMedioNormal" />
				</div>
				
				<div class="claveValor">
					<label for="descripcionCamal">Descripci&oacute;n: </label>
					<textarea id="descripcionCamal" name="descripcionCamal" class="campoMedioNormal" wrap="virtual"></textarea>
				</div>
				
				<hr />
				<p class="alineacionDerecha parrafoCerrar">
				<a id="linkCerrar" href="#"><img src="imagenes/maquetado/remove.png"
				width="32" height="32" alt="Cerrar" title="Cerrar"  /></a></p>
				<input type="submit" value="Guardar" />
				<input type="reset" value="Cancelar" />
			</fieldset>
		</form>
	</div>
</div>
<?php
require("footer.php");
?>