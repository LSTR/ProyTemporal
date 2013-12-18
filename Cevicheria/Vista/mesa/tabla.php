<?php
    $opcMenu="mesa";
    include '../base.php';
    require '../../Modelo/mesaM.php';
    $objDAO=new MesaM();
    $result=$objDAO->listar();
?>
<div id="contenido">
    <div style="padding: 8px">
    <a href="form.php" class="btn btn-info">+ Agregar Nuevo</a>
    
<!--    <a href="reporte.php" class="btn btn-success">Descargar Reporte</a>-->
    </div>
    <table border="1" width="100%" class="table">
        <col width="10%">
        <col width="30%">
        <col width="30%">
        <col width="10%">
        <col width="10%">
        <col width="10%">
        <tr>

            <td><div style="text-align: center">codigo</div></td>
            <td><div style="text-align: center">descripcion</div></td>
            <td><div style="text-align: center">ubicacion</div></td>
<!--            <td><div style="text-align: center">Descripcion</div></td>
            <td><div style="text-align: center">Precio</div></td>-->
            <td colspan="2"><div style="text-align: center">Opciones</div></td>
        </tr>
        <?php
            foreach ($result as $val) {?>
            <tr>
                <td><?php echo "MES00".$val->num_mesa;?></td>
                <td><?php echo $val->descripcion;?></td>
                <td><?php echo $val->ubicacion;?></td>
<!--                <td><?php // echo $val->descripcion;?></td>
                <td><?php // echo $val->precio_bebida;?></td>-->
                
                <td><a href="form.php?id=<?php echo $val->num_mesa;?>">Modificar</a></td>
                <td><a href="../../Controlador/mesaC.php?txtAccion=E&id=<?php echo $val->num_mesa;?>">Eliminar</a></td>
            </tr>
           <?php }
        ?>
    </table>
</div>
<?php
    include '../baseFin.php';
?>