<?php
    session_start();

    if (isset($_SESSION)) {
        $idUser = $_SESSION['idUser']; 

        $sql = $con->query("select * from user where id= $idUser");
            if ($con->connect_error) {
                die("Error al conectar a la base de datos: " . $con->connect_error);
                echo '<div class="text-danger">Error al conectar a la base de datos.</div>';
            }else{
                if ($data = $sql->fetch_object()) {
                    $user = $data->name . " " . $data->lastName;
                    $name = $data->name;
                    $lastName = $data->lastName;
                    $email = $data->email;
                    $telephone = $data->telephone;
                    $country = $data->country;
                }
                else{
                    echo '<div class="text-danger">Error al traer la información.</div>';
                }
            }

    } else {
        header("location: ../login/login.php");
    }

    if (isset($_POST['cancel'])) {
        header("location: ../account/account.php");
    }

    if (isset($_POST['update'])) {
        if($_POST["update"]){
            if (empty($_POST["name"]) or empty($_POST["lastName"]) or empty($_POST["email"]) 
            or empty($_POST["telephone"]) or empty($_POST["country"]) or empty($_POST["oldPassword"])
            or empty($_POST["newPassword"]) or empty($_POST["repeatPassword"])) {
                echo '<div class="text-danger">Los campos están vacios.</div>';          
            }
            else{
                $name = $_POST["name"];
                $lastName = $_POST["lastName"];
                $email = $_POST["email"];
                $telephone = $_POST["telephone"];
                $country = $_POST["country"];
                $oldPassword = $_POST["oldPassword"];
                $newPassword = $_POST["newPassword"];
                $repeatPassword = $_POST["repeatPassword"];

                $sql = $con->query("select password from user where id='$idUser' and password='$oldPassword'");
                if ($con->connect_error) {
                    die("Error al conectar a la base de datos: " . $con->connect_error);
                    echo '<div class="text-danger">Error al conectar a la base de datos.</div>';
                }
                else{
                    if ($data = $sql->fetch_object()) {
                        if($newPassword == $repeatPassword){
                            $sql = $con->query(" update user set name='$name', lastName='$lastName', email='$email', 
                            telephone='$telephone', country='$country', password='$newPassword', updateDate=now() 
                            where id=$idUser");

                            if ($sql === true) {
                                header("location: ../account/account.php");       
                                echo '<div class="text-success">Cuenta actualizada.</div>';
                            } else {
                                echo '<div class="text-danger">Error al actualizar.</div>' . $connection->error;
                            }
                        }
                        else{

                        }
                    }
                    else {
                        echo '<div class="text-danger">La contraseña es incorrecta.</div>';
                    }
                } 
            }
        }
    }
?>