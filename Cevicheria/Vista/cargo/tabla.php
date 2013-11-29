<?php
    $opcMenu="cargo";
    include '../base.php';
    require '../../Modelo/cargoM.php';
    $objDAO=new CargoM();
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
                <th><div style="text-align: center">Codigo</div></th>
                <th><div style="text-align: center">Nombre</div></th>
                <th><div style="text-align: center">Sueldo</div></th>
                <th colspan="2"><div style="text-align: center">Opciones</div></th>
            </tr>
        </thead>
        <?php
            foreach ($result as $val) {?>
            <tr>
                <td><?php echo "CARG00".$val->cod_cargo;?></td>
                <td><?php echo $val->nom_cargo;?></td>
                <td><?php echo $val->suel_cargo;?></td>
                <td><a href="form.php?id=<?php echo $val->cod_cargo;?>">Modificar</a></td>
                <td><a href="../../Controlador/cargoC.php?txtAccion=E&id=<?php echo $val->cod_cargo;?>">Eliminar</a></td>
            </tr>
           <?php }
        ?>
    </table>
</div>
<?php
    include '../baseFin.php';
?>