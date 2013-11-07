<?php
    require_once '../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ../inicio.php");
    $accion="A";
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $accion="U";
    }
    
    require_once '../Modelo/alumnoM.php';
    $objDAO=new AlumnoM();
    $Data["codi_alum"]=$id;
    $result=$objDAO->listar($Data);
    // CREA VARIABLES
    $id="";
    $alu="";
    $cic="";
    if(count($result)==0){
        echo 'No Existen Datos';
        $accion="A";  // Se habilita la opcion para que se agregue
    }else{
        $id=$result[0]->codi_alum;
        $alu=$result[0]->nombre_alumno;
        $cic=$result[0]->ciclo;
    }
    include '../menu.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Alumno</title>
    </head>
    <?php ?>
    <body>
        <div style="position: absolute;left: 30%;width:40%"></div>
        <form action="../Controlador/AlumnoC.php" method="post">
            <table border="1" width="100%">
            <col width="50%">
            <col width="50%">
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" name="txtN" value="<?php echo $alu;?>"></td>
                </tr>
                <tr>
                    <td>Ciclo</td>
                    <td><input type="text" name="txtC" value="<?php echo $cic;?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="txtAccion" value="<?php echo $accion;?>">
                        <input type="hidden" name="txtId" value="<?php echo $id;?>"></td>
                    <td><input type="submit"></td>
                </tr>
            </table>
           </form>
    </body>
</html>