<?php
require("autoCarga.php");
include("header.php");

$idVenta = $_GET['venta'];

$detalleVenta = new DetalleVenta();

$where = "idVenta = $idVenta";

$rs = $detalleVenta->getDetalleVenta($where);

?>
<div id="centralPanel">

<h3 class="centrarText">Detalle de venta N&ordm;<?php echo $idVenta;?></h3>

<?php
if ($rs->num_rows) {
?>
	<table>
		<tr>
			<th colspan="7">Detalle de venta</th>
		</tr>
		<tr>
			<th>Item</th>
			<th>Proveedor</th>
			<th>Tipo Pollo</th>
			<th>Cantidad</th>
			<th>P. pesada</th>
			<th>P. java</th>
			<th>P. neto</th>		
		</tr>
	<?php
		while($row = $rs->fetch_assoc()) {
			$item = $row['item'];
			$cantidad = $row['cantidad'];
			$pesoPesada = $row['pesoBrutoPesada'];
			$pesoJava = $row['pesoJavaPesada'];
			$pesoNeto = $row['pesoNeto'];
			
			$proveedor = new Proveedor();
			$whereP = "idProveedor = $row[proveedor]";
			$rsP = $proveedor->getProveedor($whereP);
			$rowP = $rsP ? $rsP->fetch_assoc() : "";
			$rzProv = $rowP['razonSocial'];
			
			$tipoPollo = new TipoPollo();
			$whereTP = "idTipoPollo = $row[idTipoPollo]";
			$rsTP = $tipoPollo->getTipoPollo($whereTP);
			$rowTP = $rsTP ? $rsTP->fetch_assoc() :"";
			$nombreTP = $rowTP['nombreTipoPollo'];
			
		?>
		<tr>
			<td><?php echo $item; ?></td>
			<td><?php echo $rzProv; ?></td>
			<td><?php echo $nombreTP; ?></td>
			<td><?php echo $cantidad; ?></td>
			<td><?php echo $pesoPesada; ?></td>
			<td><?php echo $pesoJava; ?></td>
			<td><?php echo $pesoNeto; ?></td>
		</tr>
		
		<?php
		}	
	?>
	
	</table>
<?php
} 
?>
	<p class="centrarText">
		<a href="gestionVentas.php">
		<img src="imagenes/maquetado/folder_previous2.png" height="48" width="48"
		alt="Img Atras" title="Atras" /></a>
	</p>

</div>
<?php
include("footer.php");
?>