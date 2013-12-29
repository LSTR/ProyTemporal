<?php
    class PedidoM {
        function listar($where=NULL,$opc=0) {
            if($opc==0)
                require_once '../../bd/conexion.php';
            else require_once '../bd/conexion.php';
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
            $sql.=" order by id_pedido desc";
            return $conex->listarObject($sql);
        }
        function getMesa($id){
            $W["id_pedido"]=$id;
            $r=$this->listar($W,1);
            return $r[0]->num_mesa;
        }
        function insertar($Data) {
            require_once '../bd/conexion.php';
            $sql="INSERT INTO pedido (especificaciones,cod_empleado,num_mesa,estado_Pedido) VALUES ('$Data[0]','$Data[1]','$Data[2]','A')";
            $con=new conexion();
            $con->ejecutaQuery($sql);
            /// AHORA PARA MODIFICAR ESTADO DE MESA
            $sql="UPDATE mesa set descripcion='NO DISPONIBLE' where num_mesa=".$Data[2];
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function actualizar($Data,$id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE pedido set especificaciones='$Data[0]',cod_empleado='$Data[1]',num_mesa='$Data[2]' where id_pedido=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function cancelar($id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE pedido set estado_Pedido='C', especificaciones='Cancelado' where id_pedido=".$id;
            $con=new conexion();
            $con->ejecutaQuery($sql);
            $sql="UPDATE mesa set descripcion='DISPONIBLE' where num_mesa=".$this->getMesa($id);
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function finalizar($id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE pedido set estado_Pedido='D', especificaciones='Finalizado' where id_pedido=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function pagarCaja($id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE pedido set estado_Pedido='E', especificaciones='Pagado' where id_pedido=".$id;
            $con=new conexion();
            $con->ejecutaQuery($sql);
            $sql="UPDATE mesa set descripcion='DISPONIBLE' where num_mesa=".$this->getMesa($id);
            return $con->ejecutaQuery($sql);
        }
        function enviarPedido($id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE pedido set estado_Pedido='B', especificaciones='Pedido Realizado' where id_pedido=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
    }
/*
        1- A PrePedido       -> Cuando se hace el pedido
        2- B Pedido realizado -> Cuando ya hizo los pedidos
        3- C Cancelado       -> Cuando se cancela el servicio
        4- D Finalizado       -> Cuando se termina el servicio
 */
?>