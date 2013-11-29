<?php
    class BebidasM {
        function listar($where=NULL) {
            require_once '../../bd/conexion.php';
            $conex=new conexion();
            $sql="Select * from v_bebidas";
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
            $sql="INSERT INTO bebidas (nomb_bebida,tipo_beb,descripcion,precio_bebida,estado_Beb) VALUES ('$Data[0]','$Data[1]','$Data[2]',$Data[3],'A')";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function actualizar($Data,$id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE bebidas set nomb_bebida='$Data[0]',tipo_beb='$Data[1]',descripcion='$Data[2]',precio_bebida='$Data[3]' where id_bebidas=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function eliminar($id) {
            require_once '../bd/conexion.php';
            $sql="DELETE FROM v_bebidas WHERE id_bebidas =$id";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
    }
?>