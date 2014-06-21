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
    
    require '../../Modelo/usuarioM.php';
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
    <script>
        $(document).ready(function (){ 
        });
        function validar(){
            var b=true;
            $("#Form input").css("color","#837C7C");
            var txt=$("#txtN").val();
            if(!txt.match(/[a-zA-Z]$/)){
                $("#txtN").val("").attr("placeholder","Estos datos no son validos").css("color","#DD4141");
                b=false;
            }
            txt=$("#txtA").val();
            if(!txt.match(/[a-zA-Z]$/)){
                $("#txtA").val("").attr("placeholder","Estos datos no son validos").css("color","#DD4141");
                b=false;
            }
            txt=$("#txtP").val();
            if(!txt.match(/^[a-z0-9_-]{6,18}$/)){
                $("#txtP").css("border","1px solid #DD4141");
                b=false;
            }
            return b;
        }
    </script>
    <div style="width: 60%">
        <form id="Form" action="../../Controlador/personalC.php" method="post" onsubmit="return validar();">
        <table class="table table-striped"width="100%">
        <col width="50%">
        <col width="50%">
            <tr>
                <td><label for="txtN">Nombre</label></td>
                <td><input type="text" required name="txtN" id="txtN" value="<?php echo $nom;?>" ></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td><input type="text" required name="txtA" id="txtA" value="<?php echo $ape;?>"></td>
            </tr>
            <tr>
                <td>Direccion</td>
                <td><input type="text" required name="txtD" id="txtD" value="<?php echo $dir;?>"></td>
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
                <td>Contrase&ntilde;a  (Min 6 caracteres - a-z0-9)</td>
                <td>
                    <input type="password" required name="txtP" id="txtP" value="<?php echo $pass;?>">
                    
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-primary">&nbsp;<a href="index.php" class="btn btn-info">Cancelar</a>
                </td>
            </tr>
        </table>
        <input type="hidden" name="txtAccion" value="<?php echo $accion;?>">
        <input type="hidden" name="txtId" value="<?php echo $id;?>">
      </form>
     </div>
<?php
    include '../baseFin.php';
?>