<?php
session_start();
if (isset($_SESSION["usuario"]) == false) {
    echo '<script>window.location.href = "/admin"</script>';
}

$id = $_GET["id"];

include './configDb.php';

$registro = $mysqli->query("delete  FROM noticias WHERE id = $id;");
    mysqli_close($mysqli);

    echo '<script>window.location.href = "/admin/principal.php" </script>';
?>
