<?php
session_start();
if (isset($_SESSION["usuario"]) == false) {
    echo '<script>window.location.href = "/admin"</script>';
}

include './configDb.php';
?>

<!doctype html>
<html lang="es-ar">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet"  href="../styles.css" type="text/css">
        <link rel="stylesheet"  href="./stylesNoticia.css" type="text/css">
        <title> Página de administrador </title>
    </head>
    <body>
        <header>
            <nav class="logo">
                <img src="../img/huellitas.png" alt="logoHuellitas" class="logo-imagen">
                <a href="/admin/cerrar.php"> Cerrar sesión </a>
            </nav>
        </header>
        <main>
            <div class="opciones">
                <h1 class="container-contenido">Menu principal:</h1>
                <!--<label class="textoCombo" class="opciones">Menú principal:-->
                <div class=opcionesSelect>
                    <select id="selectMenu">
                        <option value="0"> Seleccione una opción </option>
                        <option value="1"> Noticias </option>
                        <option value="2"> Artículos </option>
                        <option value="3"> Adoptados </option>
                    </select>      
                </div>
            </div>
            <div id="contenedor1" class="container-contenido">
                <article>
                    <h2 class="tituloRegistro"> Cargar nueva noticia </h2>
                    <p class="tituloRegistro"> Para cargar una nueva noticia en la página principal del sitio, completa el siguiente formulario. </p> <br>
                    <section class="formulario-registro">
                        <form method="post" action="/admin/agregarNoticia.php">
                            <label class="textoCombo"> <b>Título de la noticia:</b> <input type="text" class="controls" name="titulo" id="tituloNoticia" size="150" maxlength="150" required> </label>
                            <label class="textoCombo"> <b>Texto de la noticia:</b> <textarea class="textarea" name="cuerpo" id="cuerpoNoticia" placeholder="" maxlength="1100" minlength="700" required></textarea></label>
                            <label class="textoCombo"> <b>Fuente de la noticia:</b> <input type="text" class="controls" name="fuente" id="fuenteNoticia" maxlength="100" required> </label>
                            <input type="submit" class="botonRegistro"  value="Cargar noticia">   
                        </form> 
                    </section>
                </article> 
                <table id="dataTable">
                    <thead>
                        <tr>
                            <th> Fecha</th>
                            <th> Titulo</th>
                            <th> Accion 1 </th>
                            <th> Accion 2</th>
                        </tr>
                    </thead>
                    <tbody>    
                        <?php

                            $noticias = $mysqli->query("SELECT * FROM noticias");

                            if ($noticias->num_rows > 0) {
                                echo '<h3 class="container-contenido"> Noticias Disponibles </h3>';

                                while($resultado1 = $noticias->fetch_object()){
                                    echo '<tr>';
                                    echo '<td>'.$resultado1->fecha.'</td>';
                                    echo '<td>'.$resultado1->titulo.'</td>';
                                    echo '<td> <a class="ver" href="/admin/verNoticia.php/?id='.$resultado1->id.'"> Ver noticia </a> </td>';
                                    echo '<td> <a class="eliminar" href="/admin/eliminarNoticia.php/?id='.$resultado1->id.'"> Eliminar noticia </a> </td>';
                                    echo '</tr>';
                                } 
                            }else{
                                echo '<h3> Sin noticias </h3>';
                                echo '<p> No hay noticias todavía </p>';
                            }
                        ?>
                    </tbody>
                </table>        
            </div>

            <div id="contenedor2" class="container-contenido">
                <article>
                    <h2 class="tituloRegistro"> Cargar nuevo artículo de interés </h2>
                    <p class="tituloRegistro"> Para cargar un nuevo artículo de interés sobre perros y/o gatos en la página principal del sitio, completa el siguiente formulario. </p> <br>
                    <section class="formulario-registro">
                        <form method="post" action="/admin/agregarArticulo.php">
                            <label class="textoCombo"> título del artículo: <input type="text" class="controls" name="titulo" id="tituloArticulo" maxlength="150" required> </label>
                            <label class="textoCombo"> Texto del artículo: <textarea class="textarea" name="cuerpo" id="cuerpoArticulo" placeholder="" maxlength="1100" minlength="700" required></textarea> </label>
                            <label class="textoCombo"> Fuente del artículo: <input type="text" class="controls" name="fuente" id="fuenteArticulo" maxlength="100" required> </label>
                            <input type="submit" class="botonRegistro"  value="Cargar artículo">
                        </form>
                    </section>                  
                </article>
    
                <table id="dataTable">
                    <thead>
                        <tr>
                            <th> Fecha</th>
                            <th> Titulo</th>
                            <th> Accion 1 </th>
                            <th> Accion 2</th>
                        </tr>
                    </thead>
                    <tbody>    
                        <?php
                            $articulos = $mysqli->query("SELECT * FROM ArtPerroGato");

                            if ($articulos->num_rows > 0) {
                                echo '<h3> Artículos Disponibles </h3>';
                                while($resultado2 = $articulos->fetch_object()){
                                    echo '<tr>';
                                    echo '<td>'.$resultado2->fecha.' </td>';
                                    echo '<td>'.$resultado2->titulo.' </td>';
                                    echo '<td> <a class="ver" href="/admin/verArticulo.php/?id='.$resultado2->id.'"> Ver artículo </a> </td>';
                                    echo '<td> <a class="eliminar" href="/admin/eliminarArticulo.php/?id='.$resultado2->id.'"> Eliminar artículo </a> </td>';
                                } 
                            }else{
                                echo '<h3> Sin artículos </h3>';
                                echo '<p> No hay artículos todavía </p>';
                            }
                        ?>
                    </tbody>
                </table>                
            </div>

            <div id="contenedor3" class="container-contenido">
                <article>
                    <h2 class="tituloRegistro"> Cargar nuevo adoptado </h2>
                    <p class="tituloRegistro"> Para cargar un nuevo adoptado en la página principal del sitio, completa el siguiente formulario. </p> <br>
                    <section class="formulario-registro">
                        <form method="post" action="/admin/agregarAdoptado.php" enctype="multipart/form-data">
                            <label class="textoCombo"> Imagen: <input type="file" class="controls" name="imagen" id="imagenAdoptado" required> </label>
                            <label class="textoCombo"> Texto del artículo: <textarea class="textarea" name="cuerpo" id="cuerpoAdoptado" placeholder="" maxlength="315" minlength="200" required></textarea> </label>
                            <input type="submit" class="botonRegistro"  value="Cargar adoptado">
                        </form>
                    </section>
                </article>
                <table id="dataTable">
                    <thead>
                        <tr>
                            <th> Fecha</th>
                            <th> Imagen</th>
                            <th> Accion 1 </th>
                            <th> Accion 2 </th>
                        </tr>
                    </thead>
                    <tbody>    
                        <?php
                            $adoptantes  = $mysqli->query("SELECT * FROM AdoptantesHistorias");

                            if ($adoptantes->num_rows > 0) {
                                echo '<h3> Historias Disponibles </h3>';
                                while($resultado3 = $adoptantes->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>'.$resultado3['fecha'].' </td>';
                                    echo '<td><img width="100px" src="data:image/jpg;base64,'.base64_encode($resultado3['imagen']).'"></td>';
                                    echo '<td>'.$resultado3['cuerpo'].' </td>';
                                    echo '<td><a class="eliminar" href="/admin/eliminarAdoptado.php/?id='.$resultado3['id'].'"> Eliminar historia </a></td>';
                                    echo '<tr>';
                                } 
                            }else{
                                echo '<h3> Sin adoptantes </h3>';
                                echo '<p> No hay adoptantes todavía </p>';
                            }
                        ?>
                    </tbody>
                </table>      
            </div>
        </main>
        <?php
            mysqli_close($mysqli);

            if (isset($_GET["bloque"]) == true) {
                $bloque = $_GET["bloque"];

                switch ($bloque) {
                    case '1':
                    echo '<script> menu1.value = "1"; </script>';
                    echo '<script> cambioselect(); </script>';
                    break;
                    case '2':
                    echo '<script> menu1.value = "2"; </script>';
                    echo '<script> cambioselect(); </script>';
                    break;
                    case '3':
                    echo '<script> menu1.value = "3"; </script>';
                    echo '<script> cambioselect(); </script>';
                    break;
                }
            }
        ?>
        <script>
            const menu1 = document.getElementById ("selectMenu");
            menu1.addEventListener ("change", cambioselect);

            const div1 = document.getElementById ("contenedor1");
            const div2 = document.getElementById ("contenedor2");
            const div3 = document.getElementById ("contenedor3");

            div1.style.display = 'none';
            div2.style.display = 'none';
            div3.style.display = 'none';

            function cambioselect () {
                div1.style.display = 'none';
                div2.style.display = 'none';
                div3.style.display = 'none';

                switch (menu1.value) {
                    case "1":
                    div1.style.display = 'block';
                    break
                    case "2":
                    div2.style.display = 'block';
                    break
                    case "3":
                    div3.style.display = 'block';
                    break
                }
            }

        </script>
    </body>
</html>
