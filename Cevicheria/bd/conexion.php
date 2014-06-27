<?php
    class conexion {
     public static function printError($msj){
         $msjError="<div style='color: #D8000C;
                        background-color: #FFBABA;
                        border: 1px solid;
                        margin: 10px 0px;
                        padding:15px 10px 15px 50px;
                        background-repeat: no-repeat;
                        background-position: 10px center;
                        font-family:Arial, Helvetica, sans-serif;
                        font-size:13px;
                        text-align:left;
                        width:auto;'>
                        <b>$msj Informe al administrador.</b></div>";
         return $msjError;
     }
     function conectar() {
         try {
             $con=  mysql_connect("localhost", "root", "") or die(self::printError("Lo sentimos, Error de de configuracion."));
             mysql_query("SET NAMES 'utf8'");
             mysql_select_db("cevicheria") or die(self::printError("Lo sentimos, Error de de Base de Datos."));
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
     public static function insertGetId($consulta) {
         try {
             $conec=new conexion();
             $cn=$conec->conectar();
             $result=mysql_query($consulta,$cn) or die(self::printError("Lo sentimos, se produjo un error en la Base de Datos."));//$consulta
             $id=mysql_insert_id();
             $conec->desconectar($cn);
             return $id;
         } catch (Exception $exc) {
             echo "Error ",$exc->getMessage(),"/n";
             return NULL;
         }
     }
     public static function ejecutaQuery($consulta) {
         try {
             $conec=new conexion();
             $cn=$conec->conectar();
             $result=mysql_query($consulta,$cn) or die(self::printError("Lo sentimos, se produjo un error en la Base de Datos."));
             $conec->desconectar($cn);
             return $result;
         } catch (Exception $exc) {
             echo "Error ",$exc->getMessage(),"/n";
             return NULL;
         }
     }
     public static function listarObject($consulta) {
         try {
             $conec=new conexion();
             $cn=$conec->conectar();
             $result=mysql_query($consulta,$cn) or die(self::printError("Lo sentimos, se produjo un error en la Base de Datos."));
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