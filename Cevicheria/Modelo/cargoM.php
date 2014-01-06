<?php
    class CargoM {
        function listar($where=null,$whereLike=null) {
            require_once '../../bd/conexion.php';
            $conex=new conexion();
            $sql="Select * from v_cargo";
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
            $sql="INSERT INTO cargo (nom_cargo,suel_cargo,estado_carg) VALUES ('$Data[0]',$Data[1],'A')";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function actualizar($Data,$id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE cargo set nom_cargo='$Data[0]',suel_cargo='$Data[1]' where cod_cargo=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function eliminar($id) {
            require_once '../bd/conexion.php';
            $sql="DELETE FROM v_cargo WHERE cod_cargo =$id";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
    }
?>