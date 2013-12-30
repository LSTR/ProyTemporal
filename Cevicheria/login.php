<?php
require 'session.php';
$sess = new session();
if ($sess->sesionActiva())
    header("Location: inicio.php");
require 'configuracion.php';
$E[1] = "Datos Incorrectos";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Cevicheria El Clasico</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="<?php echo $pathBootstrap ?>/css/bootstrap.css" rel="stylesheet">
        <script src="js/validar.js" type="text/javascript"></script>
        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
                background-image: url('img/bg_lg.jpg');
            }
            .container{
                border-radius: 10px;
            }
            .container .form-signin{
                background-color: rgba(255, 255, 255, 0);
            }
            .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin input[type="text"],
            .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }
        </style>
        <link href="<?php echo $pathBootstrap ?>/css/bootstrap-responsive.css" rel="stylesheet">
    </head>
    <body>
        <br><br><br><br><br><br><br><br>
        <div class="container">
            <form class="form-signin" method="post" action="Controlador/usuario.php" onsubmit="return login();">
                <h2 class="form-signin-heading">Ingreso al Sistema</h2>

                <select name="txtUsu">
                    <?php
                    require 'Modelo/personalM.php';
                    require 'bd/conexion.php';
                    $objDAO = new PersonalM();
                    $resultP = $objDAO->listar(null,null,1);
                    foreach ($resultP as $val) {
                        ?>
                        <option value="<?php echo $val->cod_empleado; ?>"><?php echo $val->nombre . " " . $val->apellido; ?></option>
                    <?php }
                    ?>
                </select>
                <input type="password" id="txtPass" name="txtPass" class="input-block-level" placeholder="contraseña">
                <label class="text-error"><?php if (isset($_GET["e"])) echo $E[$_GET["e"]]; ?></label>
                <button class="btn btn-large btn-primary" type="submit">Ingresar</button>
            </form>
        </div>
    </body>
</html>