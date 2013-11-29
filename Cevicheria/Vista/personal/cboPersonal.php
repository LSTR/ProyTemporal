<?php
    require '../../Modelo/personalM.php';
    $objDAO=new PersonalM();
    $result=$objDAO->listar();
?>
<select name="cboPersonal">
    <?php
        foreach ($result as $val) {?>
        <option value="<?php echo $val->cod_empleado;?>"><?php echo $val->nombre;?></option>
       <?php }
    ?>
</select>