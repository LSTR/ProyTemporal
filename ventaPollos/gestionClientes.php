<?php
require("autoCarga.php");

require("header.php");

@$page = $_GET['page'];
$cantidad = 20;

$paginacion = new Paginacion($cantidad, $page);
$cliente = new Cliente;

$rsT = $cliente->getCliente();
$totalCli = $rsT->num_rows;

$from = $paginacion->getFrom();

$where = "1 ORDER BY apellidosCliente, nombreCliente LIMIT $from, $cantidad";
$rs = $cliente->getCliente($where);

?>
<div id="divBloqueador"></div>
<div id="centralPanel">
	<h3 class="centrarText">Gesti&oacute;n de Clientes</h3>
	<?php
	if ($rs->num_rows) {
	?>
		<div class="divListado">
		<table class="zebra">
			<tr>
				<th colspan="7">Listado de Clientes</th>
			</tr>
			<tr>
				<th>DNI</th>
				<th>Nombres</th>
				<th>Direcci&oacute;n</th>
				<th>Email</th>
				<th>Telefonos/fax</th>
				<th>Cliente de:</th>
				<th>Acciones</th>
			</tr>
	<?php
		while($row = $rs->fetch_assoc()) {
			$idCliente = $row['idCliente'];
			$dni = $row['dniCliente'];
			$nombres = strtoupper($row['apellidosCliente']." ".$row['nombreCliente']);			
			$direccion = $row['direccionCliente']." - ".$row['ciudadCliente'];
			$telefono = $row['telMovilCliente']." - ".$row['rpmCliente']." / ".$row['fax'];
			$email = $row['emailCliente'];
			
			unset($jefe);
			if ($row['jefeCliente']) {
				$whereJ = "c.idCliente = $idCliente";
				$rsJ = $cliente->getJefeCliente($whereJ);
				$rowJ = $rsJ->fetch_assoc();
				$jefe = $rowJ['apellidosCliente']." ".$rowJ['nombreCliente'];
			}
			else {
				$jefe = "";
			}
			
	?>
		<tr>
			<td class="numeros"><?php echo $dni; ?></td>
			<td class="mayusculas"><?php echo $nombres; ?></td>
			<td class="numeros"><?php echo $direccion ?></td>
			<td class="numeros"><?php echo $email; ?></td>
			<td class="numeros"><?php echo $telefono; ?></td>
			<td class="numeros"><?php echo $jefe; ?></td>
			<td>[<a href="<?php echo $idCliente; ?>" name="itemEditar">Editar</a>]
				[<a href="eliminarCliente.php?cliente=<?php echo $idCliente;?>" name="itemEliminar">Eliminar</a>]
			</td>
		</tr>
	
	<?php
		}
	
	?>	
		</table>
		<div class="paginacion">
		<?php
			$url = "gestionClientes.php?";
			$back = "&laquo;Atras";
			$next = "Siguiente&raquo;";
			//$class = "numPages";
			$paginacion->generaPaginacion($totalCli, $back, $next, $url);
		?>
		</div>
		</div>
	<?php
	}
	?>
	<p class="centrarText">
		<a href="ventas.php">
		<img src="imagenes/maquetado/folder_previous2.png" height="48" width="48"
		alt="Img Atras" title="Atras" /></a>&nbsp;&nbsp;
		<a href="#" id="nuevoCliente"><img src="imagenes/maquetado/pages_add.png"
		 width="48" height="48" title="Nueva imagen" alt="Nuevo" /></a>
	</p>
	<div id="divIngresoCliente" class="oculto">
		<form action="ingresoCliente.php" method="post" id="fIngCliente">
			<fieldset>
			<legend>Datos nuevo Cliente</legend>
			<div class="claveValor">
				<label for="dni">DNI: *</label>
				<input class="campoNormal" type="text" name="dni" id="dni" maxlength="8" />
			</div>
			
			<div class="claveValor">
				<label for="nombres">Nombres: *</label>
				<input class="campoMedioNormal" type="text" name="nombres" id="nombres" maxlength="45" />
			</div>
			
			<div class="claveValor">
				<label for="apellidos">Apellidos: *</label>
				<input class="campoMedioNormal" type="text" name="apellidos" id="apellidos" maxlength="75" />
			</div>
			
			<div class="claveValor">
				<label for="ciudad">Ciudad: *</label>
				<input class="campoNormal" type="text" name="ciudad" id="ciudad" maxlength="25" />
			</div>
			
			<div class="claveValor">
				<label for="direccion">Direccion:</label>
				<input class="campoMedioNormal" type="text" name="direccion" id="direccion" maxlength="75" />
			</div>
			
			<div class="claveValor">
				<label for="direccion">Email:</label>
				<input class="campoMedioNormal" type="text" name="email" id="email" maxlength="45" />
			</div>
			
			<div class="claveValor">
				<label for="celular">T. Celular (T. Fijo):</label>
				<input class="campoNormal" type="text" name="celular" id="celular" maxlength="11" />
			</div>
			
			<div class="claveValor">
				<label for="rpm">RPM:</label>
				<input class="campoNormal" type="text" name="rpm" id="rpm" maxlength="11" />
			</div>
			
			<div class="claveValor">
				<label for="fax">Fax:</label>
				<input class="campoNormal" type="text" name="fax" id="fax" maxlength="11" />
			</div>
			
			<div class="claveValor">
				<label for="jefe">Es cliente de: </label>
				<select name="jefe" id="jefe" class="campoNormal">
					<option value="0">- -Selecciona- -</option>
					<?php
					//Reseteamos el $rs del while anterior
					$rs->data_seek(0);
					while ($row = $rs->fetch_assoc()) {
						$idCliente = $row['idCliente'];
						$nombres = $row['apellidosCliente']." ".$row['nombreCliente'];
					?>
						<option value="<?php echo $idCliente;?>"><?php echo $nombres; ?></option>
					<?php
					}
					?>
				</select>
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