
<?php
$dni = $_POST["dni"];
$nombre = $_POST["Nombre"];
$apellido = $_POST["Apellido"];
$telefono = $_POST["Telefono"];
$mail = $_POST["Mail"];
$domicilio = $_POST["Domicilio"];
$barrio = $_POST["Barrio"];
$mascota = $_POST["Mascotas"];
$adoptar = $_POST["adoptar"];
$horas = $_POST["horasSolo"];
$edadMenor = $_POST["edadMenor"];
$cantidadAmbientes = $_POST["ambientes"];

$mysqli = new mysqli('127.0.0.1', 'root', 'root', 'HuellitasWeb');
$mysqli->set_charset("utf8");
$registro = $mysqli->query("SELECT * FROM adoptantes WHERE dni = $dni;");
$resultado = $registro->fetch_object();

if (isset($resultado->dni)==false) {
    $insercion = $mysqli->prepare("INSERT INTO adoptantes (dni, nombre, apellido, telefono, email, domicilio, barrio, mascota, adoptar, horas, edadMenor, cantidadAmbientes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $insercion->bind_param("sssssssssiii", $dni, $nombre, $apellido, $telefono, $mail, $domicilio, $barrio, $mascota, $adoptar, $horas, $edadMenor, $cantidadAmbientes);
    $insercion->execute();
    mysqli_close($mysqli);
    echo "<script>alert('Muy bien, se ha registrado en el sistema.');</script>";
    echo '<script>window.location.href = "/index.html"</script>';
}
else {
    echo "<script>alert('Error, ese voluntario ya está registrado en el sistema');</script>";
    echo '<script>window.location.href = "/index.html"</script>'; 
}

?>