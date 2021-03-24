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
  <!-- FullCalendar -->
  <link href='/src/libs/fullcalendar/main.min.css' rel='stylesheet' />
  <link rel="stylesheet" href="/src/css/schedule.css">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"> 
              <span>Fun Training</span>
              <img src="/src/img/logo-panel.jpg" id="logo-panel" alt="">
            </a>
          </div>
          <div class="clearfix"></div>
          <!-- menu profile quick info -->
          <div class="profile clearfix">
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
                  Cliente
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
      <div class="right_col" role="main">
        <div class="container-fluid">
          <h4>
            <strong id="aclaratory">IMPORTANTE</strong> Nuestros Horarios son: 
          </h4>
          <h5>
            <strong>Lunes a Viernes </strong> 5:00 AM - 11:00 AM / 4:00 PM - 10:00 PM
          </h5>
          <h5>
           <strong>Sábados / Festivos</strong> 8:00 AM - 2:00 PM
          </h5>
          <div class="row" style="height: 500px;">
            <div id="calendar">
            </div>

          </div>
          <!-- CREATE EVENT Modal -->
          <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form class="form-horizontal" id="create-event-form">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar asistencia</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="title" class="col-sm-4 control-label">Titulo</label>
                      <div class="col-sm-8">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Titulo" disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="color" class="col-sm-4 control-label">Color</label>
                      <div class="col-sm-8">
                        <select name="color" class="form-control" id="color" disabled>
                          <option value="seleccionar">Seleccionar</option>
                          <option style="color:#0071c5;" value="#0071c5" selected>&#9724; Azul oscuro</option>
                          <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
                          <option style="color:#008000;" value="#008000">&#9724; Verde</option>
                          <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
                          <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
                          <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
                          <option style="color:#000;" value="#000">&#9724; Negro</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="start" class="col-sm-4 control-label">Fecha y hora inicial</label>
                      <div class="col-sm-8">
                        <input type="datetime-local" name="start" class="form-control" id="start" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" onchange="setMinutesToCero(this)">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="end" class="col-sm-4 control-label">Fecha y hora final</label>
                      <div class="col-sm-8">
                        <input type="datetime-local" name="end" class="form-control" id="end" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" onchange="setMinutesToCero(this)" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- EDIT EVENT Modal -->
          <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form class="form-horizontal" id="edit-event-form">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modificar Evento</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="title" class="col-sm-4 control-label">Titulo</label>
                      <div class="col-sm-8">
                        <input type="text" name="edit-title" class="form-control" id="edit-title" placeholder="Titulo"
                          disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="color" class="col-sm-4 control-label">Color</label>
                      <div class="col-sm-8">
                        <select name="color" class="form-control" id="edit-color" disabled>
                          <option value="seleccionar">Seleccionar</option>
                          <option style="color:#0071c5;" value="#0071c5" selected>&#9724; Azul oscuro</option>
                          <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
                          <option style="color:#008000;" value="#008000">&#9724; Verde</option>
                          <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
                          <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
                          <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
                          <option style="color:#000;" value="#000">&#9724; Negro</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="start" class="col-sm-4 control-label">Fecha y hora inicial</label>
                      <div class="col-sm-8">
                        <input type="datetime-local" name="edit-start" class="form-control" id="edit-start" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" onchange="setMinutesToCero(this)">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="end" class="col-sm-4 control-label">Fecha y hora final</label>
                      <div class="col-sm-8">
                        <input type="datetime-local" name="edit-end" class="form-control" id="edit-end" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" onchange="setMinutesToCero(this)" disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                          <label class="text-danger">
                            <input type="checkbox" name="delete-event-checkbox" id="delete-event-checkbox">
                            Eliminar Evento</label>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="edit-id" class="form-control" id="edit-id">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary" type="submit" id="btn-edit-event">Actualizar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->
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
  <!-- FullCalendar -->
  <script src='/src/libs/moment/moment.min.js'></script>
  <script src='/src/libs/fullcalendar/main.min.js'></script>
  <script src='/src/libs/fullcalendar/locales/es.js'></script>
  <script src="/src/libs/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="/src/libs/axios/axios.min.js"></script>
  <script src="/src/js/utils.js"></script>
  <script src="/src/js/dashboard-general-script.js"></script>
  <script src="/src/js/schedule.js"></script>
</body>

</html>