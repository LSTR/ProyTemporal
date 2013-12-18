<?php
    require_once 'session.php';
    $sess=new session();
    echo $sess->sesionActiva();
//    if($sess->sesionActiva())
//        header("Location: inicio.php");
//    else {
//        if(isset($_GET["e"])){
//            header("Location: login.php?e=".$_GET["e"]);
//        }else{
//            header("Location: portada.php");
//        }
//    }
?>