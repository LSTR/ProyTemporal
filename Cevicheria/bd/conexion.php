<?php
    class conexion {
     function conectar() {
         try {
             $con=  mysql_connect("localhost", "root", "") or die("Error en la conexion de la Base de Datos");
             mysql_query("SET NAMES 'utf8'");
             mysql_select_db("cevicheria") or die("Error con la Base de Datos");
             return $con;
         } catch (Exception $exc) {
             echo "Error ",$exc->getMessage(),"/n";
         }
     }
     function desconectar($con) {
         try {
             mysql_close($con);
         } catch (Exception $exc) {
             echo "Error ",$exc->getMessage(),"/n";
         }
     }
     public static function ejecutaQuery($consulta) {
         try {
             $conec=new conexion();
             $cn=$conec->conectar();
             $result=mysql_query($consulta,$cn) or die("Error en la Consultasdas ".$consulta.".");
             $conec->desconectar($cn);
         } catch (Exception $exc) {
             echo "Error ",$exc->getMessage(),"/n";
         }
     }
     public static function listarObject($consulta) {
         try {
             $conec=new conexion();
             $cn=$conec->conectar();
             $result=mysql_query($consulta,$cn) or die("Error en la Consulta");
             $conec->desconectar($cn);
             $i=0;
             $AA=array();
             while($row= mysql_fetch_object($result)){
                 $AA[$i++]=$row;
             }
             return $AA;
         } catch (Exception $exc) {
             echo "Error ",$exc->getMessage(),"/n";
         }
     }
}
?>