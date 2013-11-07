<?php
    require_once '../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ../inicio.php");
    
    require_once '../Modelo/platoM.php';
    $objDAO=new PlatoM();
    $result=$objDAO->listar();
    include '../menu.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Alumno</title>
    </head>
    <?php ?>
    <br><br><br>
    <a href="alumnoForm.php">Agregar</a>
    <br><br>
    <body>
        <table border="1" width="100%">
        <col width="10%">
        <col width="30%">
        <col width="30%">
        <col width="15%">
        <col width="15%">
        <?php
            foreach ($result as $val) {?>
            <tr>
                <td><?php echo $val->codi_alum;?></td>
                <td><?php echo $val->nombre_alumno;?></td>
                <td><?php echo $val->ciclo;?></td>
                <td><a href="alumnoForm.php?id=<?php echo $val->codi_alum;?>">Modificar</a></td>
                <td><a href="../Controlador/AlumnoC.php?txtAccion=E&id=<?php echo $val->codi_alum;?>">Eliminar</a></td>
            </tr>
           <?php }
        ?>
        </table>
    </body>
</html>