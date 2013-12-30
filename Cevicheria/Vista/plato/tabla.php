<?php
    require '../../Modelo/platoM.php';
    $objDAO=new platoM();
    $WL=null;
    if($_POST["txtN"]!="")
    $WL["nomb_plato"]=$_POST["txtN"];
    if($_POST["cboTipo"]!="")
    $WL["tipo_plato"]=$_POST["cboTipo"];
    $result=$objDAO->listar(null,$WL);
?>
<div id="contenido">
    <table border="1" width="100%" class="table">
        <col width="10%">
        <col width="30%">
        <col width="30%">
        <col width="10%">
        <col width="10%">
        <col width="10%">
        <tr>
            <td><div style="text-align: center">Codigo</div></td>
            <td><div style="text-align: center">Nombre</div></td>
            <td><div style="text-align: center">Descripcion</div></td>
            <td><div style="text-align: center">Precio</div></td>
            <td colspan="2"><div style="text-align: center">Opciones</div></td>
        </tr>
        <?php
            foreach ($result as $val) {?>
            <tr>
                <td><?php echo "PLAT00".$val->cod_platos;?></td>
                <td><?php echo $val->nomb_plato;?></td>
                <td><?php echo $val->descripcion;?></td>
                <td><?php echo $val->precio;?></td>
                <td><a href="form.php?id=<?php echo $val->cod_platos;?>">Modificar</a></td>
                <td><a href="../../Controlador/platoC.php?txtAccion=E&id=<?php echo $val->cod_platos;?>">Eliminar</a></td>
            </tr>
           <?php }
        ?>
    </table>
</div>