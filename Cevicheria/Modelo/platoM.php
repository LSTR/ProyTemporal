<?php
    require_once '../bd/conexion.php';
    class PlatoM {
        function listar($where=NULL) {
            $conex=new conexion();
            $sql="Select * from platos";
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
            $sql="INSERT INTO platos (descripcion,precio) VALUES ('$Data[0]','$Data[1]')";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function actualizar($Data,$id) {
            $sql="UPDATE platos set descripcion='$Data[0]',precio='$Data[1]' where cod_platos=".$id;
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function eliminar($id) {
            $sql="DELETE FROM platos WHERE cod_platos =$id";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
    }
?>