<?php
    require_once 'session.php';
    $sess=new session();
    $sess->desactivarSesion();
    header("Location: index.php");
?>