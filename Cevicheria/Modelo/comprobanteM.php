<?php
    class ComprobanteM {
        function listar($where=NULL) {
            require_once '../../bd/conexion.php';
            $conex=new conexion();
            $sql="Select * from tb_comprobante";
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
            $sql="INSERT INTO tb_comprobante (fecha,total,estado,id_pedido) VALUES ('$Data[0]','$Data[1]','$Data[2]','$Data[3]')";
            $con=new conexion();
            return $con->insertGetId($sql);
        }
        function nuevaFactura($Data) {
            require_once '../bd/conexion.php';
            $sql="INSERT INTO tb_factura (cliente,ruc,telefono,id_comprobante) VALUES ('$Data[0]','$Data[1]','$Data[2]','$Data[3]')";
            $con=new conexion();
            return $con->insertGetId($sql);
        }
        function addNFactura($N,$id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE tb_factura set numero_factura='$N' where id_factura=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function nuevaBoleta($Data) {
            require_once '../bd/conexion.php';
            $sql="INSERT INTO tb_boleta (cliente,dni,telefono,id_comprobante) VALUES ('$Data[0]','$Data[1]','$Data[2]','$Data[3]')";
            $con=new conexion();
            return $con->insertGetId($sql);
        }
        function addNBoleta($N,$id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE tb_boleta set numero_boleta='$N' where id_boleta=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
    }
?>