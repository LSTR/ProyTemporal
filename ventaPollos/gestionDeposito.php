<?php
require("autoCarga.php");

require("header.php");

$motivo = $_GET['motivo'];
$idMotivo = $motivo == "ingresos" ? "i" : "s";

@$page = $_GET['page'];
$cantidad = 30;

$paginacion = new Paginacion($cantidad, $page);
$deposito = new Deposito();

$whereT = "tipo = '$idMotivo'";
$rsT = $deposito->getDeposito($whereT);
$totalDep = $rsT->num_rows;

$from = $paginacion->getFrom();

$where = "tipo = '$idMotivo' ORDER BY idDeposito DESC LIMIT $from, $cantidad";
$rsD = $deposito->getDeposito($where);

$proveedor = new Proveedor();
$tipoPollo = new TipoPollo();
?>
<div id="divBloqueador"></div>
<div id="centralPanel">
	<h3 class="centrarText">Gestion de <?php echo $motivo?> al dep&oacute;sito</h3>
	<?php
		if ($rsD->num_rows) {
	?>
	<div class="divListado">
	<table class="zebra">
			<tr>
				<th colspan="4">Listado de ingresos de dep&oacute;sitos</th>
			</tr>
			<tr>
				<th>Codigo</th>
				<th>Fecha</th>
				<th>Tipo</th>
				<th>Acciones</th>
			</tr>
			
		<?php
		while($rowD = $rsD->fetch_assoc()) {
			$idDeposito = $rowD['idDeposito'];
			$fecha = $rowD['fecha'];
			$fecha = date("d - m - Y", $fecha);
			
			$tipo= $rowD['tipo'];
			$tipo = $tipo == "i" ? "Ingreso" : "Salida";
		?>
			
			<tr>
				<td><?php echo $idDeposito; ?></td>
				<td><?php echo $fecha; ?></td>
				<td><?php echo $tipo; ?></td>
				<td>
					[<a href="<?php echo $idDeposito; ?>" name="itemEditar">Editar</a>]
					[<a href="<?php echo $idDeposito; ?>" name="itemDetalle">Detalle</a>]
					[<a href="eliminarDeposito.php?deposito=<?php echo $idDeposito; ?>"
					name="itemEliminar">Eliminar</a>]
				</td>
			</tr>
		<?php
		}
		?>
			
	</table>
		<div class="paginacion">
		<?php
			$url = "gestionDeposito.php?motivo=$motivo";
			$back = "&laquo;Atras";
			$next = "Siguiente&raquo;";
			//$class = "numPages";
			$paginacion->generaPaginacion($totalDep, $back, $next, $url);
		?>
		</div>
		
	</div>
	<?php
	}
	?>
		
	<p class="centrarText">
		<a href="deposito.php">
		<img src="imagenes/maquetado/folder_previous2.png" height="48" width="48"
		alt="Img Atras" title="Atras" /></a>&nbsp;&nbsp;
		<a href="#" id="nuevoDeposito"><img src="imagenes/maquetado/pages_add.png"
		width="48" height="48" title="Nueva imagen" alt="Nuevo" /></a>
	</p>
	
	<div id="divIngresoVenta" class="oculto">
		<form action="ingresoDeposito.php?motivo=<?php echo $motivo;?>" method="post" id="fIngDeposito">
			<fieldset>
			<legend>Datos deposito <?php echo $motivo; ?></legend>
			
			<div id="itemProveedores"  class="divLineaDerecha itemVentaIzquierda">
				
				<div class="claveValor">
				
				<fieldset class="fechas">
				<legend>Fecha de Deposito</legend>
					<span>Dia:</span>
					<select name="diaDeposito" id="diaDeposito">
					<?php
						$fechaActual = explode(",", date("j,n,Y"));
						
						for ($i = 1; $i < 32; $i++) {
					?>
							<option value="<?php echo $i;?>"
							<?php echo ($i == $fechaActual[0])? 'selected="selected"':"";?>>
							<?php echo $i;?>
							</option>
					<?php
						}
					?>
					</select>
				
					<span>Mes:</span>
					<select name="mesDeposito" id="mesDeposito">
					<?php
						for ($i = 1; $i < 13; $i++) {
						$generales = new Generales();
						$mes = $generales->getMes($i);
					?>
							<option value="<?php echo $i;?>"
							<?php echo $i== $fechaActual[1] ? 'selected="selected"' : "";?>>
							<?php echo $mes;?>
							</option>
					<?php
						}
					?>
					</select>
				
					<span>A&ntilde;o:</span>
					<select name="yearDeposito" id="yearDeposito">
					<?php
						$yearNow = $fechaActual[2];
												
						for ($i = ($yearNow - 1); $i < ($yearNow + 1); $i++) {
					?>
							<option value="<?php echo $i;?>"
							<?php echo $i==$yearNow ? 'selected="selected"' : "";?>>
							<?php echo $i;?>
							</option>
					<?php
						}
					?>
					</select>
				</fieldset>
			</div>
			
			<div class="claveValor">
				<label for="tipoDeposito">Tipo:</label>
				<input type="radio" id="tipoDeposito" name="tipoDeposito"
				value="i" <?php echo $idMotivo == "i"? 'checked="checked"' : ""; ?> />Ingreso
				<input type="radio" id="tipoDeposito" name="tipoDeposito"
				value="s" <?php echo $idMotivo == "s"? 'checked="checked"' : ""; ?>/>Salida
			</div>					
						
			</div><!--End div#itemProveedores-->
			
			
			<div id="itemProveedores" class="itemVentaDerecha">
				<table id="tablaDetalle">
					<thead>
					<tr>
						<th>Tipo Pollo</th>
						<th>Proveedor</th>
						<th>Cant.</th>
						<th>P. Bruto</th>
						<th>P. Java</th>
						<th>P. Neto</th>
						<th>Prom.</th>
					</tr>
					</thead>
					<tbody id="bodyTablaDetalle">
					<tr>
						<td><select name="tipoPolloDet[]" id="tipoPolloDet">
							<?php
							$rsTP = $tipoPollo->getTipoPollo();
							if ($rsTP->num_rows) {
								while ($rowTP = $rsTP->fetch_assoc()) {
									$idTipoPollo = $rowTP['idTipoPollo'];			
									$nombreTipoPollo = $rowTP['nombreTipoPollo'];
							?>
								<option value="<?php echo $idTipoPollo; ?>"><?php echo $nombreTipoPollo; ?></option>
							<?php
								}
							}
							?>
							</select>
						</td>
						
						<td><select name="proveedorDet[]" id="proveedorDet">
							<?php
							$rsP = $proveedor->getProveedor();
							if ($rsP->num_rows) {
								while ($rowP = $rsP->fetch_assoc()) {
									$idProveedor = $rowP['idProveedor'];			
									$rzProveedor = $rowP['razonSocial'];
							?>
								<option value="<?php echo $idProveedor; ?>"><?php echo $rzProveedor;?></option>
							<?php
								}
							}
							?>
							</select>
						</td>
						<td><input class="masPequenio" type="text" name="cantidadDet[]" id="cantidadDet" /></td>
						<td><input class="masPequenio" type="text" name="pesoPesadaDet[]" id="pesoPesadaDet" /></td>
						<td><input class="masPequenio" type="text" name="pesoJavaDet[]" id="pesoJavaDet" /></td>
						<td><input class="masPequenio" type="text" name="pesoNetoDet[]" id="pesoNetoDet" disabled="disabled" /></td>
						<td><input class="masPequenio" type="text" name="promedioDet[]" id="promedioDet" disabled="disabled" /></td>
					</tr>
					</tbody>
				</table>
				
			</div>
			<hr class="clearFloat" />
			<p class="alineacionDerecha parrafoCerrar">
			<a id="linkCerrar" href="#"><img src="imagenes/maquetado/remove.png"
			width="32" height="32" alt="Cerrar" title="Cerrar"  /></a></p>
			<input type="submit" value="Guardar" id="buttonSubmit" />
			<input type="reset" value="Cancelar" id="buttonReset" />
			
			</fieldset>
		</form>
	</div>	
	

</div>
<?php
require("footer.php");
?>
