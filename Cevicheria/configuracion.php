<?php
    $pathName = "http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"]."/cevicheria";
    if(isset($_SESSION["host"]))
    $pathName = $_SESSION["host"];
    $pathBootstrap=$pathName."/bootstrap";
?>