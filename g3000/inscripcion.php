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
						<a href="galeria.php"  class="but" title="">Galeria</a><div class="but_razd"></div>
						<a href="quienesSomos.php"  class="but" title="">Quienes somos?</a><div class="but_razd"></div>
						<?
							session_start();
							if(!isset($_SESSION["Usuario"])){
						?>
							<a href="inscripcion.php" class="but" title="">Registrate</a>
						<?
							}else{
								$NA = $_SESSION["NivelA"];
								if ($NA == 2 || $NA == 1) {
						?>
								<a href="inscripcion.php" class="but" title="">Registrate</a>
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
                	<div style="padding: 0px 0px 0px 20px;">
                    	<h1><font face="Papyrus"  size="6">Generacion 3000</font></h1>
                        <div style="height:15px"></div>
                    	<img src="images/claseImage.jpg" alt="" />
                    </div>
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
						<div id="left"> 
							<form action="" method="post">
                                <table class="form_settings" cellspacing="5" width="500">
                                    <tr>
                                        <td><h1><font face="Papyrus"  size="6">Inscribete</font></h1></td>
                                        <td align="right"><img src="images/user.png" width="100" height="100" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                    </tr>
                                    <tr>
                                        <td><p><span>Apellido Paterno:</span></p></td>
                                        <td><input class="contact" type="text" name="txt_ap" value="" /></td>
                                    </tr>
                                    <tr>
                                        <td><p><span>Apellido Materno:</span></p></td>
                                        <td><input class="contact" type="text" name="txt_am" value="" /></td>
                                    </tr>
                                    <tr>
                                        <td ><p><span>Nombre:</span></p></td>
                                        <td><input class="contact" type="text" name="txt_nom" value="" /></td>
                                    </tr>
									<tr>
                                        <td><p><span>Sexo:</span></p></td>
                                        <td>
											<select name="sexo" id="sexo">
												<option value="0">SEXO:</option>
												<option value="1">MASCULINO</option>
												<option value="2">FEMENINO</option>
											</select>
										</td>
                                    </tr>
                                    <tr>
                                        <td><p><span>Documento de Identidad:</span></p></td>
                                        <td><input  type="text" name="txt_dni" value="" /></td>
                                    </tr>
                                    <tr>
                                        <td><p><span>Dirección:</span></p></td>
                                        <td><input  type="text" name="txt_dir" value="" /></td>
                                    </tr>
                                    <tr>
                                        <td><p><span>Detalle:</span></p></td>
                                        <td><input class="contact" type="text" name="txt_deta" value="" /></td>
                                    </tr>
									 <tr>
                                        <td><p><span>Telefono:</span></p></td>
                                        <td><input class="contact" type="text" name="txt_telef" value="" /></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td align="right"><input class="submit" type="submit" name="contact_submitted" value="Agregar" /></td>
                                    </tr>
                                </table>
                            </form>
						</div>
						<div style="clear: both"></div>
					</div>
        		</div>
                <div class="cont_bot"></div>
				<!-- content ends --> 
				<div style="height:15px"></div>
				<!-- bottom begin -->
				<div id="bottom">
					<div style="height:10px"></div>
					<div id="b_col1">
						<h1>Recent Posts</h1>
						<div style="height:10px"></div>
						<ul class="spis_bot">
							<li><a href="#">Lorem ipsum dolor sit amet </a></li>
							<li><a href="#">Maecenas in magna quis augue</a></li>
							<li><a href="#">Ut a mauris nec eros consect</a></li>
							<li><a href="#">Nam luctus felis at mauris co </a></li>
							<li><a href="#">Aliquam sagittis ligula sit amet </a></li>
							<li><a href="#">Quisque sit amet est id urna</a></li>
							<li><a href="#">Aenean gravida ipsum in quam</a></li>
						</ul>
					</div>
					<div id="b_col2">
						<h1>Nulla Eu Leo At Ligula</h1>
						<div style="height:15px"></div>
						<img src="images/img14.jpg" class="img_l" alt="" />
						<span class="span_cont">Nulla eu leo at ligula porta aliquam. </span><br />
						Donec fermentum leo sed ante accumsan vitae faucibus tellus commodo. Pellentesque fermentum, purus eu aliquam. <br />
						<div style="height:5px"></div>
						<img src="images/img15.jpg" class="img_l" alt="" />
						<span class="span_cont">Cras dictum, est eget adipiscing consectetur, eros eros posuere eros, non mattis neque sem ultricies mauris. </span>
						Vestibulum aliquet congue nunc a consect <br />
					</div>
					<div id="b_col3">
						<h1>Send a Message</h1>
						<div style="height:15px"></div>
						<form action="" method="post">
							<div style="height:30px;"><label>Name</label><input class="input_txt" value="" name="Name" type="text" /></div><div style="height:5px"></div>
							<div style="height:30px;"><label>E-mail</label><input class="input_txt" value="" name="E-mail" type="text" /></div><div style="height:5px"></div>
							<div><textarea class="text_area" cols="32" rows="3" name="Message"></textarea></div>
							<div style=" float:left;"><input class="submit" name="Submit" type="submit" value="Submit" /></div>
						</form>
					</div>
					<div style="clear: both;"></div>
				</div>
				<div class="cont_bot"></div>
				<!-- bottom end --> 
				<!-- footer begins -->
				<div id="footer">
					<div><a href="Index.php">Home</a> | <a href="blog.php">Blog</a> | <a href="quienesSomos.php">Quienes somos?</a> | <a href="galeria.php">Galeria</a>|<a href="inscripcion.php">Incribete</a></div>
					<div>HUACHO: Ciudad Universitaria | Av. Mercedes Indacochea S/N | Telf. 232 2918 Anexo 255</div>
					<div><a href="#">Privacy Policy</a> | <a href="#">Terminos de USO</a></div>
				</div>
				<!-- footer ends -->
			</div>
		</div>
		<div style="text-align: center; font-size: 0.75em;">Design: Bernal Pichilingue | Lopez Obispo | Mejía Sanchez | Mogollon Diaz</div>
	</body>
</html>
