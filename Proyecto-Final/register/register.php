<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Registro - Via Digital</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-left h-100">
		<div class="card">
			<div class="card-header">
				<h3>Registro</h3>
			</div>
			<div class="card-body">
				<form method="post" action="">
					<div class="input-group form-group">
						<label>Nombre: </label>
						<input type="text" class="form-control" name="name" require>						
					</div>
					<div class="input-group form-group">
						<label>Apellido: </label>
						<input type="text" class="form-control" name="lastName" require>
					</div>
					<div class="input-group form-group">
						<label>Correo: </label>
						<input type="text" class="form-control" name="email" require>
					</div>
					<div class="input-group form-group">
						<label>Contraseña: </label>
						<input type="password" class="form-control" name="password" require>
					</div>
					<div class="input-group form-group">
						<label>Telefono: </label>
						<input type="text" class="form-control" name="telephone" require>
					</div>
					<div class="input-group form-group">
						<label>Pais: </label>
						<select id="paises" class="form-control" name="country" require>
    					</select>
					</div>
					<?php
						include("../connection.php");
						include("controller.php");
					?>
					<div class="form-group">
						<input type="submit" name="register" value="Crear" class="btn float-right login_btn">
					</div>
					<script src="script.js"></script>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>