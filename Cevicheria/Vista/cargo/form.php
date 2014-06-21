<?php
// CREA VARIABLES
    $id="";
    $nom="";
    $suel=0;
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
   if(count($result)==0){
//        echo 'No Existen Datos';
        $accion="A";  // Se habilita la opcion para que se agregue
    }else{        
        $id=$result[0]->cod_cargo;
        $nom=$result[0]->nom_cargo;
        $suel=$result[0]->suel_cargo;
    }
?>
    <script>
        $(document).ready(function (){ 
        });
        function validar(){
            var b=true;
            $("#Form input").css("color","#837C7C");
            var txt=$("#txtN").val();
            if(!txt.match(/[a-zA-Z]$/)){
                $("#txtN").val("").attr("placeholder","Solo letras").css("color","#DD4141");
                b=false;
            }
            txt=$("#txtS").val();
            if(!txt.match(/^\d+(\.\d{1,2})?$/)){
                $("#txtS").val("").attr("placeholder","Solo Numeros").css("color","#DD4141");
                b=false;
            }
            return b;
        }
    </script>
    <div style="width: 60%">
      <form id="Form" action="../../Controlador/cargoC.php" method="post" onsubmit="return validar();">
        <table class="table table-striped"width="100%">
        <col width="50%">
        <col width="50%">
            <tr>
                <td>Nombre</td>
                <td><input type="text" required name="txtN" id="txtN" value="<?php echo $nom;?>"></td>
            </tr>
            <tr>
                <td>Sueldo</td>
                <td><input type="text" required name="txtS" id="txtS" value="<?php echo $suel;?>"></td>
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
    include '../base.php';
?>