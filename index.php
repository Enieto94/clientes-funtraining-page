<!DOCTYPE html>

<html lang="es">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Inicio - Funtraining</title>

	<?php include_once $_SERVER["DOCUMENT_ROOT"] . '/src/commons/common-styles-caller.php';?>

	<link rel="stylesheet" href="/src/css/login-style.css">

</head>

<body>

	<div class="container-fluid">
		<?php include_once $_SERVER["DOCUMENT_ROOT"] . '/src/commons/header.php' ;?>

		<main class="row justify-content-center align-items-center py-5" id="login-container">
			<div class="col-12">
				<section class="row justify-content-center my-4">
					<div class="col-6 col-md-3">
						<div class="row">
							<img class="img-responsive" src="/src/img/logo.png" alt="" >
						</div>
					</div>
				</section>
				<section class="row justify-content-center">
					<div class="col-10 col-md-4" id="login-form">
						<div class="row">
							<input class="form-control my-2" type="text" placeholder="Usuario" id="user">
							<input class="form-control" type="password" placeholder="Contraseña" id="password">
						</div>
					</div>
					<div class="col-12">
						<div class="row justify-content-center">
							<a href="/agenda/" class="btn fondo-naranja blanco my-4" href="" id="btn-login">INICIAR SESION</a>
						</div>
					</div>
				</section>
			</div>
		</main>

		<?php include_once $_SERVER["DOCUMENT_ROOT"] . '/src/commons/footer.php' ;?>

	</div>

	<?php include_once $_SERVER["DOCUMENT_ROOT"] . '/src/commons/common-scripts-caller.php';?>
	<script>
		$("#btn-login").click(function(){
			if($("#user").val() == "" || $("#password").val() == ""){
				event.preventDefault();
				alert('Ingrese susdatos por favor');
			}else if($("#user").val() != "admin" && $("#password").val() != "1234"){
				alert('Usuario o contraseña incorrecto');
			}else if($("#user").val() == "admin" && $("#password").val() == "1234"){
				$(location).attr('href','/agenda/');
			}
		});
	</script>
</body>

</html>