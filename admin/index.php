<?php
include './configDb.php';
?>

<!doctype html>
<html lang="es-ar">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet"  href="../styles.css" type="text/css">
      <link rel="shortcut icon" href="../img/favicon-huellitas.jpg" type="image/x-icon">
      <title> ADMIN - Huellitas en rescate </title>
  <style>
  </style>
  </head>
  <body>
      <nav>
      </nav>
    <main>
      <div class="container-contenido" id="contenedor1">
        <article>
          <h2 class="tituloRegistro">Bienvenido Admin.</h2>
          <h3 class="tituloRegistro">Tenga en cuenta que todas las modificaciones que se realicen serán permanentes. 
            A la derecha de la pantalla podrá visualizar la sección que se modificara.</h3>
          <section class="formulario-registro">
            <h2 class="tituloRegistro">Inicia sesion!</h2> 
            <form method="post" action="sesion.php">
              <label class="textoCombo"> Usuario:<br><input type="text" class="controls" name="usuario" id="usuarioRegistro" min="1" max="99999999" required> </label>
              <label class="textoCombo"> Contraseña:<br><input type="password" class="controls" name="contraseña" id="contraseñaRegistro" autocomplete="off" required > </label>
              <input type="submit" class="botonRegistro"  value="Enviar formulario">
            </form>
            <p> Si desea reestablecer la contraseña, pulse en el siguiente enlace: <a href="javascript:cambiarContraseña()"> Reestablecer contraseña </a></p>
            
          </section>
        </article>
      </div>

      <div class="container-contenido" id="contenedor2">
        <section class="formulario-registro">
          <form method="post" action="registro.php">
            <h1 class="tituloRegistro"> Completar datos de administrador </h1>
            <p class="tituloRegistro"> como es el primer inicio de sesión, se deberán completar los datos de inicio de sesión del administrador, así como también los datos para recuperar el acceso en caso de olvido. </p>
            <br>
            <label class="textoCombo"> Introduzca el nombre de usuario para el administrador: <br><input class="controls" type="text" name="Nombre" required size="30"> </label>
            <label class="textoCombo"> Introduzca la contraseña que desea tener para iniciar sesión:<br><input class="controls" type="password" name="Contraseña" required size="15" autocomplete="off"> </label>
            <label class="textoCombo"> Seleccione una pregunta de seguridad:<br> 
              <select name="preguntaSeguridad">
                <option value="mascota"> Cuál es el nombre de tu mascota favorita? </option>
              </select> 
            </label>
            <label class="textoCombo"> Introduzca su respuesta de seguridad:<br><input class="controls" type="text" name="respuestaSeguridad" required size="25"> </label>
            <input class="botonRegistro" type="submit" value="Enviar">
          </form>
        </setion>
      </div>

      <div class="container-contenido" id="contenedor3">
        <section class="formulario-registro">
          <form method="post" action="cambiarContraseña.php">
            <h2 class="tituloRegistro"> Cambiar contraseña del administrador </h1>
            <p class="tituloRegistro"> Para cambiar la contraseña, complete el siguiente formulario </p>
            <label class="textoCombo"> Introduzca la nueva contraseña del administrador: 
            <input class="controls" type="password" name="Contraseña1" required size="15" autocomplete="off"> </label>
            <label class="textoCombo"> Introduzca la contraseña nuevamente:
            <input class="controls" type="password" name="Contraseña2" required size="15" autocomplete="off"> </label>
            <label class="textoCombo"> Seleccione su pregunta de seguridad: 
              <select name="preguntaSeguridad">
                <option value="mascota"> Cuál es el nombre de tu mascota favorita? </option>
                <option value="color"> Cuál es su color favorito? </option>
                <option value="fecha"> Cuándo es su cumpleaños? </option>
              </select> 
            </label>
            <label class="textoCombo"> Introduzca su respuesta de seguridad:<br><input class="controls" type="password" name="respuestaSeguridad" required size="25"> </label>
            <input class="botonRegistro" type="submit" value="Cambiar contraseña">
          </form>
        </section>
      </div>

    </main>

    <script>
    const div1 = document.getElementById ("contenedor1");
    const div2 = document.getElementById ("contenedor2");
    const div3 = document.getElementById ("contenedor3");

    div1.style.display = 'none';
    div2.style.display = 'none';
    div3.style.display = 'none';

    function cambiarContraseña () {
    div1.style.display = 'none';
    div3.style.display = 'block';
    }
    </script>

    <?php

    $registro = $mysqli->query("SELECT * FROM usuarios;");
    $resultado = $registro->fetch_object();

    if (isset($resultado->nombreDeUsuario) == true) {
    echo "<script> div1.style.display = 'block'; </script";
    }
    else {
    echo "<script> div2.style.display = 'block'; </script";
    }

        mysqli_close($mysqli);
    ?>

  </body>
</html>
