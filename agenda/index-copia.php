<?php
require_once('bdd.php');


$sql = "SELECT id, title, start, end, color FROM calendar_test ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Panel Cliente - Funtraining </title>

    <!-- Bootstrap -->
    <link href="/src/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font awesome -->
    <link href="/src/libs/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/src/css/custom.css" rel="stylesheet">

    	<!-- FullCalendar -->
	  <link href='/src/libs/fullcalendar/dist/fullcalendar.css' rel='stylesheet' />

    <style>
      body{
        background: #fff;
      }
      .nav_title{
        background: #FF6D00;
      }

      .left_col {
        background: #232323;
         }

        .nav.side-menu>li.active>a{
          background: #232323;
        }

        .nav-md ul.nav.child_menu li:before{
          background: #0BC9FF;
        }
        .nav-sm ul.nav.child_menu{
          background: #232323;
        }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><span>Dashboard Cliente</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="/src/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido</span>
                <h2>Nombre Cliente</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                    </ul>
                  </li>
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
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/user.png" alt="">Cliente
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Cerrar sesión</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="container">
            <h1>Agenda tu entrenamiento</h1>
            <div id="calendar" class="col-md-12">
            </div>
  
            <!-- /.row -->
  
            <!-- Modal -->
            <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form class="form-horizontal" method="POST" action="addEvent.php">
  
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                          aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Agregar Evento</h4>
                    </div>
                    <div class="modal-body">
  
                      <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Titulo</label>
                        <div class="col-sm-10">
                          <input type="text" name="title" class="form-control" id="title"
                            placeholder="Titulo">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="color" class="col-sm-2 control-label">Color</label>
                        <div class="col-sm-10">
                          <select name="color" class="form-control" id="color">
                            <option value="">Seleccionar</option>
                            <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
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
                        <label for="start" class="col-sm-2 control-label">Fecha Inicial</label>
                        <div class="col-sm-10">
                          <input type="text" name="start" class="form-control" id="start">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="end" class="col-sm-2 control-label">Fecha Final</label>
                        <div class="col-sm-10">
                          <input type="text" name="end" class="form-control" id="end">
                        </div>
                      </div>
  
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
  
  
  
            <!-- Modal -->
            <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form class="form-horizontal" method="POST" action="editEventTitle.php">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                          aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Modificar Evento</h4>
                    </div>
                    <div class="modal-body">
  
                      <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Titulo</label>
                        <div class="col-sm-10">
                          <input type="text" name="title" class="form-control" id="title"
                            placeholder="Titulo">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="color" class="col-sm-2 control-label">Color</label>
                        <div class="col-sm-10">
                          <select name="color" class="form-control" id="color">
                            <option value="">Seleccionar</option>
                            <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
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
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label class="text-danger"><input type="checkbox" name="delete"> Eliminar
                              Evento</label>
                          </div>
                        </div>
                      </div>
  
                      <input type="hidden" name="id" class="form-control" id="id">
  
  
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <!-- Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a> -->
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="/src/libs/jquery/jquery.min.js"></script>

    	<!-- Bootstrap Core JavaScript -->
	  <script src="/src/libs/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/src/js/custom.js"></script>

    	<!-- FullCalendar -->
	<script src='/src/libs/moment/moment.min.js'></script>
	<script src='/src/libs/fullcalendar/dist/fullcalendar.min.js'></script>
	<script src='/src/libs/fullcalendar/dist/fullcalendar.js'></script>
	<!-- <script src='/src/libs/fullcalendar/dist/locale/es.js'></script> -->
	
	
	<script>

$(document).ready(function() {
		var date = new Date();
       var yyyy = date.getFullYear().toString();
       var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
       var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
		
		$('#calendar').fullCalendar({
			header: {
				 language: 'es',
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay',

			},
			defaultDate: yyyy+"-"+mm+"-"+dd,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Evento se ha guardado correctamente');
					}else{
						alert('No se pudo guardar. Inténtalo de nuevo.'); 
					}
				}
			});
		}
		
	});

</script>
	
  </body>
</html>
