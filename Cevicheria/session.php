<?php
session_start();
class session {
    function sesionActiva() {
        if(!isset($_SESSION["active"])||$_SESSION["active"]<>1){
            session_destroy();
            return false;
        }
        return true;
    }
    function activarSesion($login) {
        $_SESSION["active"]=1;
        $_SESSION["login_usuario"]=$login;
        $_SESSION["host"]="http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"]."/cevicheria";
    }
    function addSesion($nombre,$val) {
        $_SESSION[$nombre]=$val;
    }
    function getSesion($nombre) {
        return $_SESSION[$nombre];
    }
    function getHost() {
        return $_SESSION["host"];
    }
    function desactivarSesion() {
        session_destroy();
    }
}
?>