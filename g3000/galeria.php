<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Metamorphosis Design Free Css Templates</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link href="styles.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="lib/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="lib/jquery.tools.js"></script>	
		<script type="text/javascript" src="lib/jquery.custom.js"></script>
		<!-- Pirobox setup and styles -->
		<script type="text/javascript" src="lib/pirobox.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$().piroBox({
					my_speed: 400, //animation speed
					bg_alpha: 0.1, //background opacity
					slideShow : false, // true == slideshow on, false == slideshow off
					slideSpeed : 4, //slideshow duration in seconds(3 to 6 Recommended)
					close_all : '.piro_close,.piro_overlay'// add class .piro_overlay(with comma)if you want overlay click close piroBox
				});
			});
		</script>
		<link href="images/style.css" rel="stylesheet" type="text/css" />
		<!-- Pirobox setup and styles end-->
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
						<a href="quienesSomos.php"  class="but" title="">�Quienes somos?</a><div class="but_razd"></div>
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
					<div style="height:10px"></div>
					<div class="row">
						<div class="box_img2">
							<h1>New Title</h1>
							<a href="images/gallery_big1.jpg"  class="pirobox_gal1" title="1st Project Image"> <img src="images/img31.jpg" alt="" /></a>
							<div style="height:15px"></div>
							Donec augue libero, fringilla porta laoreet in, consectetur ac odio. Phasellus dictum nisi ve                    
						</div>
						<div class="box_razd"></div>
						<div class="box_img2">
							<h1>New Title</h1>
							<a href="images/gallery_big2.jpg" class="pirobox_gal1" title="2nd Project Image"><img src="images/img32.jpg" alt="" /></a>
							<div style="height:15px"></div>
							Duis vitae fringilla sapien. Suspendisse potenti. Donec nibh neque, pharetra non aliquam vel, 
						</div>
						<div class="box_razd"></div>
						<div class="box_img2">
							<h1>New Title</h1>
							<a href="images/gallery_big3.jpg" class="pirobox_gal1"  title="3rd Project Image"><img src="images/img33.jpg" alt="" /></a>
							<div style="height:15px"></div>
							Etiam pulvinar tristique justo, ac posuere magna volutpat ut. Nunc lectus lorem, euismod ac                      
						</div>
					</div>
					<div style="height:20px"></div>
					<div class="row">
						<div class="box_img2">
							<h1>New Title</h1>
							<a href="images/gallery_big4.jpg" class="pirobox_gal1" title="4th Project Image"><img src="images/img34.jpg" alt="" /></a>
							<div style="height:15px"></div>
							Maecenas laoreet, dolor vel lobortis auctor, dolor augue blandit nisl, vitae imperdiet est risus non
						</div>
						<div class="box_razd"></div>
						<div class="box_img2">
							<h1>New Title</h1>
							<a href="images/gallery_big5.jpg" class="pirobox_gal1" title="5th Project Image"><img src="images/img35.jpg" alt="" /></a>
							<div style="height:15px"></div>
							Lorem ipsum dolor sit amet, consectetur adip- iscing elit. Suspendisse id massa nisl, in varius 
						</div>
						<div class="box_razd"></div>
						<div class="box_img2">
							<h1>New Title</h1>
							<a href="images/gallery_big6.jpg" class="pirobox_gal1" title="6th Project Image"><img src="images/img36.jpg" alt="" /></a>
							<div style="height:15px"></div>
							Pellentesque gravida lacus purus. Donec vel eleifend magna. Nullam blandit massa non 
						</div>
					</div>
					<div style="height:10px"></div>
					<div style=" height:21px; padding-left: 20px;">
						<a class="gal_num" href="#">1</a>
						<a class="gal_num" href="#">2</a>
						<a class="gal_num" href="#">3</a>
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
					<p><a href="Index.php">Home</a> | <a href="blog.php">Blog</a> | <a href="quienesSomos.php">Quienes somos?</a> | <a href="galeria.php">Galeria</a>|<a href="incripcion.php">Incribete</a></p>
					<p>HUACHO: Ciudad Universitaria | Av. Mercedes Indacochea S/N | Telf. 232 2918 Anexo 255</p>
					<p><a href="#">Privacy Policy</a> | <a href="#">Terminos de USO</a></p>
				</div>
				<!-- footer ends -->
			</div>
		</div>
		<div style="text-align: center; font-size: 0.75em;">Design: Bernal Pichilingue | Lopez Obispo | Mej�a Sanchez | Mogollon Diaz</div>
	</body>
</html>
