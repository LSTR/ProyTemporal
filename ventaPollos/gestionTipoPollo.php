<?php
require("autoCarga.php");
require("header.php");

$tipoPollo = new TipoPollo();
$rs = $tipoPollo->getTipoPollo();

?>
<div id="divBloqueador"></div>

<div id="centralPanel">
	<h3 class="centrarText">Gesti&oacute;n Tipos de Pollo</h3>
	<?php
	if ($rs->num_rows) {
	?>
		<table>
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Estado</th>
				<th>Acciones</th>
			</tr>
		<?php
		while ($row = $rs->fetch_assoc()) {
			$idTipoPollo = $row['idTipoPollo'];
			$nombreTipoPollo = $row['nombreTipoPollo'];
			$descripcion = $row['descripcion'];
			$estado = $row['estado'] ? "Vigente" : "De baja";
		
		?>
			<tr>
				<td><?php echo $idTipoPollo; ?></td>
				<td><?php echo $nombreTipoPollo; ?></td>
				<td><?php echo $descripcion; ?></td>
				<td><?php echo $estado; ?></td>
				<td>
					[<a href="<?php echo $idTipoPollo; ?>" name="itemEditar">Editar</a>]
					[<a href="eliminarTipoPollo.php?tipoPollo=<?php echo $idTipoPollo; ?>"
					name="itemEliminar">Eliminar</a>]
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
		<a href="configuracion.php">
		<img src="imagenes/maquetado/folder_previous2.png" height="48" width="48"
		alt="Img Atras" title="Atras" /></a>&nbsp;&nbsp;
		<a href="#" id="nuevoTipoPollo"><img src="imagenes/maquetado/pages_add.png"
		 width="48" height="48" title="Nuevo" alt="Nuevo" /></a>
	</p>
	
	<div id="divIngresoPequenios" class="oculto">
		<form action="ingresoTipoPollo.php" method="post" id="fIngTipoPollo">
			<fieldset>
				<legend>Datos nuevo tipo de pollo</legend>
				<div class="claveValor">
					<label for="nombreTipoPollo">Nombre: </label>
					<input type="text" name="nombreTipoPollo" id="nombreTipoPollo" class="campoNormal" />
				</div>
				
				<div class="claveValor">
					<label for="descripcion">Descripcion: </label>
					<textarea name="descripcion" id="descripcion" class="campoMedioNormal" wrap="virtual"></textarea>
				</div>
				
				<div class="claveValor">
					<label for="estado">Estado: </label>
					<select name="estado" id="estado" class="campoNormal">
						<option value="1">Alta</option>
						<option value="0">Baja</option>
					</select>
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