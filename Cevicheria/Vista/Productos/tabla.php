<?php
    require '../../Modelo/ProductosM.php';
    $objDAO=new ProductosM();
    $WL=null;
    if($_POST["txtN"]!="")
    $WL["nombreProd"]=$_POST["txtN"];
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
            <td><div style="text-align: center">CODIGO</div></td>
            <td><div style="text-align: center">NOMBRE</div></td>
            <td><div style="text-align: center">TIPO</div></td>
            <td><div style="text-align: center">UNIDAD</div></td>
            <td><div style="text-align: center">CANTIDAD</div></td>
            <td><div style="text-align: center">DESCRIPCIÓN</div></td>
            <td colspan="2"><div style="text-align: center">OPCIONES</div></td>
        </tr>
        <?php
            foreach ($result as $val) {?>
            <tr>
                <td><?php echo "PROD00". $val->id_insumos;?></td>
                <td><?php echo $val->nombreProd;?></td>
                <td><?php echo $val->tipoProd;?></td>
                <td><?php echo $val->unidadProd;?></td>
                <td><?php echo $val->cantidadProd;?></td>
                <td><?php echo $val->descripcion;?></td>
                <td><a href="form.php?id=<?php echo $val->id_insumos;?>">Modificar</a></td>
                <td><a href="../../Controlador/ProductosC.php?txtAccion=E&id=<?php echo $val->id_insumos;?>">Eliminar</a></td>
            </tr>
           <?php }
        ?>
    </table>
</div>