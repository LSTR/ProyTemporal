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
<script src="js/validar.js" type="text/javascript"></script>
<div style="width: 60%">
    <form action="../../Controlador/BebidasC.php" method="post" >
        <table class="table table-striped"width="100%">
        <col width="50%">
        <col width="50%">
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="txtN" required value="<?php echo $nomb;?>"></td>
            </tr>
            <tr>
                <td>Categoría</td>
                <td><input type="text" name="txtT" required value="<?php echo $tip;?>"></td>
            </tr>
            <tr>
                <td>Descripcion</td>
                <td><input type="text" name="txtD"  value="<?php echo $descrip;?>"></td>
            </tr>
            <tr>
                <td>precio</td>
                <td><input type="text" name="txtP" required value="<?php echo $prec;?>"></td>
            </tr>
            
            <tr>
                <td><input type="hidden" name="txtAccion" value="<?php echo $accion;?>">
                    <input type="hidden" name="txtId" value="<?php echo $id;?>"></td>
                <td><input type="submit" class="btn btn-primary">&nbsp;<a href="tabla.php" class="btn btn-info">Cancelar</a>
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