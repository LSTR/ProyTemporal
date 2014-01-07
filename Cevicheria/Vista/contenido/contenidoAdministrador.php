<?php
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: "."http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"]."/cevicheria");
    require "../../configuracion.php";
    $opcMenu="inicio";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cevicheria El Clasico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="<?php echo $pathBootstrap?>/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
        
      }
      .formBusq{
          height: auto;
          border: 1px solid #666666;
          border-radius: 3px;
      }
      .opcActive{
          color: #006666;
          font-weight: bold;
          font-size: 15px;
      }
    </style>
    <link href="<?php echo $pathBootstrap?>/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $pathBootstrap?>/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $pathBootstrap?>/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $pathBootstrap?>/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $pathBootstrap?>/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo $pathBootstrap?>/ico/favicon.png">
    <link type="text/css" rel="stylesheet" href="<?php echo $pathName; ?>/js/jquery/css/mint-choc/base/jquery.ui.all.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $pathName;?>/js/jquery/css/mint-choc/base/jquery.ui.datepicker.css">
    <script type="text/javascript" src="<?php echo $pathName;?>/js/jquery/js/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="<?php echo $pathName;?>/js/jquery/js/jquery-ui-1.8.23.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo $pathName; ?>/js/jquery/js/jquery.ui.core.js"></script>
    <script type="text/javascript" src="<?php echo $pathName; ?>/js/jquery/js/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="<?php echo $pathName; ?>/js/jquery/js/jquery.ui.datepicker.js"></script>
    <script type="text/javascript">
        var opc=1;
        var dateB="0000-00-00";
        var tmpAct="lnkA"
        $(document).ready(function(){
            $("#lnkA").click(function( ){
                if(!validar()){
                    alert("Seleccione Fecha")
                    return;
                }
                $("#"+tmpAct).removeClass("opcActive")
                $("#lnkA").addClass("opcActive")
                tmpAct="lnkA";
                buscar("A");
            });
            $("#lnkB").click(function( ){
                if(!validar()){
                    alert("Seleccione Fecha")
                    return;
                }
                $("#"+tmpAct).removeClass("opcActive")
                $("#lnkB").addClass("opcActive")
                tmpAct="lnkB";
                buscar("B");
            });
            $("#lnkC").click(function( ){
                if(!validar()){
                    alert("Seleccione Fecha")
                    return;
                }
                $("#"+tmpAct).removeClass("opcActive")
                $("#lnkC").addClass("opcActive")
                tmpAct="lnkC";
                buscar("C");
            });
            $("#lnkD").click(function( ){
                if(!validar()){
                    alert("Seleccione Fecha")
                    return;
                }
                $("#"+tmpAct).removeClass("opcActive")
                $("#lnkD").addClass("opcActive")
                tmpAct="lnkD";
                buscar("D");
            });
            $("#opcA").click(function(){
                $("#txtFechaDesde").attr("disabled",false);
                $("#txtFechaHasta").attr("disabled",false);
                $("#txtFechaEx").attr("disabled",true);
                opc=1;
            });
            $("#opcB").click(function(){
                $("#txtFechaDesde").attr("disabled",true);
                $("#txtFechaHasta").attr("disabled",true);
                $("#txtFechaEx").attr("disabled",false);
                opc=2;
            });
            $("#txtFechaDesde").datepicker({maxDate:0,"dateFormat":"yy-mm-dd"});
            $("#txtFechaHasta").datepicker({maxDate:0,"dateFormat":"yy-mm-dd"});
            $("#txtFechaEx").datepicker({maxDate:0,"dateFormat":"yy-mm-dd"});
        });
        function validar(){
            if(opc==1){
               var a=$("#txtFechaDesde").val();
               var b=$("#txtFechaHasta").val();
               dateB="i="+a+"&s="+b;
               if(a!=""&&b!="")return true;
            }else{
               var b=$("#txtFechaEx").val();
               dateB="f="+b;
               if(b!="")return true; 
            }
            return false;
        }
        function buscar(tb){
            var _data="opc="+opc+"&"+dateB;
              $.ajax({
                  type:"post",
                  url:"../reporte/tabla"+tb+".php",
                  data:_data,
                  success:function(r){
                     $("#contenidoData").html(r);
                  }
              });
        }
    </script>
  </head>
  <body>
    <!--INI NAVBAR-->
    <?php
         $inc='../navbar.php';
         include $inc;
    ?>
    <!--FIN NAVBAR-->
   
   <center>
        <div class="container" >
            <div class="formBusq">
                <table class="table table-condensed" width="100%" style="background-color: #FFF;border-radius: 8px;">
                     <col width="5%">
                     <col width="25%">
                     <col width="15%">
                     <col width="20%">
                     <col width="15%">
                     <col width="20%">
                     <tr>
                         <td>&nbsp;</td><td align="center"><label class="radio"><input type="radio" checked name="cb" id="opcA"> Seleccionar</label></td>
                         <td align="center">Desde </td><td><input class="input-medium" type="text" id="txtFechaDesde" value="">
                         </td><td>Hasta</td><td><input class="input-medium" type="text" id="txtFechaHasta" value=""></td>
                     </tr>
                     <tr>
                         <td>&nbsp;</td><td align="center"><label class="radio"><input type="radio" name="cb" id="opcB"> Seleccionar</label></td>
                         <td>Fecha Exacta </td><td><input class="input-medium" disabled type="text" id="txtFechaEx" value=""></td><td colspan="2"></td>
                     </tr>
                 </table>
                <div>
                    <ul class="breadcrumb">
                      <li><a href="#" id="lnkA">Resumen Ventas Platos</a> <span class="divider">/</span></li>
                      <li><a href="#" id="lnkB">Resumen Ventas Bebidas</a> <span class="divider">/</span></li>
                      <li><a href="#" id="lnkC">Platos Por Categoria</a> <span class="divider">/</span></li>
                      <li><a href="#" id="lnkD">Bebidas Por Categoria</a> <span class="divider">/</span></li>
                    </ul>
              </div>
            </div>
            <hr>
            <div id="contenidoData">

            </div>
      </div>
      
   </center>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-transition.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-alert.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-modal.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-dropdown.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-scrollspy.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-tab.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-tooltip.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-popover.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-button.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-collapse.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-carousel.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-typeahead.js"></script>
  </body>
</html>