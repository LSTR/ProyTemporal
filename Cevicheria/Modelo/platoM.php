<?php
    class PlatoM {
        function listar($where=NULL) {
            require_once '../../bd/conexion.php';
            $conex=new conexion();
            $sql="Select * from v_platos";
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
            $sql="INSERT INTO platos (nomb_plato,descripcion,precio,estado) VALUES ('$Data[0]','$Data[1]','$Data[2]','A')";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function actualizar($Data,$id) {
            require_once '../bd/conexion.php';
            $sql="UPDATE platos set nomb_plato='$Data[0]',descripcion='$Data[1]',precio='$Data[2]]'  where cod_platos=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function eliminar($id) {
            require_once '../bd/conexion.php';
            $sql="DELETE FROM platos WHERE cod_platos =$id";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
    }
?>