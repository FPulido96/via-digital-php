<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Reporte - Via Digital</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../reportForm/styles.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-left h-100">
		<div class="card">
			<div class="card-header">
				<h3>Nuevo Reporte</h3>
			</div>
			<div class="card-body">
				<form method="post" action="">
                    <div class="input-group form-group">
						<label>Ubicación: </label>
                        <br>
						<div id="map"></div>
                        <input type="hidden" id="lat" name="latitude">
                        <input type="hidden" id="lng" name="longitude">
					</div>
                    <div class="input-group form-group">
						<label>Tipo: </label>
						<select class="form-control" name="type" require>
                            <option value="">Seleccione una opción</option>
                            <option>Accidente de transito</option>
                            <option>Daño vial</option>
                            <option>Derrumbe</option>
                            <option>Obra en la via</option>
                            <option>Via improvisada</option>
    					</select>
					</div>
					<div class="input-group form-group">
						<label>Fecha: </label>
						<input type="date" class="form-control" name="date" require>
					</div>
                    <div class="input-group form-group">
						<label>Dirección: </label>
						<input type="text" class="form-control" name="address" require>						
					</div>
					<div class="input-group form-group">
						<label>Descripción: </label>
                        <textarea name="description" rows="4" cols="50" require></textarea>
					</div>
                    <!--div class="input-group form-group">
						<label>Evidencias Fotograficas: </label>
                        <input type="file" name="evidences[]" multiple accept="image/*">
					</div-->
					<?php
						include("../connection.php");
						include("controller.php");
					?>
					<div class="form-group">
						<input type="submit" name="save" value="Guardar" class="btn float-right login_btn">
					</div>
					<script src="script.js"></script>
				</form>
                <script src="https://maps.googleapis.com/maps/api/js?key=API_KEY&callback=initMap" async defer></script>

                <script>
                    var marker;
                    var map;

                    function initMap() {
                        // Obtener ubicación actual del dispositivo
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(showMap);
                        } else {
                            alert("La geolocalización no está soportada por este navegador.");
                        }

                        function showMap(position) {
                            var latitude = position.coords.latitude;
                            var longitude = position.coords.longitude;

                            map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 12,
                                center: { lat: latitude, lng: longitude }
                            });

                            // Escucha el evento de clic en el mapa para colocar un marcador
                            google.maps.event.addListener(map, 'click', function(event) {
                                placeMarker(event.latLng);
                            });
                        }

                        function placeMarker(location) {
                            // Eliminar marcador anterior si existe
                            if (marker) {
                                marker.setMap(null);
                            }

                            // Crear un nuevo marcador en la posición indicada
                            marker = new google.maps.Marker({
                                position: location,
                                map: map
                            });

                            // Actualizar los campos de latitud y longitud en el formulario
                            document.getElementById('lat').value = location.lat();
                            document.getElementById('lng').value = location.lng();
                        }
                    }
                </script>
			</div>
		</div>
	</div>
</div>
</body>
</html>