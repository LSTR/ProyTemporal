<?php
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ".$sess->getHost());
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
    <script type="text/javascript" src="jquery.ui.datepicker.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#btnDownDia").click(function(){
                var p=pathSemelec+"recibo/crearRecibo/1/"+idc+"/"+mes;
                window.location.href = p;
            });
            $("#txtFechaDesde").datepicker({maxDate:0,"dateFormat":"yy-mm-dd"});
            $("#txtFechaHasta").datepicker({maxDate:0,"dateFormat":"yy-mm-dd"});
        });
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
       <div class="hero-unit">
            <div class="container" >
                <div style="padding: 10px;">
                  <div>Desde <input class="input-medium" type="text" id="txtFechaDesde" value="">&nbsp;&nbsp;&nbsp;
                  Hasta <input class="input-medium" type="text" id="txtFechaHasta" value=""></div>
                  <div><a style="position: relative;padding: 5px;top: -5px" href="#" id='btnDownDia' class="btn btn-info">Descargar Dia Seleccionado</a></div>
              </div>
    <!--      <div class="hero-unit">
            <h1>Hello, world!</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p>
          </div>
          <div class="row">
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div>
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
           </div>
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div>
          </div>
          <hr>
          <footer>
            <p>&copy; Company 2013</p>
          </footer>-->
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