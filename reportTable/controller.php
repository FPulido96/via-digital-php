<?php
    session_start();

    if (isset($_SESSION)) {
        
    } else {
        header("location: ../login/login.php");
    }

    $sql = "select * from report where status=1";
    $result = $con->query($sql);

    // Verificar si hay filas en el resultado
    if ($result->num_rows > 0) {    
        // Imprimir los datos en la tabla
        while ($files = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $dateReport = date("d-m-Y", strtotime($files["dateReport"]));
            echo "<td>" . $files["address"] . "</td>";
            echo "<td>" . $files["type"] . "</td>";
            echo "<td>" . $files["description"] . "</td>";
            echo "<td>" . $files["latitude"] . "</td>";
            echo "<td>" . $files["longitude"] . "</td>";

            echo "<td><form action='' method='post'><input type='hidden' name='id' value='" . $files['id'] . "'><input type='submit' value='Eliminar' name='delete'></form></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No hay datos disponibles</td></tr>";
    }

    if(!empty($_POST["delete"])){
        if($_POST["delete"]){
            if (empty($_POST["id"])) {
                echo '<div class="text-danger">El ID no existe.</div>';          
            }
            else{
                $id = $_POST["id"];

                $sql = $con->query("update report set status=0, updateDate=now() where id=$id");

                if ($sql === true) {
                    echo '<div class="text-success">Reporte eliminado.</div>';
                    header("location: ../reportTable/reportTable.php");       
                } else {
                    echo '<div class="text-danger">Error al eliminar el reporte.</div>' . $connection->error;
                }
            }
        }
    }
?>