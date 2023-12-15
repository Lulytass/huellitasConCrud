<?php
$nombre = password_hash ($_POST['Nombre'], PASSWORD_BCRYPT);
$contraseña = password_hash ($_POST['Contraseña'], PASSWORD_BCRYPT);
$pregunta = password_hash ($_POST['preguntaSeguridad'], PASSWORD_BCRYPT);
$respuesta = password_hash ($_POST['respuestaSeguridad'], PASSWORD_BCRYPT);

include './configDb.php';

    $insercion = $mysqli->prepare("INSERT INTO usuarios (nombreDEUsuario, contraseñaDeUsuario, preguntaSeguridad, respuestaSeguridad) VALUES (?, ?, ?, ?)");
    $insercion->bind_param("ssss", $nombre, $contraseña, $pregunta, $respuesta);
    $insercion->execute();
    $insercion->close();
    mysqli_close($mysqli);

    echo '<script> window.location.href = "/admin" </script>'; 
?>
