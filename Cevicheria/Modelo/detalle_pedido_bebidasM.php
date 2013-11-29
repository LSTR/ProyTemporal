<?php
    class detalle_pedido_bebidaM {
        function listar($where=NULL) {
            require_once '../../bd/conexion.php';
            $conex=new conexion();
            $sql="Select * from v_detalle_pedido_bebidas";
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
            $sql="INSERT INTO detalle_pedido_bebidas(cantidad,id_bebidas,id_pedido) VALUES ('1',$Data[0],'$Data[1]')";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function eliminar($id) {
            require_once '../bd/conexion.php';
            $sql="DELETE FROM detalle_pedido_bebidas WHERE cod_detallePedBeb =$id";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
    }
?>