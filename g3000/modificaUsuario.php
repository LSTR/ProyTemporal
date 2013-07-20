<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Metamorphosis Design Free Css Templates</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link href="styles.css" rel="stylesheet" type="text/css" />
		<link href="styleLogin.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="main_bg">
			<div id="main">
			<!-- header begins -->
				<div id="header">
					<div id="logo2">
						<br><br><br><font face="Papyrus" color="#81F79F" size="6">CENTRO PRE-UNIVERSITARIO</font>
						<h2><small><br>Exigencia, Amistad y <br>Trascendencia...!!!</small></h2>
					</div>
					<div id="buttons">
						<a href="index.php" class="but_home"  title=""></a><div class="but_razd"></div>
						<a href="blog.php" class="but" title="">Blog</a><div class="but_razd"></div>
						<a href="galeria.php"  class="but" title="">Gallery</a><div class="but_razd"></div>
						<a href="quienesSomos.php"  class="but" title="">About us</a><div class="but_razd"></div>
						<?
							session_start();
							if(!isset($_SESSION["Usuario"])){
						?>
							<a href="inscripcion.php" class="but" title="">registrate</a>
						<?
							}else{
								$NA = $_SESSION["NivelA"];
								if ($NA == 2 || $NA == 1) {
						?>
								<a href="inscripcion.php" class="but" title="">registrate</a>
								<a href="perfil.php" class="but" title="">Perfil</a>
								<a href="cerrarS.php" class="but" title="">Cerrar Session</a>
						<?
								}else{
						?>
								<a href="perfil.php" class="but" title="">Perfil</a>
								<a href="cerrarS.php" class="but" title="">Cerrar Session</a>
						<?
								}
							}
						?>
					</div>
				</div>
				<div class="top3"> </div>
				<!-- header ends -->
				<!-- content begins -->
        		<div class="cont_top"></div>
       			<div id="content">
					<?
						require("connection.php");
						$cnn = coneccion(); 
						$ap=$_POST["txt_ap"];
						$am=$_POST["txt_am"];
						$nomb=$_POST["txt_nomb"];
						$dni=$_POST["txt_dni"];
						$direc=$_POST["txt_dir"];
						$detalle=$_POST["txt_deta"];
						$id=$_POST["idUso"];
						
						
						/**FUNCION PARA VALIDAR CADENAS**/
						$UnirCadena="";
						function vCadena($frase){
							$permitCadena= "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
							$UnirCadena=str_replace(" ","",$frase);
							for ($i=0; $i<strlen($UnirCadena); $i++){ 
								if (strpos($permitCadena, substr($UnirCadena,$i,1))===false){ 
									return 0; 
								}
							} 
							return 1; 
						}
						
						/*****VALIDAR NOMBRE************/
						$cantN=sizeof(explode(" ",trim($nomb))); 
						$msnNomb="";
						$rptaN="";
						if (strlen(trim($nomb))<2 || $cantN>3){ 
							$msnNomb="Error al ingresar nombre"; 
						}else{
							$rptaN=vCadena($nomb);
							if($rptaN==1){
								$msnNomb="";
							}else{
								$msnNomb="Error al ingresar nombre";
							}
						}
						/******VALIDAR DNI****/
						$msnDNI=""; 
						$permitDNI = "0123456789"; 
						$dniTrim=trim($dni);
						$TamDNI=sizeof(explode(" ",$dniTrim)); 
						if (strlen($dniTrim)!=8 || $TamDNI>1){ 
							$msnDNI="error al ingresar DNI"; 
						}else{
							for ($i=0; $i<8; $i++){ 
								if (strpos($permitDNI, substr($dniTrim,$i,1))===false){ 
									$msnDNI="error al ingresar dni"; 
								}else{
									$msnDNI=""; 
								}
							} 
						}
						
						/**********VALIDAR APELLIDO  PATERNO*******/
						$cantApat=sizeof(explode(" ",trim($ap))); 
						$msnApat="";
						if (strlen(trim($ap))<2 || $cantApat>2){ 
							$msnApat="Error al ingresar apellido paterno"; 
						}else{
							$rptaApat=vCadena($ap);
							if($rptaApat==1){
								$msnApat="";
							}else{
								$msnApat="Error al ingresar apellido paterno";
							}
						}
						/************VALIDAR APELLIDO  MATERNO*******/
						$cantMat=sizeof(explode(" ",trim($am))); 
						$msnAmat="";
						if (strlen(trim($am))<2 || $cantMat>2){ 
							$msnAmat="Error al ingresar apellido materno"; 
						}else{
							$rptaAmat=vCadena($am);
							if($rptaAmat==1){
								$msnAmat="";
							}else{
								$msnAmat="Error al ingresar apellido materno";
							}
						}

						/***VALIDAR DETALLE**/
						$rptaDeta=vCadena($detalle);
						$msnDeta="";
						if($rptaDeta==1){
							$msnDeta="";
						}else{
							$msnDeta="Error en detalle";
						}
						
						
					?>
                	<div style="height:15px"></div>    
					<div id="cont_razd">
						<div id="right">
							<h1>Meet Our Company</h1>
							<div style="height:20px;"></div>
							<div  class="box_us">
								<div  class="box_us_l"><img src="images/fish_us1.gif" alt="" /></div>
								<div  class="box_us_r">1234 Some Street, Brooklyn, NY 11201</div>
								<div style="clear: both; height:15px;"></div>
							</div>
							<div  class="box_us">
								<div  class="box_us_l"><img src="images/fish_us2.gif" alt="" /></div>
								<div  class="box_us_r">
									Phone:  1(234) 567 8910<br />
									Fax: 1(234) 567 8910
								</div>
								<div style="clear: both; height:15px;"></div>
							</div>
							<div  class="box_us">
								<div  class="box_us_l"><img src="images/fish_us3.gif" alt="" /></div>
								<div  class="box_us_r">
								  General: companyname@yahoo.com<br />
								  Support: support@yahoo.com
								</div>
								<div style="clear: both; height:15px;"></div>
							</div>
							<div style="height:25px;"></div>
							<span class="span_cont">Fusce a nisl nunc, vitae scelerisque urna.</span><br />
							Etiam iaculis orci in eros vestibulum bibendum. Sed laoreet, metus at dictum posuere, massa sapien tincidunt nisi, eget pulvinar ligula magna sed neque.<br /><br />
							<div style="height:20px;"><a class="read_l" href="#">more</a></div>
						</div>
						<!----********************-->
						<div id="left"> 
							<table class="form_settings" cellspacing="15" width="600" >
									<tr style="background-color:#333;color:#FFF;">
										<td align="center" height="80"><h1><font color="#FFF" face="Papyrus" size="6">Perfil</font></h1></td>
										<td colspan="2" height="80"><marquee><font  face="Papyrus" size="5">Bienvenido, al Centro - Pre - Univertitario  **** G'3000 ****</font></marquee></td>
									</tr>
									<tr>
										<td height="30"></td>
									</tr>
									<?
										if($msnNomb=="" && $msnDNI=="" && $msnDeta=="" &&  $msnApat=="" && $msnAmat==""){
									
										$updateSQL="UPDATE `usuario` SET `Nombres`='$nomb',`ApellidoP`='$ap',`ApellidoM`='$am',`Detalles`='$detalle',`Direccion`='$direc',`DNI`='$dni' WHERE `usuario`.`id_Usuario` ='$id' LIMIT 1";
										$rpta = mysql_query($updateSQL, $cnn); 
										if($rpta){
											$msnError="se ha modificado correctamente sus datos...";
											$selectSQL="select * from `usuario`";
											$tabla=mysql_query($selectSQL, $cnn);
											while($registro=mysql_fetch_array($tabla)){
												if($registro[7]=="1" && $registro[0]==$id){
									?>
												<tr>
													<td rowspan="5" style="border:groove;border-color:#399"><? echo "<image src='FotoPerfil.php?id=".$registro[8]."'/>"; ?></td>
													<td><p><span>Apellido Paterno:</span></p></td>
													<td><input type="text" class="contact" value="<? echo $registro[2] ?>" disabled="disabled"/></td>
												</tr>
												<tr>
													<td><p><span>Apellido Materno:</span></p></td>
													<td><input type="text" class="contact" value="<? echo $registro[3] ?>" disabled="disabled"/></td>
												</tr>
												<tr>
													<td><p><span>Nombre:</span></p></td>
													<td><input type="text" class="contact"  value="<? echo $registro[1] ?>"  disabled="disabled"/></td>
												</tr>
												<tr>
													<td><p><span>Documento de Identidad:</span></p></td>
													<td><input type="text" class="contact" value="<? echo $registro[6] ?>"  disabled="disabled"/></td>
												</tr>
												<tr>
													<td><p><span>Direccion</span></p></td>
													<td><input type="text" class="contact" value="<? echo $registro[5] ?>" disabled="disabled"/></td>
												</tr>
												<tr>
													<td></td>
													<td align="right"><p><span>Detalle:</span></p></td>
													<td><input type="text" class="contact" value="<? echo $registro[4] ?>" disabled="disabled"/></td>
												</tr>
												<tr>
													<td colspan="3" align="right"><form action="perfil.php"><input class="submit" type="submit" value="VER PERFIL" /></td>
												</tr>
											<?
														}
													}
												}else{												
											?>
											<tr>
												<td height="20"></td>
											</tr>
											<tr>
												<td height="20">"Error : No se pudo ejecutar la consulta"<br><? mysql_error();?></td>
											</tr>
											<tr>
												<td height="20"></td>
											</tr>
											<?
												}
											}else{
												header("location:perfil.php?e=$msnApat,$msnAmat,$msnNomb,$msnDNI,$msnDeta");
											}	
											?>	
								</table>
						</div>
						<div style="clear: both"></div>
					</div>
        		</div>
                <div class="cont_bot"></div>
				<!-- content ends --> 
				<div style="height:15px"></div>
				<div class="cont_bot"></div>
				<!-- bottom end --> 
				<!-- footer begins -->
				<div id="footer">
					<div>HUACHO: Ciudad Universitaria | Av. Mercedes Indacochea S/N | Telf. 232 2918 Anexo 255</div>
					<div><a href="#">Privacy Policy</a> | <a href="#">Terminos de USO</a></div>
				</div>
				<!-- footer ends -->
			</div>
		</div>
		<div style="text-align: center; font-size: 0.75em;">Design: Bernal Pichilingue | Lopez Obispo | Mejía Sanchez | Mogollon Diaz</div>
	</body>
</html>