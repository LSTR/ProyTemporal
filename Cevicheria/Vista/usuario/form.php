<?php
    $opcMenu="usuario";
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
    $Data["idUsuario"]=$id;
    $result=$objDAO->listar($Data);
    // CREA VARIABLES
    $id="";
    $cod_emp="";
    $con="";
    if(count($result)==0){
//        echo 'No Existen Datos';
        $accion="A";  // Se habilita la opcion para que se agregue
    }else{        
        $id=$result[0]->idUsuario;
        $cod_emp=$result[0]->cod_empleado;
        $con=$result[0]->contrasena;
    }
    
    
    require '../../Modelo/personalM.php';
    $objDAO=new PersonalM();
    $resultP=$objDAO->listar();
?>
    <div style="width: 60%">
        <form action="../../Controlador/UsuarioC.php" method="post">
        <table class="table table-striped"width="100%">
        <col width="50%">
        <col width="50%">
            <tr>
                <td>Usuario</td>
                <td>
                    <select name="txtN">
                        <?php
                            foreach ($resultP as $val) {?>
                            <option <?php echo $val->cod_empleado==$cod_emp?"selected":"";?> value="<?php echo $val->cod_empleado;?>"><?php echo $val->nombre." ".$val->apellido." - ".$val->nom_cargo;?></option>
                           <?php }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Clave</td>
                <td><input type="password" name="txtC" value="<?php echo $con;?>"></td>
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