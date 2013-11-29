<?php
 // CREA VARIABLES
    $id="";
    $nom="";
    $tipoProd="";
    $unidProd="";
    $cantidadProd=0;
    $descripcion="";
    $opcMenu="productos";
    include '../base.php';
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ../inicio.php");
    $accion="A";
//    $id="";
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $accion="U";
    } 
    require_once '../../Modelo/ProductosM.php';
    $objDAO=new ProductosM();
    $Data["id_insumos"]=$id;
    $result=$objDAO->listar($Data);
   

    if(count($result)==0){
        $accion="A";  // Se habilita la opcion para que se agregue
    }else{        
        $id=$result[0]->id_insumos;
        $nom=$result[0]->nombreProd;
        $tipoProd=$result[0]->tipoProd;
        $unidProd=$result[0]->unidadProd;
        $cantidadProd=$result[0]->cantidadProd;
        $descripcion=$result[0]->descripcion;
    }
?>
<div style="width: 60%">
    <form action="../../Controlador/ProductosC.php" method="post">
        <table class="table table-striped"width="100%">
        <col width="50%">
        <col width="50%">
            <tr>
                <td>Nombre</td>
                <td><input type="text" required name="txtN" value="<?php echo $nom;?>"></td>
            </tr>
            <tr>
                <td>Tipo</td>
                <td><input type="text" required name="txtT" value="<?php echo $tipoProd;?>"></td>
            </tr>
            <tr>
                <td>Unidad</td>
                <td><input type="text" required name="txtU" value="<?php echo $unidProd;?>"></td>
            </tr>
            <tr>
                <td>Cantidad</td>
                <td><input type="number" required name="txtC" value="<?php echo $cantidadProd;?>"></td>
            </tr>
            <tr>
                <td>Descripción</td>
                <td><input type="text" name="txtD" value="<?php echo $descripcion;?>"></td>
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