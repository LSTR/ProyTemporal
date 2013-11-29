<?php
    $opcMenu="usuario";
    include '../base.php';
    require '../../Modelo/usuarioM.php';
    $objDAO=new UsuarioM();
    $result=$objDAO->listar();
?>
<div id="contenido">
    <div style="padding: 8px">
        <a href="form.php" class="btn btn-info">+ Agregar Nuevo</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="reporte.php" class="btn btn-success">Descargar Reporte</a>
    </div>
    <table class="table" border="1" width="100%">
        <col width="10%">
        <col width="30%">
        <col width="30%">
        <col width="15%">
        <col width="15%">
        <thead>
            <tr>
<!--                <th><div style="text-align: center">Codigo</div></th>-->
                <th><div style="text-align: center">Usuario</div></th>
                <th><div style="text-align: center">Clave</div></th>
                <th colspan="2"><div style="text-align: center">Opciones</div></th>
            </tr>
        </thead>
        <?php
       
            foreach ($result as $val) {?>
            <tr>
<!--                <td><?php // echo $val->idUsuario;?></td>-->
                <td><?php echo "PERS00". $val->cod_empleado;?></td>
                <td><?php echo $val->contrasena;?></td>
                <td><a href="form.php?id=<?php echo $val->idUsuario;?>">Modificar</a></td>
                <td><a href="../../Controlador/UsuarioC.php?txtAccion=E&id=<?php echo $val->idUsuario;?>">Eliminar</a></td>
            </tr>
           <?php }
        ?>
    </table>
</div>
<?php
    include '../baseFin.php';
?>