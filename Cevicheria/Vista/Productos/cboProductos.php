<?php
    require '../../Modelo/ProductosM.php';
    $objDAO=new ProductosM();
    $result=$objDAO->listar();
?>
<select>
    <?php
        foreach ($result as $val) {?>
        <option value="<?php echo $val->id_insumos;?>"><?php echo $val->nombreProd;?></option>
       <?php }
    ?>
</select>