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
				<!-- header ends -->
				<div class="top2">
					<ul class="round">
						<li><img src="images/header1.jpg" alt="" /></li>
						<li><img src="images/header2.jpg" alt="" /></li>
						<li><img src="images/header3.jpg" alt="" /></li>
						<li><img src="images/header4.jpg" alt="" /></li>
						<li><img src="images/header5.jpg" alt="" /></li>
						<li><img src="images/header6.jpg" alt="" /></li>
					</ul>
					<script type="text/javascript" src="lib/jquery.js"></script>
					<script type="text/javascript" src="lib/jquery.roundabout.js"></script>
					<script type="text/javascript">
						$(document).ready(function() {
							$('.round').roundabout();
						});
					</script>
				</div>
				<!-- content begins -->
        		<div class="cont_top"></div>
       			<div id="content">
                    <div class="cont_home">
                    	<div class="home_box">
                        	<h1>Lorem Ipsum Dolor</h1>
                            <div style="height:15px"></div>
							<img src="images/img11.jpg" alt="" />
							<div style="height:10px;"></div>
                        	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur magna tortor, ultricies id pellentesque a, tristique in nulla. Donec commodo consectetur mauris quis sagittis. Donec ac lectus turpis, et eleifend dolor. <div style="height:5px"></div>
                        	<div style="height:20px;"><a class="read_l" href="#">more</a></div>
                        </div>
						<div style="width: 40px; height:20px; float: left;"></div>
                        <div class="home_box">
                        	<h1>Etiam Vitae Enim</h1>
                            <div style="height:15px"></div>
                        	<img src="images/img12.jpg" alt="" />
                        	<div style="height:10px;"></div>
                        	Etiam vitae enim diam, in molestie ipsum. Aenean mollis diam nec dui commodo condimentum. Sed quam libero, luctus id pharetra et, iaculis quis lorem. Praesent magna orci, pharetra nec ornare id, porta id <div style="height:5px"></div>
                        	<div style="height:20px;"><a class="read_l" href="#">more</a></div>
						</div>
						<div style="width: 40px; height:20px; float: left;"></div>
						<div class="home_box">
							<!----------------->
								<div id="login">
									
									<div class="box2" align="center">
										<div ><img src="images/user.png" alt="" width="100" height="80" /></div>
										<?
											if(!isset($_SESSION["Usuario"])){
										?>
										<div style="width: 120px">
										<? 
											
												if(isset($_GET["e"])){
													$Error=$_GET["e"];
												}else{
													$Error="";
												}
												if($Error==null){
													echo "<font color='blue'>bienvenido ingresa tu cuenta:</font>";
												}else{
													echo "<h4><font color='RED'>".$Error."</font></h4>";
												}
										?>
										</div>
										<form method="post" action="iniciar.php">
											<p class="txtleft"><label for="user">User Name:</label></p>
											<input type="text" name="user" id="user" class="text" /><br />
											<p class="txtleft"><label for="password">Password:</label></p>
											<input type="password" name="password" id="password" class="password" /><br />
											<p class="rem"><input type="checkbox" checked="checked" name="remember" id="remember" /><label for="remember">Remember me</label></p>
											<input type="submit" name="submit" id="submit" class="submit" value="Submit" />
											<p><a href="#">Olvido su password?</a></p>
											<p><a href="inscripcion.php">Create tu cuenta</a></p>
										</form>
										<?
											}else{
										?>
										<div align="center"><a href="cerrarS.php" style="text-decoration:none;">CERRAR SESION</a></div>
										<?
											}
										?>
									</div>
								</div>
				<!----------------->
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
						<div style="height:10px">
						</div>
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
				<div id="footer" style="text-align: center;">
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
