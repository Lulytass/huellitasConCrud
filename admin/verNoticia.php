<?php
session_start();
if (isset($_SESSION["usuario"]) == false) {
    echo '<script>window.location.href = "/admin"</script>';
}
?>



<!DOCTYPE html>
<html lang="en" title="Coding design">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ver noticia de Huellitas</title>
        <link rel="stylesheet"  href="/admin/stylesNoticia.css" type="text/css">
        <link rel="shortcut icon" href="../img/favicon-huellitas.jpg" type="image/x-icon">
    </head>

    <body>
        <header>
            <div class="logo">
                <img src="/admin/img/huellitas.png" alt="logoHuellitas" class="logo-imagen">
            </div>
            <div>
                <a href="/admin/cerrar.php"> Cerrar sesión </a>
            </div>
            <div class="btn1">
                <a href="/admin/principal.php"><img src="/admin/img/huellitaBack.png" alt="logoHuellita"></a>
            </div>
        </header>


        <table id="dataTable">
            <thead>
                <tr>
                    <th> Titulo</th>
                    <th> Fecha</th>
                    <th> Cuerpo </th>
                    <th> Fuente del articulo</th>
                    <th> Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                                    
                    $id = $_GET["id"];
                    include './configDb.php';
                    $registro = $mysqli->query("SELECT * FROM noticias WHERE id = $id;");
                    $resultado = $registro->fetch_object();
                    echo '<tr>';
                    echo '<td>'.$resultado->titulo.'</td>';
                    echo '<td>'.$resultado->fecha.'</td>';
                    echo '<td width="800px">'.$resultado->cuerpo.'</td>';
                    echo '<td>'.$resultado->fuente.'</td>';
                    echo '<td> <a class="eliminar" href="/admin/eliminarNoticia.php/?id='.$resultado->id.'"> Eliminar noticia </a> </td> <br>';
                    echo '</tr>';
                        
                    mysqli_close($mysqli);
                ?>
                    
            </tbody>
        </table>  
        
        
    </body>
</html>