<?php
    $opcMenu="productos";
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
    require_once '../../Modelo/ProductosM.php';
    $objDAO=new ProductosM();
    $Data["cod_producto"]=$id;
    $result=$objDAO->listar($Data);
    // CREA VARIABLES
    $id="";
    $nomb="";
    $marcProd="";
    $descrip="";
    $cantidad="";
    if(count($result)==0){
        $accion="A";  // Se habilita la opcion para que se agregue
    }else{        
        $id=$result[0]->cod_producto;
        $nom=$result[0]->nombre;
        $marcProd=$result[0]->marca;
        $cantidad=$result[0]->cantidad;
    }
?>
<div style="width: 60%">
    <form action="../../Controlador/ProductosC.php" method="post">
        <table class="table table-striped"width="100%">
        <col width="50%">
        <col width="50%">
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="txtN" value="<?php echo $nom;?>"></td>
            </tr>
            <tr>
                <td>Marca</td>
                <td><input type="text" name="txtM" value="<?php echo $marcProd;?>"></td>
            </tr>
            <tr>
                <td>Cantidad</td>
                <td><input type="text" name="txtC" value="<?php echo $cantidad;?>"></td>
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