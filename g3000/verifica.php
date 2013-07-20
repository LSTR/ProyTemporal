<?php 
	session_start();
        $AP=$_POST["txt_ap"];
        $AM=$_POST["txt_am"]; 
        $NOM=$_POST["txt_nom"];
        $DNI=$_POST["txt_dni"];
		$DIR=$_POST["txt_dir"];
        $DET=$_POST["txt_deta"];
        $NA = $_SESSION["NivelA"]+1;        
        IF($AP != null  &&  $AM != null  &&  $NOM!=null && $DNI != null){
            require("connection.php");
            $cnn = coneccion(); 
            $SQL="INSERT INTO usuario (`Nombres`, `ApellidoP`, `ApellidoMs`, `Detalles`, `Direccion`, `DNI`, `Estado`, `id_Foto`, `id_NivelAcceso`) 
                VALUES ('".$NOM."',"."'".$AP."',"."'".$AM."',"."'".$DET."',"."'".$DIR."',"."'".$DNI."','1','1',".$NA.")";
            $res= mysql_query($SQL, $cnn) or die ("problema con cadena de conexion<br><b>" . mysql_error()."</b>"); 
              if($res){
                  header("location:inscripcion.php?m=ALUMNO INSERTADO");
              }  else {
                  header("location:inscripcion.php?m=ERROR AL INSERTAR ALUMNO");
              }
        }else{            
            header("location:inscripcion.php?m=ERROR AL INSERTAR ALUMNO");
        }
?>