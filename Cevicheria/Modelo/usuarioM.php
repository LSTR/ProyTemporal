<?php
    class UsuarioM {
        function listar($where=null) {
//            session_start();
            if(!isset($_SESSION["active"])) require_once '../bd/conexion.php';
            else require_once '../../bd/conexion.php';
            $conex=new conexion();
            $sql="Select * from v_usuario";
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
            $sql="INSERT INTO usuario (cod_empleado,contrasena,esta_usu) VALUES ('$Data[0]','$Data[1]','A')";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function actualizar($Data,$id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE usuario set contrasena='$Data[0]' where cod_empleado=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function eliminar($id) {
            require_once '../bd/conexion.php';
            $sql="DELETE FROM usuario WHERE cod_empleado =$id";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
    }
?>