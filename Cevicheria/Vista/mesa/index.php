<?php
    $opcMenu="mesa";
    include '../base.php';
    require '../../Modelo/mesaM.php';
    $objDAO=new MesaM();
    $result=$objDAO->listar();
    $tipoP=array();
    foreach ($result as $val) {
      $tipoP[$val->ubicacion]=$val->ubicacion;
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
                <td colspan="3" style="text-align: center">Ubicacion: &nbsp;&nbsp;&nbsp;
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
</div>
<div id="contenidoData">
    
</div>
<?php
    include '../baseFin.php';
?>