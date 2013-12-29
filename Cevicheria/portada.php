<?php
    require_once 'session.php';
    $sess=new session();
    if($sess->sesionActiva())
        header("Location: inicio.php");
    header("Location: portada/index.php");
?>