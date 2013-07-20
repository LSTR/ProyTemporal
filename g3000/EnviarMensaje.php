<?php 
	session_start();
        $Usu=$_SESSION["Usuario"];
        $Com=$_POST["txt_Com"]; 
        $Fecha=date("Y/m/d");
        
        if($Usu != null  &&  $Com != null  &&  $Fecha!=null ){
            require("connection.php");
            $cnn = coneccion(); 
            $SQL="INSERT INTO Sugerencia VALUES ('','".$Usu."',"."'".$Com."',"."'".$Fecha."')";
            $res= mysql_query($SQL, $cnn) or die ("problema con cadena de conexion<br><b>" . mysql_error()."</b>"); 
              if($res){
                  header("location:catalogo.php?m=MENSAJE INSERTADO");
              }  else {
                  header("location:catalogo.php?m=ERROR AL ENVIAR SUGERENCIA");
              }
        }else{            
            header("location:catalogo.php?m=ERROR AL ENVIAR SUGERENCIA");
        }
?>