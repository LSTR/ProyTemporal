<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Metamorphosis Design Free Css Templates</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link href="styles.css" rel="stylesheet" type="text/css" />
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
						<a href="quienesSomos.php"  class="but" title="">¿Quienes somos?</a><div class="but_razd"></div>
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
					<div style=" height:10px"></div>
					<div id="cont_razd">
						<div id="right">
							<h2>Vision del Grupo</h2>
							<div style=" height:10px"></div>
							 <img src="images/imagen1.png" class="img_l" alt="" /><span class="span_cont">G'3000</span><br />
							<div style=" height:5px"></div>
							Ser la institucion educativa de educacion basica regular y no superior de mayor aceptacion por los alumnos de la Region Lima, adaptable a las exigencias que demanda la educacion, con tecnologia de vanguardia, alto nivel de profesionalismo, que sirva como modelo del sector educativo en nuestro Region. 
							<div style="height: 10px;"></div>
							<div style=" height:25px"></div>
							<span class="span_dat">Sep.24, 2010</span><br />
							<div style=" height:5px"></div>
							<img src="images/fish_about.jpg" class="img_l" alt="" /><span class="span_cont">Etiam vitae nibh libero.</span><br />
							Vivamus et felis dolor. Donec ligula velit, egestas eu venenatis non, tempus sollicitudin ante.<br />
							sed lectus ullamcorper malesuada. 
							Fusce sagittis nisi eget magna malesuada sodales. 
							Vestibulum cursus fermentum condimentum. 
							<div style="height: 10px;"></div>
							<div style="height:20px;"><a class="read_l" href="#">more</a></div>
							<div style=" height:25px"></div>
							<span class="span_dat">Sep.25, 2010</span><br />
							<div style=" height:5px"></div>
							<img src="images/fish_about.jpg" class="img_l" alt="" /><span class="span_cont">Suspendisse potenti. </span><br />
							Maecenas hendrerit tempus felis, vitae vulputate mi dapibus quis. Vestibulum auctor sapien sed lectus ullamcorper sed lectus ullamcorper malesuada. <br />
							Fusce sagittis nisi eget magna malesuada sodales. Vestibulum cursus fermentum condimentum.
							<div style="height: 10px;"></div>
							<div style="height:20px;"><a class="read_l" href="#">more</a></div>
						</div>
						<div id="left">
                        	<h2>Centro Pre-Universitario G'3000</h2>                            
							<div style="height: 10px;"></div>
                            <img src="images/img41.jpg" class="img_l" alt="" /><span class="span_cont">Quienes Somos</span><br />
							EL GRUPO EDUCATIVO G'3000, es la nueva organizacion educativa de la Region Lima, donde acudiran alrededor de 4000 jovenes estudiantes decididos a formarse  academica e integralmente, para forjarse un futuro promisorio .<br>
							EL GRUPO EDUCATIVO G'3000 tiene el firme compromiso de brindar a sus alumnos, las herramientas necesarias para que puedan ingresar a la Universidad y/o desenvolverse en un mercado laboral competitivo.
                         
							<div style=" height:25px; clear: both;"></div>
                            <div>
                            	<h2>RESPONSABLES</h2>
								<div style=" height:15px; clear: both;"></div>
                            	<div class="box_about">
                                	<img src="images/img42.jpg" class="img_l" alt="" />
                                    <span class="span_cont">ING. Bernal Pichilingue Carlos </span><br />
									  Director General, encargado del manejo de alta gerencia 
									<div style=" height:10px"></div>
									
                              	</div>
                                <div class="box_about" style=" margin-left:20px">
                                    <img src="images/img43.jpg" class="img_l" alt="" />
                                    <span class="span_cont">Quisque id sodales arcu. </span><br />
                                    Mauris urna tortor, porta ac eleifend eget, viverra et justo. Morbi sollicitudin lectus ut lectus dapibus venenatis. Mauris rhoncus vulputate ligula mauris, id placerat quam. Sed vel risus et mauris vulputate interdum. Morbi venenatis, ligula in euismod  
                                    <div style=" height:10px"></div>
                                    <div style="height:20px;"><a class="read_l" href="#">more</a></div>
								</div>
                            	<div style="clear: both"></div>
							</div>
							<div style=" height:20px"></div> 
                            <div >
                            	<div class="box_about">
									<img src="images/img44.jpg" class="img_l" alt="" />
                                    <span class="span_cont">Nullam sit amet erat nisl. </span><br />
                                    Curabitur at purus at nulla elementum lacinia. Quisque nisi nisi, viverra nec viverra vitae, egestas at ante. Mauris in orci magna, at molestie aliquam egestas ligula, adipiscing volutpat augue 
                                    <div style=" height:10px"></div>
                                    <div style="height:20px;"><a class="read_l" href="#">more</a></div>
                              	</div>
                                <div class="box_about" style=" margin-left:20px">
									<img src="images/img45.jpg" class="img_l" alt="" />
                                    <span class="span_cont">Quisque id sodales arcu. </span><br />
                                    Mauris urna tortor, porta ac eleifend eget, viverra et justo. Morbi sollicitudin lectus ut lectus dapibus venenatis. Mauris rhoncus vulputate ligula mauris, id placerat quam. Sed vel risus et mauris 
                                    <div style=" height:10px"></div>
                                    <div style="height:20px;"><a class="read_l" href="#">more</a></div>
								</div>
                            	<div style="clear: both"></div>
							</div>
							<div style=" height:10px"></div>
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
						Donec fermentum leo sed ante accumsan vitae faucibus tellus commodo. Pellentesque fermentum, purus eu aliquam. <br /><div style="height:5px"></div>						
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
					<p><a href="Index.php">Home</a> | <a href="blog.php">Blog</a> | <a href="quienesSomos.php">Quienes somos?</a> | <a href="galeria.php">Galeria</a>|<a href="inscripcion.php">Incribete</a></p>
					<p>HUACHO: Ciudad Universitaria | Av. Mercedes Indacochea S/N | Telf. 232 2918 Anexo 255</p>
					<p><a href="#">Privacy Policy</a> | <a href="#">Terminos de USO</a></p>
				</div>
				<!-- footer ends -->
			</div>
		</div>
		<div style="text-align: center; font-size: 0.75em;">Design: Bernal Pichilingue | Lopez Obispo | Mejía Sanchez | Mogollon Diaz</div>
	</body>
</html>
