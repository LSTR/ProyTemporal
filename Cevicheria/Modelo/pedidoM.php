<?php
    class PedidoM {
        function listar($where=NULL) {
            require_once '../../bd/conexion.php';
            $conex=new conexion();
            $sql="Select * from v_pedido";
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
            $sql="INSERT INTO pedido (especificaciones,cod_empleado,num_mesa,estado_Pedido) VALUES ('$Data[0]','$Data[1]','$Data[2]','A')";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function actualizar($Data,$id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE pedido set especificaciones='$Data[0]',cod_empleado='$Data[1]',num_mesa='$Data[2]' where id_pedido=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function eliminar($id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE pedido set estado_Pedido='D' where id_pedido=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
    }
?>