<?php
require("autoCarga.php");

require("header.php");

@$page = $_GET['page'];
$cantidad = 10;

$cliente = new Cliente();
$camal = new Camal();
$usuario = new Usuario();
$proveedor = new Proveedor();
$tipoPollo = new TipoPollo();

$venta = new Venta();
$docVenta = new DocVenta();

$paginacion = new Paginacion($cantidad, $page);
$from = $paginacion->getFrom();

$rsT = $venta->getVenta();
$totalVentas = $rsT->num_rows;

$where = "1 ORDER BY fechaVenta DESC, idVenta DESC LIMIT $from, $cantidad";
$rs = $venta->getVenta($where);

?>
<div id="divBloqueador"></div>
<div id="centralPanel">
	<h3 class="centrarText">Gesti&oacute;n de Ventas</h3>
	<?php
	if ($rs->num_rows) {
	?>
		<div class="divListado">
		<table class="zebra">
			<tr>
				<th colspan="7">Listado de total de Ventas</th>
			</tr>
			<tr>
				<th>Cod</th>
				<th>Fecha</th>
				<th>Cliente</th>
				<th>Camal</th>
				<th>Pelad</th>
				<!--<th>Usuario</th>-->
				<th>Acciones</th>
			</tr>
	<?php
		while($row = $rs->fetch_assoc()) {
			$idVenta = $row['idVenta'];
			$fechaVenta = date("d - m - Y", $row['fechaVenta']);
			$pelada = $row['pelada'] ? "Si" : "No" ;
			
			$idUsuario = $row['idUsuario'];
			$idCliente = $row['idCliente'];
			$idCamal = $row['idCamal'];
			
			
			$whereC = "idCliente = $idCliente";
			$rsC = $cliente->getCliente($whereC);
			$rowC = $rsC->fetch_assoc();
			$nombresC = strtoupper($rowC['nombreCliente']." ".$rowC['apellidosCliente']);
			$jefe = $rowC['jefeCliente'];
			
			$whereCa = "idCamal = $idCamal";
			$rsCa = $camal->getCamal($whereCa);
			$rowCa = $rsCa->fetch_assoc();
			$nombreCamal = strtoupper($rowCa['nombreCamal']);
			
			/*$whereU = "idUsuario = $idUsuario";
			$rsU = $usuario->getUsuario($whereU);
			if ($rsU->num_rows) {
				$rowU = $rsU->fetch_assoc();
				$userName = $row['userName'];
			}
			*/
			$whereDV = "idVenta = $idVenta";
			$rsDDV = $docVenta->getDocVenta($whereDV);
			
	?>
		<tr>
			<td class="mayusculas"><?php echo $idVenta; ?></td>
			<td class="mayusculas"><?php echo $fechaVenta; ?></td>
			<td class="mayusculas"><?php echo $nombresC; ?></td>
			<td class="mayusculas"><?php echo $nombreCamal; ?></td>
			<td class="mayusculas"><?php echo $pelada; ?></td>
			<!--<td class="mayusculas"><?php //echo $userName; ?></td>-->
			
			<td>[<a href="<?php echo $idVenta; ?>" name="itemEditar">Editar</a>]
			[<a href="consultaDetalleVenta.php?venta=<?php echo $idVenta; ?>">Detalle</a>]
			[<a href="eliminarVenta.php?venta=<?php echo $idVenta; ?>" name="itemEliminar">Eliminar</a>]
			<?php
				if (!$rsDDV->num_rows && !$jefe) {
			?>
				[<a href="formIngFacturaVenta.php?venta=<?php echo $idVenta; ?>
				&page=<?php echo $page; ?>">Gen. Factura</a>]
			<?php
				}
			?>
			</td>
		</tr>
	
	<?php
		}
	
	?>	
		</table>
		<div class="paginacion">
		<?php
			$url = "gestionVentas.php?";
			$back = "&laquo;Atras";
			$next = "Siguiente&raquo;";
			//$class = "numPages";
			$paginacion->generaPaginacion($totalVentas, $back, $next, $url);
		?>
		</div>
		</div>
	<?php
	}
	?>
	<p class="centrarText">
		<a href="facturasVenta.php">
		<img src="imagenes/maquetado/hojaCalculo.jpg" height="48" width="48"
		alt="Docs Venta" title="Ir a Documentos de Venta" /></a>&nbsp;&nbsp;
		<a href="ventas.php">
		<img src="imagenes/maquetado/folder_previous2.png" height="48" width="48"
		alt="Img Atras" title="Atras" /></a>&nbsp;&nbsp;
		
		<a href="#" id="nuevaVenta"><img src="imagenes/maquetado/pages_add.png"
		width="48" height="48" title="Nueva Venta" alt="Nuevo" /></a>		
	</p>
	<div id="divIngresoVenta" class="oculto">
		<form action="ingresoVenta.php" method="post" id="fIngVenta">
			<fieldset>
			<legend>Datos Nueva Venta</legend>
			
			<div id="itemProveedores"  class="divLineaDerecha itemVentaIzquierda">				
				
				<div class="claveValor">
				<label for="cliente">Cliente: </label>
				
				<select name="cliente" id="cliente" class="campoNormal">
				<?php
				$rs = $cliente->getCliente();
				if ($rs) {
					while ($row = $rs->fetch_assoc()) {
						$idCliente = $row['idCliente'];
						$nombresCliente = $row['nombreCliente']." ".$row['apellidosCliente'];
				?>
					<option value="<?php echo $idCliente; ?>"><?php echo $nombresCliente; ?></option>
				<?php
					}
				}
				?>
				</select>
				</div>
				
				<div class="claveValor">
				<label for="camal">Camal: </label>
				
				<select name="camal" id="camal" class="campoNormal">
				<?php
				$rs = $camal->getCamal();
				if ($rs) {
					while ($row = $rs->fetch_assoc()) {
						$idCamal = $row['idCamal'];
						$nombreCamal = $row['nombreCamal'];
				?>
					<option value="<?php echo $idCamal; ?>"><?php echo $nombreCamal; ?></option>
				<?php
					}
				}
				?>
				</select>
				</div>
			
			<div class="claveValor">
				<fieldset class="fechas">
				<legend>Fecha de Venta</legend>
					<span>Dia:</span>
					<select name="diaVenta" id="diaVenta">
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
					<select name="mesVenta" id="mesVenta">
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
					<select name="yearVenta" id="yearVenta">
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
				<label for="pelada">Pelada:</label>
				<input type="radio" id="pelada" name="pelada" value="0" checked="checked" />No se pelo
				<input type="radio" id="pelada" name="pelada" value="1" />Se pelo
			</div>
			
						
			</div><!--End div#itemProveedores-->
			
			
			<div id="itemProveedores" class="itemVentaDerecha">
				<table id="tablaDetalle">
					<thead>
					<tr>
						<th>T. Pollo</th>
						<th>Proveedor</th>
						<th>Cant.</th>
						<th>P. Pesada</th>
						<th>P. Java</th>
						<th>P. Neto</th>
						<th>Prom.</th>
					</tr>
					</thead>
					<tbody id="bodyTablaDetalle">
					<tr>
						<td><select name="tipoPollo[]" id="tipoPollo">
						<?php
							$rs = $tipoPollo->getTipoPollo();						
							if ($rs) {
								while ($row = $rs->fetch_assoc()) {
						?>
							<option value="<?php echo $row['idTipoPollo']; ?>"><?php echo $row['nombreTipoPollo']?></option>
						<?php
								}
							}
						?>
						</select>
						</td>
						
						<td><select name="proveedor[]" id="proveedor">
						<?php
							$rs = $proveedor->getProveedor();
							if ($rs) {
								while ($row = $rs->fetch_assoc()) {
						?>
							<option value="<?php echo $row['idProveedor']; ?>"><?php echo $row['razonSocial']?></option>
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
			<input type="submit" value="Guardar" />
			<input type="reset" value="Cancelar" />
						
			</fieldset>
		</form>
	</div>

</div>
<?php
require("footer.php");
?>
