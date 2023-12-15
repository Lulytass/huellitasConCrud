<?php
session_start();
if (isset($_SESSION["usuario"]) == false) {
    echo '<script>window.location.href = "/admin"</script>';
}


        $image = $_FILES['imagen']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        $cuerpo = $_POST["cuerpo"];
        $fecha = date("Y-m-d");

        include './configDb.php';

        $registro = $mysqli->query("insert into  AdoptantesHistorias (cuerpo, imagen, fecha) values ('$cuerpo', '$imgContenido', '$fecha');");

//    $insercion = $mysqli->prepare("INSERT INTO adoptantesHistorias (cuerpo, imagen, fecha) VALUES (?, ?, ?)");
//    $insercion->bind_param("sbs", $cuerpo, $imgContenido, $fecha);
//    $insercion->execute();
//    $insercion->close();

    echo "<script>alert('Se a cargado el nuevo adoptado exitosamente.'); </script>";
    mysqli_close($mysqli);
    echo '<script>window.location.href = "/admin/principal.php" </script>';
?>
