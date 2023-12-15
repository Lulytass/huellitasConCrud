<?php
session_start();
if (isset($_SESSION["usuario"]) == false) {
    echo '<script>window.location.href = "/admin"</script>';
}

$titulo = $_POST["titulo"];
$cuerpo = $_POST["cuerpo"];
$fuente = $_POST["fuente"];
$fecha = date("Y-m-d");

include './configDb.php';

    $insercion = $mysqli->prepare("INSERT INTO noticias (titulo, cuerpo, fuente, fecha) VALUES (?, ?, ?, ?)");
    $insercion->bind_param("ssss", $titulo, $cuerpo, $fuente, $fecha);
      $insercion->execute();
    $insercion->close();

    echo "<script>alert('Se a cargado la noticia exitosamente.'); </script>";
    mysqli_close($mysqli);
    echo '<script>window.location.href = "/admin/principal.php" </script>';
?>
