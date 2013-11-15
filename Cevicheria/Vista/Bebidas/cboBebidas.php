<?php
    require '../../Modelo/BebidasM.php';
    $objDAO=new BebidasM();
    $result=$objDAO->listar();
?>
<select>
    <?php
        foreach ($result as $val) {?>
        <option value="<?php echo $val->id_bebidas;?>"><?php echo $val->nomb_bebida;?></option>
       <?php }
    ?>
</select>