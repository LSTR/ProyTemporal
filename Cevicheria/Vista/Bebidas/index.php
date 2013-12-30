<?php
    $opcMenu="bebida";
    include '../base.php';
    require '../../Modelo/bebidasM.php';
    $objDAO=new BebidasM();
    $result=$objDAO->listar();
    $tipoP=array();
    foreach ($result as $val) {
      $tipoP[$val->tipo_beb]=$val->tipo_beb;
    }
?>
<script>
    $(document).ready(function() {
        $("#btnBus").click(function( ){
          buscar();
        });
        $("#btnTodo").click(function( ){
          $('#frm').each (function(){
            this.reset();
          });
          buscar();
        });
        buscar();
    });
    function buscar(){
        var _data=$("#frm").serialize();
          $.ajax({
              type:"post",
              url:"tabla.php",
              data:_data,
              success:function(r){
                 $("#contenidoData").html(r);
              }
          });
    }
</script>
<div class="formBusq">
    <form id="frm" method="post">
        <table class="table" border="0">
            <tr>
                <td>Nombre: <input type="text" name="txtN" value="" /></td>
                <td>Tipo: 
                    <select id="cboTipo" name="cboTipo" style="text-align: center">
                      <option value="">- Todos -</option>
                       <?php
                           foreach ($tipoP as $val) {?>
                           <option value="<?php echo $val;?>"><?php echo $val;?></option>
                          <?php }
                       ?>
                   </select>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center"><input type="button" class="btn btn-success" id="btnBus" value="Buscar" />
                <input type="reset" id="btnTodo" class="btn btn-info" value="Ver Todos" /></td>
            </tr>
        </table>
    </form>
</div>
<div style="padding: 8px">
    <a href="form.php" class="btn btn-info">+ Agregar Nuevo</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="reporte.php" class="btn btn-success">Descargar Reporte General</a>
</div>
<div id="contenidoData">
    
</div>
<?php
    include '../baseFin.php';
?>