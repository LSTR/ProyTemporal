<?php
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
    } 
    require_once '../../Modelo/BebidasM.php';
    $objDAO=new BebidasM();
    $Data["id_bebidas"]=$id;
    $result=$objDAO->listar($Data);
    // CREA VARIABLES
    $id="";
    $nomb="";
    $prec="";
    $descrip="";
    if(count($result)==0){
        $accion="A";  // Se habilita la opcion para que se agregue
    }else{        
        $id=$result[0]->id_bebidas;
        $nom=$result[0]->nomb_bebida;
        $prec=$result[0]->precio_bebida;
        $descrip=$result[0]->descripcion;
    }
?>
<div style="width: 60%">
    <form action="../../Controlador/BebidasC.php" method="post">
        <table class="table table-striped"width="100%">
        <col width="50%">
        <col width="50%">
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="txtN" value="<?php echo $nom;?>"></td>
            </tr>
            <tr>
                <td>precio</td>
                <td><input type="text" name="txtP" value="<?php echo $prec;?>"></td>
            </tr>
            <tr>
                <td>Descripcion</td>
                <td><input type="text" name="txtD" value="<?php echo $descrip;?>"></td>
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