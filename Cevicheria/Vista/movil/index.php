<?php
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ".$sess->getHost());
    require "../../configuracion.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>El Clasico</title>
        <link rel="stylesheet"  href="<?php echo $pathName ?>/JQM/jquery.mobile-1.1.1.min.css" />
        <script type="text/javascript" src="<?php echo $pathName ?>/JQM/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="<?php echo $pathName ?>/JQM/jquery.mobile-1.1.1.min.js"></script>
    </head>
    <body>    
    <section id="formularios" data-role="page">
        <header data-role="header">
            <h1>Cevicheria El Clasico</h1>
        </header>
        <div class="content" data-role="content">
            <form id="formS" action="<?php echo $pathName ?>/Controlador/usuario.php" method="post" data-ajax="false">
                <label for="txtNExp">Usuario:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" id="txtNExp" name="txtUsu"  placeholder=""/>
                <label for="txtNI">Contrase&ntilde;a:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" id="txtNI" name="txtPass"  placeholder=""/>
                <input type="submit" data-theme="b" value="Ingresar" name="send"/>
            </form>
        </div>
        <footer data-role="footer" data-position="fixed">
            <h2>Cevicheria El Clasico</h2>
        </footer>
    </section>
</body>
</html>