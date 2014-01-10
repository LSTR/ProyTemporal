<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cevicheria El Clasico | Portada</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        background-image: url('img/bg.jpg');
        background-size: 100%
      }
      .lblTitulo{
          width: 130px;
          height: 15px;
          background-color: #333333;
          color: #ffffff;
          padding: 10px;
          vertical-align: central;
          font-size: 15px;
          border-top-right-radius: 8px;
          border-bottom-right-radius: 8px;
          margin-bottom: 5px;
      }
      .fDir{
          background-color: #333333;
          color: #ffffff;
          padding: 5px;
          vertical-align: central;
          font-size: 12px;
          border-radius: 8px;
          text-align: center;
      }
      .Mapa{
          /*float: left;*/
      }
      .logo{
          position: absolute;
          top: 0px;
          left: 200px;
          z-index: 2;
      }
      .banner{
          position: relative;
          top: 180px;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
  </head>

  <body>
    
      <div class="logo">
          <img src="img/logoc.png" width="190" height="220" alt="logoc"/>
      </div>
    <div class="container banner" style="background-color: #ffffff">

      <!--  Carousel -->
      <!--  consult Bootstrap docs at 
            http://twitter.github.com/bootstrap/javascript.html#carousel -->
      <div id="this-carousel-id" class="carousel slide">
        <div class="carousel-inner">
          <div class="item active">
            <img src="img/main_image_1.jpg" alt="Platos" />
            <div class="carousel-caption">
              <p>...</p>
            </div>
          </div>
          <div class="item">
              <img src="img/main_image_2.jpg" alt="Platos" />
            <div class="carousel-caption"><p>...</p></div>
          </div>
          <div class="item">
              <img src="img/main_image_3.jpg" alt="Platos" />
            <div class="carousel-caption"><p>...</p></div>
          </div>
          <div class="item">
              <img src="img/main_image_4.jpg" alt="Platos" />
            <div class="carousel-caption"><p>...</p></div>
          </div>
          <div class="item">
              <img src="img/main_image_5.jpg" alt="Platos" />
            <div class="carousel-caption"><p>...</p></div>
          </div>
          <div class="item">
              <img src="img/main_image_6.jpg" alt="Platos" />
            <div class="carousel-caption"><p>...</p></div>
          </div>
          <div class="item">
              <img src="img/main_image_7.jpg" alt="Platos" />
            <div class="carousel-caption"><p>...</p></div>
          </div>
          <div class="item">
              <img src="img/main_image_8.jpg" alt="Platos" />
            <div class="carousel-caption"><p>...</p></div>
          </div>
          <div class="item">
              <img src="img/main_image_9.jpg" alt="Platos" />
            <div class="carousel-caption"><p>...</p></div>
          </div>
          <div class="item">
              <img src="img/main_image_10.jpg" alt="Platos" />
            <div class="carousel-caption"><p>...</p></div>
          </div>
          <div class="item">
              <img src="img/main_image_11.jpg" alt="Platos" />
            <div class="carousel-caption"><p>...</p></div>
          </div>
          <div class="item">
              <img src="img/main_image_12.jpg" alt="Platos" />
            <div class="carousel-caption"><p>...</p></div>
          </div>
          <div class="item">
              <img src="img/main_image_13.jpg" alt="Platos" />
            <div class="carousel-caption"><p>...</p></div>
          </div>
          
        </div><!-- .carousel-inner -->
        <!--  next and previous controls here
              href values must reference the id for this carousel -->
          <a class="carousel-control left" href="#this-carousel-id" data-slide="prev">&lsaquo;</a>
          <a class="carousel-control right" href="#this-carousel-id" data-slide="next">&rsaquo;</a>
      </div><!-- .carousel -->
      <!-- end carousel -->

      <div class="navbar">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php">Cevicheria El Clasico</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="#Nosotros">Quienes Somos</a></li>
              <li><a href="#Ubicacion">Ubicacion</a></li>
              <li class="active"><a href="../login.php">Iniciar Sesion</a></li>
            </ul><!-- /.nav -->
          </div><!--/.nav-collapse -->
        </div><!-- /.container -->
      </div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->
    
    
      <!-- Example row of columns -->
      <div class="lblTitulo">
          Nuestros Platos
      </div>
      <div class="row" style="padding: 0px 80px">
        <div class="span3" style="width: 315px;">
          <h2>Ceviche El Clasico</h2>
          <img src="img/cev_elclasico.jpg" width="315" height="200" alt="cev_elclasico"/>
        </div>
        <div class="span3" style="width: 315px;">
          <h2>Chicharron de Marisco</h2>
          <img src="img/Chicharron-de-marisco.jpg" width="315" height="200" alt="Chicharron-de-marisco"/>
       </div>
       <div class="span3" style="width: 315px;">
          <h2>Concha a la Parmesana</h2>
          <img src="img/conchasparmesana.jpg" width="300" height="200" alt="conchasparmesana"/>
        </div>
      </div>
      <hr>
      <div class="lblTitulo">
          Nosotros
      </div>
      <div id="Nosotros">
        <div class="row" style="padding: 0px 80px">
          <div class="span3" style="margin-right: 30px">
            <iframe width="320" height="300"
                src="http://www.youtube.com/embed/F58a_nGsgw8">
            </iframe>
          </div>
          <div class="span3" style="margin-right: 30px">
            <iframe width="320" height="300"
                src="http://www.youtube.com/embed/_OpTD_v-6yw">
            </iframe>
          </div>
          <div class="span3" style="margin-right: 30px">
            <iframe width="320" height="300"
                src="http://www.youtube.com/embed/eVbcsv0tv4U">
            </iframe>
          </div>
          <div class="span3" style="margin-right: 30px">
            <div id="id_52bf90022c1ec5f63805683" style="width:325px;height:300px" class="swfObject" data-swfid="swf_id_52bf90022c1ec5f63805683"><embed type="application/x-shockwave-flash" src="https://fbstatic-a.akamaihd.net/rsrc.php/v1/y4/r/dDbuWS_BOk5.swf" width="325" height="300" style="display: block;" id="swf_id_52bf90022c1ec5f63805683" name="swf_id_52bf90022c1ec5f63805683" bgcolor="#000000" quality="high" allowfullscreen="true" allowscriptaccess="always" salign="tl" scale="noscale" wmode="opaque" flashvars="params=%7B%22autoplay%22%3Afalse%2C%22autorewind%22%3Atrue%2C%22default_hd%22%3Afalse%2C%22dtsg%22%3A%22AQDS3XBu%22%2C%22embedded%22%3Afalse%2C%22inline_player%22%3Afalse%2C%22permalink_url%22%3A%22https%3A%5C%2F%5C%2Fwww.facebook.com%5C%2Fphoto.php%3Fv%3D106629092722013%22%2C%22source%22%3A%22permalink%22%2C%22start_index%22%3A0%2C%22start_muted%22%3Afalse%2C%22video_data%22%3A%5B%7B%22hd_src%22%3A%22https%3A%5C%2F%5C%2Ffbcdn-video-a.akamaihd.net%5C%2Fhvideo-ak-ash2%5C%2Fv%5C%2F1195712_589196951131889_35190_n.mp4%3Foh%3D0c344b926259e40caac020fd7f53aaf2%26oe%3D52BFAE75%26__gda__%3D1388294355_bab6c15e9872f56bd07937ade01c0ebb%22%2C%22is_hds%22%3Afalse%2C%22index%22%3A0%2C%22rotation%22%3A0%2C%22sd_src%22%3A%22https%3A%5C%2F%5C%2Ffbcdn-video-a.akamaihd.net%5C%2Fhvideo-ak-prn2%5C%2Fv%5C%2F1179968_588212787896972_64384_n.mp4%3Foh%3D96311c4958cf9fed906ff233beeca08d%26oe%3D52BFA9E1%26__gda__%3D1388293750_25d9e426f5f131e37f93b1c6f0e22b79%22%2C%22thumbnail_src%22%3A%22https%3A%5C%2F%5C%2Ffbcdn-vthumb-a.akamaihd.net%5C%2Fhvthumb-ak-ash3%5C%2F158720_184646034920318_106629092722013_55515_1342_b.jpg%22%2C%22thumbnail_height%22%3A480%2C%22thumbnail_width%22%3A640%2C%22video_duration%22%3A77%2C%22video_id%22%3A%22106629092722013%22%7D%5D%2C%22min_progress_update%22%3A300%2C%22pixel_ratio%22%3A1%2C%22preload%22%3Afalse%2C%22hide_controls%22%3Afalse%2C%22lsd%22%3Anull%7D&amp;width=720&amp;height=540&amp;user=100004719063006&amp;log=no&amp;div_id=id_52bf90022c1ec5f63805683&amp;swf_id=swf_id_52bf90022c1ec5f63805683&amp;browser=Chrome+24.0.1312.57&amp;tracking_domain=https%3A%2F%2Fpixel.facebook.com&amp;post_form_id=&amp;string_table=https%3A%2F%2Fs-static.ak.facebook.com%2Fflash_strings.php%2Ft96408%2Fes_LA"></div>
          </div>
          <div class="span3" style="margin-right: 30px">
              <iframe width="320" height="300"
                src="http://www.youtube.com/embed/GPQ_p8ExvbI">
            </iframe>
          </div>
          <div class="span3" style="margin-right: 30px">
              <iframe width="320" height="300"
                src="http://www.youtube.com/embed/fdP6nSaSEQU">
            </iframe>
          </div>
        </div>
      </div>
      <hr>
      <div class="lblTitulo">
          Ubicanos
      </div>
      <div id="Ubicacion">
        <div class="row" style="padding: 0px 80px">
          <div class="span3" style="width: 315px;">
            <h2>Clasico 1</h2>
            <div class="Mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1957.5040950707737!2d-77.61310012333698!3d-11.112767157851357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2s!4v1388285790532" width="315" height="250" frameborder="0" style="border:0"></iframe>
            </div>
            <div class="fDir">
                Calle El Inca S/N – Plazuela San Pedro, con teléfono: 232 6993
            </div>
          </div>
          <div class="span3" style="width: 315px;">
            <h2>Clasico 2</h2>
            <div class="Mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1957.5040950707737!2d-77.61310012333698!3d-11.112767157851357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2s!4v1388285790532" width="315" height="250" frameborder="0" style="border:0"></iframe>
            </div>
            <div class="fDir">
                Av. Centenario 127 – San Lorenzo Sta. María, con teléfono 239 3122
            </div>
         </div>
         <div class="span3" style="width: 315px;">
            <h2>Clasico 3</h2>
            <div class="Mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1957.5040950707737!2d-77.61310012333698!3d-11.112767157851357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2s!4v1388285790532" width="315" height="250" frameborder="0" style="border:0"></iframe>
            </div>
            <div class="fDir">
                Frente a la plazuela el Milagro, con teléfono 237 0408.
            </div>
          </div>
        </div>
      </div>
      <hr>

    </div> <!-- /container -->
    <!-- Le javascript
    ================================================== -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        $('.carousel').carousel({
          interval: 2000
        });
      });
    </script>

  </body>
</html>