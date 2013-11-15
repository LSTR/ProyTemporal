<?php
    class PersonalM {
        function listar($where=null) {
            session_start();
            if(isset($_SESSION["active"])) require_once '../../bd/conexion.php';
            $conex=new conexion();
            $sql="Select * from v_personal";
            if($where!=null){
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
            $sql="INSERT INTO personal (nombre,apellido,direccion,cod_cargo,estado) VALUES ('$Data[0]','$Data[1]','$Data[2]','$Data[3]','A')";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function actualizar($Data,$id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE personal set nombre='$Data[0]',apellido='$Data[1]',direccion='$Data[2]',cod_cargo='$Data[3]' where cod_empleado=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function eliminar($id) {
            require_once '../bd/conexion.php';
            $sql="DELETE FROM personal WHERE cod_empleado =$id";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
    }
?>