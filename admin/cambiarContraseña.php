<?php
$contraseña = $_POST["Contraseña1"];
$pregunta = $_POST["preguntaSeguridad"];
$respuesta = $_POST["respuestaSeguridad"];

include './configDb.php';

$registro = $mysqli->query("SELECT *FROM usuarios;");
$resultado = $registro->fetch_object();
   
if (password_verify ($pregunta, $resultado->preguntaSeguridad) and password_verify ($respuesta, $resultado->respuestaSeguridad)) {
    $contraseñaNueva = password_hash ($_POST['Contraseña1'], PASSWORD_BCRYPT);
    $insercion = $mysqli->prepare("UPDATE usuarios SET contraseñaDeUsuario = ?");
    $insercion->bind_param("s", $contraseñaNueva);
    $insercion->execute();
    $insercion->close();

    echo "<script>alert('Se a cambiado la contraseña exitosamente.');</script>";
    echo '<script>window.location.href = "/admin"</script>';
}
else {
    echo "<script>alert('Error, la pregunta o respuesta de seguridad son incorrectas.');</script>";
    echo '<script>window.location.href = "/admin"</script>';
}

    mysqli_close($mysqli);
?>
