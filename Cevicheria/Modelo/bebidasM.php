<?php
    class BebidasM {
        function listar($where=null,$whereLike=null) {
            require_once '../../bd/conexion.php';
            $conex=new conexion();
            $sql="Select * from v_bebidas";
            $cc=0;
            if($where!=null){
                $sql.=" where ";
                foreach ($where as $k => $val) {
                    if($cc>0)
                        $sql.=" AND ";
                    $sql.=" ".$k."='".$val."'";
                    $cc=1;
                }
            }
            if($whereLike!=null){
                if($cc==0)
                   $sql.=" where ";
                foreach ($whereLike as $k => $val) {
                    if($cc>0)
                        $sql.=" AND ";
                    $sql.=" ".$k." like '%".$val."%'";
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