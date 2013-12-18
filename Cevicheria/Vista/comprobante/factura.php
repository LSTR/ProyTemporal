<?php
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ".$sess->getHost());
    require "../../configuracion.php";
//$idM=$_POST["idMesa"];
//require_once '../../Modelo/pedidoM.php';
//$objDAO=new pedidoM();
//$Data["num_mesa"]=$id;
//$result=$objDAO->listar($Data);
?>
<link rel='stylesheet' type='text/css' href='<?php echo $pathName?>/css/estiloCaja.css' />
<link rel='stylesheet' type='text/css' href='<?php echo $pathName?>/css/print.css' media="print" />
<script type='text/javascript' src='<?php echo $pathName?>/js/jquery-1.10.2.min.js'></script>
<script type='text/javascript' src='<?php echo $pathName?>/js/comprobante.js'></script>
<div id="page-wrap">
        <div style="text-align: center"><label id="header">FACTURA</label></div>
        <div id="identity">
            <div id="logo">
                <img id="image" src="<?php echo $pathName?>/img/logo.png" alt="logo" />
            </div>
            <div>
                <label id="">Cliente</label><input type="text" name="txtCliente" value="" />
            </div>
        </div>

        <div style="clear:both"></div>

        <div id="customer">


    <table id="meta">
        <tr>
            <td class="meta-head">Factura #</td>
            <td><label>000123</label></td>
        </tr>
        <tr>

            <td class="meta-head">Fecha</td>
            <td><label id="date">December 15, 2009</label></td>
        </tr>
        <tr>
            <td class="meta-head">Monto a Pagar</td>
            <td><div class="due">$875.00</div></td>
        </tr>

    </table>

        </div>

        <table id="items" width="100%">
          <col width="70%">
          <col width="10%">
          <col width="20%">
          <col width="0%">
          <col width="0%">
          <tr>
              <th>Descripcion</th>
              <th>Tipo</th>
              <th>Importe</th>
              <th></th>
              <th></th>
          </tr>

          <tr class="item-row">
              <td class="item-name"><div class="delete-wpr"><label>Ceviche al paso :)</label></div></td>
              <td class="description"><label>Plato</label></td>
              <td><span class="price">$650.00</span></td>
              <td></td>
              <td></td>
          </tr>

          <tr class="item-row">
              <td class="item-name"><div class="delete-wpr"><label>Agua Mineral Personal</label></div></td>
              <td class="description"><label>Bebida</label></td>
              <td><span class="price">$15.00</span></td>
              <td></td>
              <td></td>
          </tr>
          
          
          <tr>
            <td colspan="5"></td>
          </tr>

          <tr>
              <td class="blank"> </td>
              <td class="total-line">Subtotal</td>
              <td class="total-value"><div id="subtotal">$875.00</div></td>
              <td></td>
              <td></td>
          </tr>
          <tr>
              <td class="blank"> </td>
              <td class="total-line">Total</td>
              <td class="total-value"><div id="total">$875.00</div></td>
              <td></td>
              <td></td>
          </tr>
          <tr>
              <td class="blank"> </td>
              <td class="total-line">Amount Paid</td>
              <td class="total-value"><label id="paid">$0.00</label></td>
              <td></td>
              <td></td>
          </tr>
          <tr>
              <td class="blank"> </td>
              <td class="total-line balance">Balance Due</td>
              <td class="total-value balance"><div class="due">$875.00</div></td>
              <td></td>
              <td></td>
          </tr>

        </table>

</div>