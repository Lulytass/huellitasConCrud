<?php
$nombre = $_POST["usuario"];
$contraseña = $_POST["contraseña"];

include './configDb.php';

$registro = $mysqli->query("SELECT *FROM usuarios;");
$resultado = $registro->fetch_object();
   
if (password_verify ($nombre, $resultado->nombreDeUsuario) and password_verify ($contraseña, $resultado->contraseñaDeUsuario)) {
session_start ();
$_SESSION["usuario"] = $nombre;
    echo '<script>window.location.href = "/admin/principal.php"</script>';
} else {
    echo "<script>alert('Tus datos son incorrectos.');</script>";
    echo '<script>window.location.href = "/admin"</script>';
}
?>
