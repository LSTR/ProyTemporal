<?php
    require '../../Modelo/BebidasM.php';
    $objDAO=new BebidasM();
    $WL=null;
    if($_POST["txtN"]!="")
    $WL["nomb_bebida"]=$_POST["txtN"];
    if($_POST["cboTipo"]!="")
    $WL["tipo_beb"]=$_POST["cboTipo"];
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
            <td><div style="text-align: center">Categoria</div></td>
            <td><div style="text-align: center">Descripcion</div></td>
            <td><div style="text-align: center">Precio</div></td>
            <td colspan="2"><div style="text-align: center">Opciones</div></td>
        </tr>
        <?php
            foreach ($result as $val) {?>
            <tr>
                <td><?php echo "BEB00".$val->id_bebidas;?></td>
                <td><?php echo $val->nomb_bebida;?></td>
                <td><?php echo $val->tipo_beb;?></td>
                <td><?php echo $val->descripcion;?></td>
                <td><?php echo $val->precio_bebida;?></td>
                
                <td><a href="form.php?id=<?php echo $val->id_bebidas;?>">Modificar</a></td>
                <td><a href="../../Controlador/BebidasC.php?txtAccion=E&id=<?php echo $val->id_bebidas;?>">Eliminar</a></td>
            </tr>
           <?php }
        ?>
    </table>
</div>