<?php
    $opcMenu="cargo";
    include '../base.php';
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ../inicio.php");
    $accion="A";
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $accion="U";
    }
    
    require_once '../../Modelo/cargoM.php';
    $objDAO=new CargoM();
    $Data["cod_cargo"]=$id;
    $result=$objDAO->listar($Data);
    // CREA VARIABLES
    $id="";
    $nom="";
    $suel="";
    if(count($result)==0){
//        echo 'No Existen Datos';
        $accion="A";  // Se habilita la opcion para que se agregue
    }else{        
        $id=$result[0]->cod_cargo;
        $nom=$result[0]->nom_cargo;
        $suel=$result[0]->suel_cargo;
    }
?>
    <div style="width: 60%">
       <form action="../../Controlador/cargoC.php" method="post">
        <table class="table table-striped"width="100%">
        <col width="50%">
        <col width="50%">
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="txtN" value="<?php echo $nom;?>"></td>
            </tr>
            <tr>
                <td>Sueldo</td>
                <td><input type="text" name="txtS" value="<?php echo $suel;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="txtAccion" value="<?php echo $accion;?>">
                    <input type="hidden" name="txtId" value="<?php echo $id;?>"></td>
                <td><input type="submit" class="btn btn-primary">&nbsp;<a href="tabla.php" class="btn btn-info">Cancelar</a>
                </td>
            </tr>
        </table>
       </form>
     </div>
<?php
    include '../base.php';
?>