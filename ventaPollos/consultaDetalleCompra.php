<?php
require("autoCarga.php");

require("header.php");

$idCompra = $_GET['compra'];

$detalleCompra = new DetalleCompra;
$whereC = "idCompra = '$idCompra' ORDER BY item";
$rsC = $detalleCompra->getDetalleCompra($whereC);

?>
<div id="centralPanel">
	<h3 class="centrarText">Detalle de Compra N&ordm; <?php echo $idCompra; ?></h3>
	<?php
	if ($rsC->num_rows) {
	?>
		<table>
			<tr>
				<th colspan="6">Detalle de compra</th>
			</tr>
			<tr>
				<th>Item</th>
				<th>Tipo Pollo</th>
				<th>Cantidad</th>
				<th>Peso</th>
				<th>PrecioUnitario</th>
				<th>Sub Total</th>
			</tr>
	<?php
		while($rowC = $rsC->fetch_assoc()) {
			$item = $rowC['item'];
			$idTipoPollo = $rowC['idTipoPollo'];
			$cantidad = $rowC['cantidad'];
			$peso = $rowC['peso'];
			$precioUnitario = $rowC['precioUnitario'];
			$subTotal = $rowC['subTotal'];
			
			$tipoPollo = new TipoPollo();
			$whereTP = "idTipoPollo = $idTipoPollo";
			$rsTP = $tipoPollo->getTipoPollo($whereTP);
			if ($rsTP->num_rows) {
				$rowTP = $rsTP->fetch_assoc();
				$nombreTipoPollo = $rowTP['nombreTipoPollo'];
			}
	?>
		<tr>
			<td class="mayusculas"><?php echo $item; ?></td>
			<td><?php echo $nombreTipoPollo; ?></td>
			<td class="mayusculas"><?php echo $cantidad; ?></td>
			<td class="mayusculas"><?php echo $peso; ?></td>
			<td class="mayusculas"><?php echo $precioUnitario; ?></td>
			<td class="mayusculas"><?php echo $subTotal; ?></td>
		</tr>	
	<?php
		}
	?>	
		</table>
	<?php
	}
	?>
	<p class="centrarText">
		<a href="gestionCompras.php"><img src="imagenes/maquetado/folder_previous2.png" height="48" width="48"
		alt="Img Atras" title="Atras" /></a>	
	</p>
</div>
<?php
require("footer.php");
?>