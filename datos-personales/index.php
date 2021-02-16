<?php
  if(!isset($_COOKIE["token"]) || ($_COOKIE["token"] == "")) {
    header('Location: /');
  }
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="icon" href="/src/img/favicon.ico" type="image/ico" /> -->
  <title>Dashboard Cliente - Funtraining </title>
  <!-- Bootstrap -->
  <link href="/src/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="/src/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="/src/css/custom.css" rel="stylesheet">

  <link rel="stylesheet" href="/src/css/schedule.css">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"> <span>Funtraining</span></a>
          </div>
          <div class="clearfix"></div>
          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="/src/img/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <h2>Cliente</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->
          <br />
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="/agenda/"> <i class="fa fa-calendar"></i>Agenda</a></li>
                <li><a href="/datos-personales/"> <i class="fa fa-database"></i>Datos personales</a></li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>
      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                  data-toggle="dropdown" aria-expanded="false">
                  <img src="/src/img/user.png" alt="">Cliente
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#" id="btn-logout"><i class="fa fa-sign-out pull-right"></i>Cerrar
                    Sesión</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->
      <!-- page content -->
      <div class="right_col text-center" role="main">
        
            
            <h3>Actualice o registre su información personal</h3>

            <form action="">
                <input type="text" class="form-control" placeholder="Número de identificacion">
                <input type="text" class="form-control" placeholder="Nombres y Apellidos">
                <input type="text" class="form-control" placeholder="Edad">
                <input type="text" class="form-control" placeholder="Peso">
                <input type="text" class="form-control" placeholder="Correo electrónico">
                <input type="text" class="form-control" placeholder="Número de celular">
                <input type="text" class="form-control" placeholder="Complicaciones">
                <input type="text" class="form-control" placeholder="Contraseña">
                <button class="btn btn-naranja" id="btn-enviar-datos-cliente">
                    ENVIAR
                </button>
                
            </form>

      </div>
      <!-- /page content -->
      <!-- footer content -->
      <footer>
      </footer>
      <!-- /footer content -->
    </div>
  </div>
  <!-- Custom Theme Scripts -->
  <!-- jQuery -->
  <script src="/src/libs/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="/src/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Custom js -->
  <script src="/src/js/custom.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="/src/libs/bootstrap/js/bootstrap.min.js"></script>
  <!-- <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/src/commons/common-scripts-caller.php';?> -->

  <script src="/src/libs/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="/src/libs/axios/axios.min.js"></script>
  <script src="/src/js/utils.js"></script>
  <script src="/src/js/dashboard-general-script.js"></script>
</body>

</html>