<?php
    require '../../Modelo/personalM.php';
    $objDAO=new PersonalM();
    $WL=null;
    $W=null;
    if($_POST["txtN"]!="")
        $WL["nombre"]=$_POST["txtN"];
    if($_POST["txtA"]!="")
        $WL["apellido"]=$_POST["txtA"];
    if($_POST["cboCargo"]!="")
        $W["cod_cargo"]=$_POST["cboCargo"];
    $result=$objDAO->listarAll($W,$WL);
    ////CARGOS
    require '../../Modelo/cargoM.php';
    $objDAO=new CargoM();
    $resC=$objDAO->listar();
    $LCargo=array();
    foreach ($resC as $v)$LCargo[$v->cod_cargo]=$v->nom_cargo;
?>
<div id="contenido">
    
    <table class="table table-striped table-hover" border="0" width="100%">
        <col width="10%">
        <col width="30%">
        <col width="30%">
        <col width="15%">
        <col width="15%">
        <thead>
            <tr>
                <th><div style="text-align: center">Codigo</div></th>
                <th><div style="text-align: center">Nombre</div></th>
                <th><div style="text-align: center">Apellido</div></th>
                <th><div style="text-align: center">Direccion</div></th>
                <th><div style="text-align: center">Cargo</div></th>
                <th colspan="2"><div style="text-align: center">Opciones</div></th>
            </tr>
        </thead>
        <?php
            foreach ($result as $val) {
            $cod=$val->cod_empleado;
            $cad="P00000";
            $cod=substr($cad,0,  strlen($cad)-strlen($cod)).$cod;
            ?>
            <tr>
                <td><?php echo $cod?></td>
                <td><?php echo $val->nombre;?></td>
                <td><?php echo $val->apellido;?></td>
                <td><?php echo $val->direccion;?></td>
                <td><?php echo $LCargo[$val->cod_cargo];?></td>
                <td><a href="form.php?id=<?php echo $val->cod_empleado;?>">Modificar</a></td>
                <td><a href="../../Controlador/personalC.php?txtAccion=E&id=<?php echo $val->cod_empleado;?>&st=<?php echo $val->estado_empl;?>">
                    <?php echo $val->estado_empl=="A"?"Deshabilitar":"Habilitar"?></a></td>
            </tr>
           <?php }?>
    </table>
</div>