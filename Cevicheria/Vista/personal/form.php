<?php
// CREA VARIABLES
   
    $id="";
    $nom="";
    $ape="";
    $dir="";
    $cod_cargo="";
    $pass="";
    $opcMenu="personal";
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
    
    require_once '../../Modelo/usuarioM.php';
    $objDAO=new UsuarioM();
    $Data["cod_empleado"]=$id;
    $result=$objDAO->listar($Data);
    
    if(count($result)==0){
        $accion="A";  // Se habilita la opcion para que se agregue
    }else{        
        $id=$result[0]->cod_empleado;
        $nom=$result[0]->nombre;
        $ape=$result[0]->apellido;
        $dir=$result[0]->direccion;
        $cod_cargo=$result[0]->cod_cargo;
        $pass=$result[0]->contrasena;
    }
    
    require '../../Modelo/cargoM.php';
    $objDAO=new CargoM();
    $resultC=$objDAO->listar();
?>
    <div style="width: 60%">
      <form action="../../Controlador/personalC.php" method="post">
        <table class="table table-striped"width="100%">
        <col width="50%">
        <col width="50%">
            <tr>
                <td>Nombre</td>
                <td><input type="text" required name="txtN" value="<?php echo $nom;?>"></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td><input type="text" required name="txtA" value="<?php echo $ape;?>"></td>
            </tr>
            <tr>
                <td>Direccion</td>
                <td><input type="text" required name="txtD" value="<?php echo $dir;?>"></td>
            </tr>
            <tr>
                <td>Cargo</td>
                <td>
                    <select name="cboCargo">
                        <?php
                            foreach ($resultC as $val) {?>
                            <option <?php echo $val->cod_cargo==$cod_cargo?"selected":"";?> value="<?php echo $val->cod_cargo;?>"><?php echo $val->nom_cargo;?></option>
                           <?php }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Contrase&ntilde;a</td>
                <td><input type="password" required name="txtP" value="<?php echo $pass;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="txtAccion" value="<?php echo $accion;?>">
                    <input type="hidden" name="txtId" value="<?php echo $id;?>"></td>
                <td><input type="submit" class="btn btn-primary">&nbsp;<a href="index.php" class="btn btn-info">Cancelar</a>
                </td>
            </tr>
        </table>
       </form>
     </div>
<?php
    include '../baseFin.php';
?>