<?php
    session_start();
    $pathName = "http://".$_SERVER["SERVER_NAME"]."/cevicheria";
    if(isset($_SESSION["host"]))
    $pathName = $_SESSION["host"];
    $pathBootstrap=$pathName."/bootstrap";
?>