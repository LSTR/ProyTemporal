<?php
    require_once 'session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: index.php");
    //ACA PUEDES VERIFICAR EL NIVEL DE ACCESO Y REDIRIGIR A ESE ARCHIVO.
    $NivelAcceso=$sess->getSesion("NivelAcceso");

        if($NivelAcceso=="1")
            header("Location: Vista/contenido/contenidoAdministrador.php");
        else if($NivelAcceso=="2")
            header("Location: Vista/contenido/contenidoCaja.php");
        else if($NivelAcceso=="3")
            header("Location: Vista/contenido/contenidoCocina.php");
        else if($NivelAcceso=="4")
            header("Location: Vista/contenido/contenidoMozo.php");
    //FIN DE REDIRECCION
?>