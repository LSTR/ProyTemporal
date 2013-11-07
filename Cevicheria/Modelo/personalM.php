<?php
    require_once '../bd/conexion.php';
    class PersonalM {
        function listar($where=null) {
            $conex=new conexion();
            $sql="Select * from personal";
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
            $sql="INSERT INTO personal (fecha_iniciado,nombre,apellido,direccion,cod_cargo) VALUES ('$Data[0]','$Data[1]','$Data[2]','$Data[3]','$Data[4]')";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
        function eliminar($id) {
            $sql="DELETE FROM personal WHERE cod_empleado =$id";
            $con=new conexion();
            return $con->ejecutaQuery($sql);
        }
    }
?>