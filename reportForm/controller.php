<?php
    session_start();
    if (isset($_SESSION)) {
        $idUser = $_SESSION['idUser'];
    } else {
        header("location: ../login/login.php");
    }

    if(!empty($_POST["save"])){
        if($_POST["save"]){
            if (empty($_POST["date"]) or empty($_POST["type"]) or empty($_POST["latitude"]) 
            or empty($_POST["longitude"]) or empty($_POST["address"]) or empty($_POST["description"])) {
                echo '<div class="text-danger">Los campos están vacios.</div>';          
            }
            else{
                $date = $_POST["date"];
                $type = $_POST["type"];
                $latitude = $_POST["latitude"];
                $longitude = $_POST["longitude"];
                $address = $_POST["address"];
                $description = $_POST["description"];

                $sql = $con->query(" insert into report (dateReport, type, latitude, longitude, address, description, idUser, status, creationDate)
                values('$date', '$type', '$latitude', '$longitude', '$address', '$description', $idUser, 1, now())");

                if ($sql === true) {
                    echo '<div class="text-success">Reporte creado exitosamente.</div>';
                    header("location: ../reportTable/reportTable.php");       
                } else {
                    echo '<div class="text-danger">Error al crear el reporte.</div>' . $connection->error;
                }
            }
        }
    }
?>