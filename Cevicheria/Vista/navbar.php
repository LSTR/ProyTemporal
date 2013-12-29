<?php
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: index.php");
    //ACA PUEDES VERIFICAR EL NIVEL DE ACCESO Y REDIRIGIR A ESE ARCHIVO.
    $NivelAcceso=$sess->getSesion("NivelAcceso");
    $Empleado=$sess->getSesion("Empleado");
    $host=$sess->getHost();
?>

<?php
    if($NivelAcceso=="1"){?>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
              <a class="brand" href="<?php echo $host?>">ADMINISTRADOR</a>
            <div class="nav-collapse collapse">
              <p class="navbar-text pull-right">
                  <?php echo $Empleado?>&nbsp;&nbsp;&nbsp;&nbsp; <a href="../../cerrarsession.php" class="navbar-link">Cerrar Session</a>
              </p>
              <ul class="nav">
                <li class="<?php echo($opcMenu=="personal")?"active":""?>"><a href="../personal/tabla.php">Personal</a></li>
                <li class="<?php echo($opcMenu=="cargo")?"active":""?>"><a href="../cargo/tabla.php">Cargo</a></li>
                <li class="<?php echo($opcMenu=="productos")?"active":""?>"><a href="../Productos/tabla.php">Productos</a></li>
                <li class="<?php echo($opcMenu=="platos")?"active":""?>"><a href="../plato/tabla.php">Platos</a></li>
                <li class="<?php echo($opcMenu=="bebida")?"active":""?>"><a href="../Bebidas/tabla.php">Bebidas</a></li>
                <li class="<?php echo($opcMenu=="mesa")?"active":""?>"><a href="../mesa/tabla.php">Mesa</a></li>
                <li class="<?php echo($opcMenu=="pedido")?"active":""?>"><a href="../pedido/data.php">Pedidos</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    <?php }
    else if($NivelAcceso=="2"){?>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="<?php echo $host?>">CAJERO</a>
            <div class="nav-collapse collapse">
              <p class="navbar-text pull-right">
                  <?php echo $Empleado?>&nbsp;&nbsp;&nbsp;&nbsp; <a href="../../cerrarsession.php" class="navbar-link">Cerrar Session</a>
              </p>
              <ul class="nav">
                <li class="<?php echo($opcMenu=="factura")?"active":""?>"><a href="../comprobante/dataFactura.php">Facturas</a></li>
                <li class="<?php echo($opcMenu=="boleta")?"active":""?>"><a href="../comprobante/dataBoleta.php">Boletas</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    <?php }
    else if($NivelAcceso=="3"){?>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="<?php echo $host?>">COCINA</a>
            <div class="nav-collapse collapse">
              <p class="navbar-text pull-right">
                  <?php echo $Empleado?> &nbsp;&nbsp;&nbsp;&nbsp; <a href="../../cerrarsession.php" class="navbar-link">Cerrar Session</a>
              </p>
              <ul class="nav">
                <li class="active"><a href="#">Inicio</a></li>
                <li><a href="../cargo/tblCargo.php">Cargo</a></li>
                <li><a href="#contact">Personal</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    <?php }
    else if($NivelAcceso=="4"){?>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="<?php echo $host?>">MOZO</a>
            <div class="nav-collapse collapse">
              <p class="navbar-text pull-right">
                  <?php echo $Empleado?> &nbsp;&nbsp;&nbsp;&nbsp; <a href="../../cerrarsession.php" class="navbar-link">Cerrar Session</a>
              </p>
              <ul class="nav">
                <li class="active"><a href="<?php echo $host?>">Mesa</a></li>
              </ul>
            </div>
          </div>
        </div>
    </div>
    <?php }
?>