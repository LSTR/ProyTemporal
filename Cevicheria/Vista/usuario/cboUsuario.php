<?php
    require '../../Modelo/cargoM.php';
    $objDAO=new CargoM();
    $result=$objDAO->listar();
?>
<select name="cboCargo">
    <?php
        foreach ($result as $val) {?>
        <option value="<?php echo $val->cod_cargo;?>"><?php echo $val->nom_cargo;?></option>
       <?php }
    ?>
</select>