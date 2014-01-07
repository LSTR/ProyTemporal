<?php
session_start();
?>
<?php
ini_set("session.cookie_lifetime","36000");
session_start();
class session {
    function sesionActiva() {
        if(isset($_SESSION["time"])&&time() - $_SESSION["time"] < 36000){
            return true;
        }
        if(isset($_SESSION["time"]))
            session_destroy();
        return false;
    }
    function activarSesion($login) {
//        session_cache_expire(1440);
        $_SESSION["time"] = time();
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