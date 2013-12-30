<?php
    $num_mesa="";
    $descripcion="";
    $ubicacion="";
    $opcMenu="mesa";
    include '../base.php';
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ../inicio.php");
    $accion="A";
    
    if(isset($_GET["id"])){
        $num_mesa=$_GET["id"];
        $accion="U";
//        $E[1] = "Datos Imcompletos";
    } 
    require_once '../../Modelo/mesaM.php';
    $objDAO=new MesaM();
    $Data["num_mesa"]=$num_mesa;
    $result=$objDAO->listar($Data);
    // CREA VARIABLES
    
   
    
    if(count($result)==0){
        $accion="A";  // Se habilita la opcion para que se agregue
    }else{        
        $num_mesa=$result[0]->num_mesa;
        $descripcion=$result[0]->descripcion;
        $ubicacion=$result[0]->ubicacion;
       
    }
?>
<script src="js/validar.js" type="text/javascript"></script>
<div style="width: 60%">
    <form action="../../Controlador/mesaC.php" method="post" >
        <table class="table table-striped"width="100%">
        <col width="50%">
        <col width="50%">
<!--            <tr>
                <td>Numero_Mesa</td>
                <td><input type="text" name="txtN" required value="<?php // echo $num_mesa;?>"></td>
            </tr>-->
            <tr>
                <td>Descripcion</td>
                <td><input type="text" name="txtD"  value="<?php echo $descripcion;?>"></td>
            </tr>
            <tr>
                <td>Ubicacion</td>
                <td><input type="text" name="txtU"  required value="<?php echo $ubicacion;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="txtAccion" value="<?php echo $accion;?>">
                    <input type="hidden" name="txtId" value="<?php echo $num_mesa;?>"></td>
                <td><input type="submit" class="btn btn-primary">&nbsp;<a href="index.php" class="btn btn-info">Cancelar</a>
                </td>
            </tr>
            <tr>
                <label class="text-error"><?php if (isset($_GET["e"])) echo $E[$_GET["e"]]; ?></label>
            </tr>
        </table>
       </form>
</div>
<?php
    include '../base.php';
?>