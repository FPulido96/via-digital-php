<?php
    if(!empty($_POST["login"])){
	    if (empty($_POST["email"]) or empty($_POST["password"])) {
            echo '<div class="text-danger">Los campos están vacíos.</div>';
        } else {
		    $email = $_POST["email"];
			$password = $_POST["password"];

            $sql = $con->query("select * from user where email='$email' and password='$password'");
            if ($con->connect_error) {
                die("Error al conectar a la base de datos: " . $con->connect_error);
                echo '<div class="text-danger">Error al conectar a la base de datos.</div>';
            }
            else{
                if ($data = $sql->fetch_object()) {
                    $status = $data->status;
                    if($status == 1){ 
                        session_start();
                        $_SESSION['user'] = $data->name . " " . $data->lastName;
                        $_SESSION['email'] = $data->email;
                        $_SESSION['idUser'] = $data->id;
    
                        header("location: ../index/index.php");
                    }
                    else{
                        echo '<div class="text-danger">El usuario está desactivado.</div>';
                    }                
                } else {
                    echo '<div class="text-danger">El usuario o la contraseña están incorrectos.</div>';
                }
            }            
		}	
	}
?>
