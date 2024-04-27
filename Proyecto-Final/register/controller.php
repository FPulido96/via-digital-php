<?php
    if(!empty($_POST["register"])){
        if($_POST["register"]){
            $name = $_POST["name"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
		    $password = $_POST["password"];
            $telephone = $_POST["telephone"];
            $country = $_POST["country"];

            if (empty($_POST["name"]) or empty($_POST["lastName"]) or empty($_POST["email"]) 
            or empty($_POST["password"]) or empty($_POST["telephone"]) or empty($_POST["country"])) {
                echo '<div class="text-danger">Los campos están vacios.</div>';          
            }
            else{
                $sql = $con->query(" insert into user (name, lastName, typeUser, email, password, telephone, country, status, creationDate)
                values('$name', '$lastName', 'Estandar', '$email', '$password', '$telephone', '$country', 1, now())");

                if ($sql === true) {
                    echo '<div class="text-success">Cuenta creada exitosamente.</div>';
                    header("location: ../login/login.php");       
                } else {
                    echo '<div class="text-danger">Error al crear la cuenta.</div>' . $connection->error;
                }
            }
        }
    }
?>