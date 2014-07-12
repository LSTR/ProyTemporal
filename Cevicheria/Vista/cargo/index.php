<?php
    $opcMenu="cargo";
    include '../base.php';
?>
<script>
    $(document).ready(function() {
        $("#btnBus").click(function( ){
          var n=$("#txtN").val();
          var b=true;
          $("#txtN").css("border","1px solid #cccccc");
          if(n!=""&&!n.match(/^[a-zA-Z]+$/)){
                $("#txtN").val("").attr("placeholder","Estos datos no son validos").css("border","1px solid #DD4141");
                b=false;
          }
          if(b)
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
                <td>Nombre: <input type="text" name="txtN" id="txtN" value="" /></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center"><input type="button" class="btn btn-success" id="btnBus" value="Buscar" />
                <input type="reset" id="btnTodo" class="btn btn-info" value="Ver Todos" /></td>
            </tr>
        </table>
    </form>
</div>
<div style="padding: 8px">
    <a href="form.php" class="btn btn-info">+ Nuevo Cargo</a>
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