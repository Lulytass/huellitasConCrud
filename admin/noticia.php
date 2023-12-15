<?php
session_start();
if (isset($_SESSION["usuario"]) == false) {
    echo '<script>window.location.href = "/admin"</script>';
}
?>

<!doctype html>
<html lang="es-ar">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"  href="/admin/estilos/stylesNoticia.css" type="text/css">
     
        
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Ver noticia </title>
    </head>
    <body>
        <header>
            <div class="logo">
                <img src="/admin/img/huellitas.png" alt="logoHuellitas" class="logo-imagen">
                <a href="/admin/cerrar.php"> Cerrar sesión </a>
            </div>
        </header>
                    <div class="tamañoTabla">
                        <section class="cabeceraTabla">
                                <table>
                                        <thead>
                                        <tr>
                                        <th>Titulo</th>
                                        <th>Fecha</th>
                                        <th>Cuerpo</th>
                                        <th>Fuente del articulo</th>

                                        </tr>
                                        </thead>
                    </section>
                    <section class="cuerpoTabla">
                    <tbody>
                    <?php
                                
                                $id = $_GET["id"];
                                include './configDb.php';
                            
                                $registro = $mysqli->query("SELECT * FROM noticias WHERE id = $id;");
                                $resultado = $registro->fetch_object();
                                /*
                                echo '<h1>'.$resultado->titulo.' </h1> <br/>';
                                echo '<h3>Fecha: </h3><p>' .$resultado->fecha. '</p>';
                                echo '<div width="500px"><h3>cuerpo:<h3><p>' .$resultado->cuerpo.'<p/></div>';
                                echo '<h3>Fuente del artículo: </h3><p>' .$resultado->fuente. '<p/><br>';
                                echo '<a href="/admin/eliminarNoticia.php/?id='.$resultado->id.'"> Eliminar noticia </a> <br>';
                                */
                                mysqli_close($mysqli);
                            ?>


                                    <tr>
                                        <td><?php echo $resultado->titulo;?></td>
                                        <td><?php echo $resultado->fecha;?></td>
                                        <td><?php echo $resultado->cuerpo;?></td>
                                        <td><?php echo $resultado->fuente;?></td>
                                
                                        
                                    </tr>
                                </tbody>


                        </section>
                        






        
                                                 
                             

        
    </body>
</html>
