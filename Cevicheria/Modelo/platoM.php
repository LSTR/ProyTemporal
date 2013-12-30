<?php
    class PlatoM {
        function listar($where=null,$whereLike=null) {
            require_once '../../bd/conexion.php';
            $conex=new conexion();
            $sql="Select * from v_platos";
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
            $sql="INSERT INTO platos (nomb_plato,tipo_plato,descripcion,precio,estado_plat) VALUES ('$Data[0]','$Data[1]','$Data[2]','$Data[3]','A')";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function actualizar($Data,$id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE platos set nomb_plato='$Data[0]',tipo_plato='$Data[1]',descripcion='$Data[2]',precio=$Data[3]  where cod_platos=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function eliminar($id) {
            require_once '../bd/conexion.php';
//            $sql="DELETE FROM platos WHERE cod_platos =$id";
            $sql="UPDATE platos set estado='D' where cod_platos=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
    }
?>