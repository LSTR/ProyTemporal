<?php
    require_once '../bd/conexion.php';
    class UsuarioM {
        function listar($where=null) {
            $conex=new conexion();
            $sql="Select * from usuario";
            if($where!=null)
                $sql.=" where ";
                $cc=0;
                foreach ($where as $k => $val) {
                    if($cc>0)
                        $sql.=" AND ";
                    $sql.=" ".$k."='".$val."'";
                    $cc=1;
                }
            return $conex->listarObject($sql);
        }
        function insertar($Data) {
            $sql="INSERT INTO usuario (login,password) VALUES ('$Data[0]','$Data[1]')";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function eliminar($id) {
            $sql="DELETE FROM usuario WHERE cod_usuario =$id";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
    }
?>