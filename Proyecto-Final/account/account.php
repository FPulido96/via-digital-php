<?php
	include("../connection.php");
	include("controller.php");
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Mi Cuenta - Via Digital</title>
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
				<h3>Información Básica</h3>
			</div>
			<div class="card-body">
				<form method="post" action="">
                    <?php
                        if(!isset($_POST["edit"])){
                    ?>
					<div class="input-group form-group">
						<label>Nombre: </label>
                        <label><?php echo $user; ?></label>
					</div>
					<div class="input-group form-group">
						<label>Correo: </label>
                        <label><?php echo $email; ?></label>
					</div>
					<div class="input-group form-group">
						<label>Telefono: </label>
                        <label><?php echo $telephone; ?></label>
					</div>
					<div class="input-group form-group">
						<label>Pais: </label>
                        <label><?php echo $country; ?></label>
					</div>
                    <div class="form-group">
						<input type="submit" name="edit" value="Editar" class="btn float-right login_btn">
					</div>
                    <?php
                        }
                        if(isset($_POST["edit"])){
                    ?>
					<div class="input-group form-group">
						<label>Nombre: </label>
						<input type="text" class="form-control" name="name" value="<?php echo $name; ?>" require>						
					</div>
					<div class="input-group form-group">
						<label>Apellido: </label>
						<input type="text" class="form-control" name="lastName" value="<?php echo $lastName; ?>" require>
					</div>
					<div class="input-group form-group">
						<label>Correo: </label>
						<input type="text" class="form-control" name="email" value="<?php echo $email; ?>" require>
					</div>
					<div class="input-group form-group">
						<label>Telefono: </label>
						<input type="text" class="form-control" name="telephone" value="<?php echo $telephone; ?>" require>
					</div>
					<div class="input-group form-group">
						<label>Pais: </label>
						<select id="paises" class="form-control" name="country" require>
    					</select>
					</div>
                    <div class="input-group form-group">
						<label>Antigua Contraseña: </label>
						<input type="password" class="form-control" name="oldPassword" require>
					</div>
                    <div class="input-group form-group">
						<label>Nueva Contraseña: </label>
						<input type="password" class="form-control" name="newPassword" require>
					</div>
                    <div class="input-group form-group">
						<label>Repetir Contraseña: </label>
						<input type="password" class="form-control" name="repeatPassword" require>
					</div>
                    <div class="form-group">
						<input type="submit" name="cancel" value="Cancelar" class="btn float-left login_btn">
					</div>
                    <div class="form-group">
						<input type="submit" name="update" value="Actualizar" class="btn float-right login_btn">
					</div>
                    <?php
                        }
                    ?>
                    <script>
                        $(document).ready(function() {
    // Cargar lista de países al cargar la página
    $.ajax({
    url: 'https://restcountries.com/v3.1/all',
    method: 'GET',
    data: {
        lang: 'es' // Especifica el idioma deseado (en este caso, español)
    },
    success: function(data) {
        $('#paises').empty();
        $('#paises').append($('<option>', {
            value: '',
            text: 'Selecciona un país'
        }));

        // Ordenar los países alfabéticamente por nombre
        var countries = data.sort(function(a, b) {
            return a.name.common.localeCompare(b.name.common);
        });

        // Agregar opciones al elemento <select>
        countries.forEach(function(country) {
            var option = $('<option>', {
                value: country.name.common,
                text: country.name.common
            });

            // Verificar si el país actual es igual al país seleccionado
            var selectedCountry = "<?php echo $country; ?>";
            if (selectedCountry === country.name.common) {
                option.attr('selected', true);
            }

            $('#paises').append(option);
        });
    }
});

    // Cuando se selecciona un país, cargar los estados correspondientes
    $('#paises').change(function() {
        var countryName = $(this).val();
        console.log("Pais: ", countryName);
        cargarEstados(countryName);
    });

    // Cuando se selecciona un estado, cargar las ciudades correspondientes
    $('#estados').change(function() {
        var countryName = $('#paises').val();
        var stateName = $(this).val();
        cargarCiudades(countryName, stateName);
    });
});

function cargarEstados(countryName) {
    $.ajax({
        url: 'https://restcountries.com/v3.1/name/' + countryName,
        method: 'GET',
        data: {
            lang: 'es' // Especifica el idioma deseado (en este caso, español)
        },
        success: function(data) {
            var states = data[0].subdivisions;
            $('#estados').empty();
            $('#estados').append($('<option>', {
                value: '',
                text: 'Selecciona un estado'
            }));

            // Verifica si hay subdivisiones (estados)
            if (states) {
                // Ordenar los estados alfabéticamente por nombre
                var sortedStates = Object.keys(states).sort(function(a, b) {
                    return states[a].name.localeCompare(states[b].name);
                });

                // Agregar opciones al elemento <select>
                sortedStates.forEach(function(stateKey) {
                    $('#estados').append($('<option>', {
                        value: stateKey,
                        text: states[stateKey].name
                    }));
                });
            }
        }
    });
}

function cargarCiudades(countryName, stateName) {
    $.ajax({
        url: 'https://restcountries.com/v3.1/name/' + countryName,
        method: 'GET',
        data: {
            lang: 'es' // Especifica el idioma deseado (en este caso, español)
        },
        success: function(data) {
            var states = data[0].subdivisions;
            var cities = states[stateName].cities;
            $('#ciudades').empty();
            $('#ciudades').append($('<option>', {
                value: '',
                text: 'Selecciona una ciudad'
            }));

            // Verifica si hay ciudades
            if (cities) {
                // Ordenar las ciudades alfabéticamente
                var sortedCities = cities.sort(function(a, b) {
                    return a.localeCompare(b);
                });

                // Agregar opciones al elemento <select>
                sortedCities.forEach(function(city) {
                    $('#ciudades').append($('<option>', {
                        value: city,
                        text: city
                    }));
                });
            }
        }
    });
}
                    </script>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>