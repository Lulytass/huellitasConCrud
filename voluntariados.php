
<?php
$dni = $_POST["dni"];
$nombre = $_POST["Nombre"];
$apellido = $_POST["Apellido"];
$telefono = $_POST["Telefono"];
$mail = $_POST["Mail"];
$domicilio = $_POST["Domicilio"];
$barrio = $_POST["Barrio"];
$horario = $_POST["Horario"];
$edad = $_POST["Edad"];

$mysqli = new mysqli('127.0.0.1', 'root', 'root', 'HuellitasWeb');
$mysqli->set_charset("utf8");
$registro = $mysqli->query("SELECT * FROM voluntarios WHERE dni = $dni;");
$resultado = $registro->fetch_object();

if (isset($resultado->dni)==false) {
   
    $insercion = $mysqli->prepare("INSERT INTO voluntarios (dni, nombre, apellido, telefono, email, domicilio, barrio, rangoHorario, edad) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $insercion->bind_param("ssssssssi", $dni, $nombre, $apellido, $telefono, $mail, $domicilio, $barrio, $horario, $edad);
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


