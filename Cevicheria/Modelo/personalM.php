<?php
    class PersonalM {
    function listar($where=null,$whereLike=null,$op=0) {
            if($op==0)
                require '../../bd/conexion.php';
            $conex=new conexion();
            $sql="Select * from v_personal";
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
    function listarAll($where=null,$whereLike=null,$op=0) {
            if($op==0)
                require '../../bd/conexion.php';
            $conex=new conexion();
            $sql="Select * from personal";
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
            $sql="INSERT INTO personal (nombre,apellido,direccion,cod_cargo,estado_empl) VALUES ('$Data[0]','$Data[1]','$Data[2]','$Data[3]','A')";
            $con=new conexion();
            return $con->insertGetId($sql);
        }
        function actualizar($Data,$id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE personal set nombre='$Data[0]',apellido='$Data[1]',direccion='$Data[2]',cod_cargo='$Data[3]' where cod_empleado=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function eliminar($id,$nst) {
            $nst=$nst=="A"?"B":"A";
            require_once '../bd/conexion.php';
            $sql="UPDATE personal set estado_empl='$nst' where cod_empleado=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
    }
?>