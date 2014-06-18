<?php
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ".$sess->getHost());
    require "../../configuracion.php";
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
    </style>
    <link href="<?php echo $pathBootstrap?>/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $pathBootstrap?>/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $pathBootstrap?>/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $pathBootstrap?>/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $pathBootstrap?>/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo $pathBootstrap?>/ico/favicon.png">
  </head>
  <body>
        <script src="<?php echo $pathBootstrap?>/scripts/jquery.min.js"></script>
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
        <script src="../../js/bootstrapValidator.js"></script>
    
    <!--INI NAVBAR-->
    <?php
         $inc='../navbar.php';
         include $inc;
    ?>
    <!--FIN NAVBAR-->
   
    <div class="container">