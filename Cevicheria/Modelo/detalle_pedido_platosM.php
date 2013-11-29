<?php
    class detalle_pedido_platosM {
        function listar($where=NULL) {
            require_once '../../bd/conexion.php';
            $conex=new conexion();
            $sql="Select * from v_detalle_pedido_platos";
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
            $sql="INSERT INTO detalle_pedido_platos(cantidad,cod_platos,id_pedido,estado_cocina) VALUES ('1',$Data[0],'$Data[1]','A')";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function PlatoListo($id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE detalle_pedido_platos set estado_cocina='E' where cod_detallePed=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function eliminar($id) {
            require_once '../bd/conexion.php';
            $sql="DELETE FROM detalle_pedido_platos WHERE cod_detallePed =$id";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
    }
?>