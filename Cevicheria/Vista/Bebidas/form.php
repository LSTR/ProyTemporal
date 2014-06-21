<?php
    $id="";
    $nomb="";
    $tip="";
    $descrip="";
    $prec=0;
    $opcMenu="bebidas";
    include '../base.php';
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ../inicio.php");
    $accion="A";
    
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $accion="U";
//        $E[1] = "Datos Imcompletos";
    } 
    require_once '../../Modelo/BebidasM.php';
    $objDAO=new BebidasM();
    $Data["id_bebidas"]=$id;
    $result=$objDAO->listar($Data);
    // CREA VARIABLES
    
   
    
    if(count($result)==0){
        $accion="A";  // Se habilita la opcion para que se agregue
    }else{        
        $id=$result[0]->id_bebidas;
        $nomb=$result[0]->nomb_bebida;
        $tip=$result[0]->tipo_beb;
         $descrip=$result[0]->descripcion;
        $prec=$result[0]->precio_bebida;
       
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
            var txt=$("#txtT").val();
            if(!txt.match(/[a-zA-Z]$/)){
                $("#txtT").val("").attr("placeholder","Solo letras").css("color","#DD4141");
                b=false;
            }
            txt=$("#txtP").val();
            if(!txt.match(/^\d+(\.\d{1,2})?$/)){
                $("#txtP").val("").attr("placeholder","Solo Numeros").css("color","#DD4141");
                b=false;
            }
            return b;
        }
</script>
<div style="width: 60%">
    <form id="Form" action="../../Controlador/BebidasC.php" method="post" onsubmit="return validar()">
        <table class="table table-striped"width="100%">
        <col width="50%">
        <col width="50%">
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="txtN" id="txtN" required value="<?php echo $nomb;?>"></td>
            </tr>
            <tr>
                <td>Categoría</td>
                <td><input type="text" name="txtT" id="txtT" required value="<?php echo $tip;?>"></td>
            </tr>
            <tr>
                <td>Descripcion</td>
                <td><input type="text" name="txtD" id="txtD" value="<?php echo $descrip;?>"></td>
            </tr>
            <tr>
                <td>precio</td>
                <td><input type="text" name="txtP" id="txtP" required value="<?php echo $prec;?>"></td>
            </tr>
            
            <tr>
                <td><input type="hidden" name="txtAccion" value="<?php echo $accion;?>">
                    <input type="hidden" name="txtId" value="<?php echo $id;?>"></td>
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