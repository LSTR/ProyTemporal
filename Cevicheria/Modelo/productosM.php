<?php
    class ProductosM {
        function listar($where=NULL) {
            require_once '../../bd/conexion.php';
            $conex=new conexion();
            $sql="Select * from v_productos";
            if($where!=NULL){
               $sql.=" where ";
                $cc=0;
                foreach ($where as $k => $val) {
                    if($cc>0)
                        $sql.=" AND ";
                    $sql.=" ".$k."='".$val."'";
                    $cc=1;
                }
            }
            return $conex->listarObject($sql);
        }
        function insertar($Data) {
            require_once '../bd/conexion.php';
            $sql="INSERT INTO productos_almacen (nombreProd,tipoProd,unidadProd,cantidadProd,descripcion,estado_Prod) VALUES ('$Data[0]','$Data[1]','$Data[2]','$Data[3]','$Data[4]','A')";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function actualizar($Data,$id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE productos_almacen set nombreProd='$Data[0]',tipoProd='$Data[1]',unidadProd='$Data[2]',cantidadProd='$Data[3]' , descripcion='$Data[4]' where id_insumos=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function eliminar($id) {
            require_once '../bd/conexion.php';
            $sql="DELETE FROM v_productos WHERE id_insumos =$id";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
    }
?>