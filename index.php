<?php
include './admin/configDb.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"  href="styles.css" type="text/css">
        <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
        <link rel="shortcut icon" href="img/favicon-huellitas.jpg" type="image/x-icon">
        <script src="https://kit.fontawesome.com/f05358028e.js" crossorigin="anonymous"></script>
        <title>Huellitas en rescate</title>
    </head>
    <body>
        <header>
            <div class="logo">
                <img src="img/huellitas.png" alt="logoHuellitas" class="logo-imagen">
                <h2 class="logo-nombre">Huellitas en rescate</h2>
            </div>

            <nav>
                <a href="adopta.html" class="nav-link">Adopta!</a>
                <a href="donaciones.html" class="nav-link">Donaciones</a>
                <a href="transito.html" class="nav-link">Transito</a>
                <a href="voluntariados.html" class="nav-link">Voluntariados</a>
            </nav>

        </header>
        
        <div class="container-contenido">
            <article>
                <div>
                    <h1>Sobre nosotros</h1>
                    <img src="img/cuidadosPeludos.jpeg" alt="cuidados">
                    <p>Proyecto 4 Patas (P4P) es una organización sin fines de lucro liderada por un grupo de voluntarios que buscan superar la situación de sobrepoblación, abandono, crueldad e indiferencia que viven millones de animales en nuestro país. (Buenos Aires/ Argentina). Propiciamos una actitud de respeto hacia todas las especies, entendiendo que no son “cosas” para ser utilizadas por el ser humano. Rechazamos todo tipo de explotación animal, 
                        incluyendo su uso como vestimenta, comida, entretenimiento y experimentación.
                    </p>
                </div>
                <div>
                    <h1>Como trabajamos</h1>
                    <img src="img/michis.jpeg" alt="michitos" class="michis">      
                    <p>
                        La acción directa: asistir a animales abandonados en situación de riesgo, promoviendo su adopción y tenencia por parte de hogares responsables que estén en condiciones de brindarles albergue, atención y afecto.<br>
                        La acción preventiva: fomentar entre el público general la necesidad y la importancia de castrar machos y esterilizar las hembras antes del primer celo y exigiendo a las autoridades la aplicación de las leyes que los obligan a realizar campañas de castración masivas, gratuitas, extendidas, sistemáticas y permanentes, como único medio humanitario, sustentable y no eutanásico de control de la superpoblación animal.<br>
                        Las acciones en el plano legislativo y judicial: exigir la aplicación de la ley 14.346 de protección animal y denunciar ante las autoridades todo acto de maltrato y crueldad.
                    </p>
                </div>
                <div class="seccionNoticias">
                    
                    <?php

                        $noticias = $mysqli->query("SELECT * FROM noticias ORDER BY fecha DESC LIMIT 1");

                        if ($noticias->num_rows > 0) {
                            $resultadoNoticia = $noticias->fetch_object();
                            echo '<h1>'.$resultadoNoticia->titulo.'</h1>';
                            echo '<img src="img/visitas.jpeg" alt="visitas" class="visita">';
                            echo '<p>'.$resultadoNoticia->cuerpo.'</p>';
                        }else{
                            echo '<h1>19 de agosto Día internacional del animal sin hogar</h1>
                            <img src="img/visitas.jpeg" alt="visitas" class="visita">
                            <p> Existe una tendencia, casi natural pero muy propia nuestra, de entender la realidad de manera subjetiva y apriorística, prejuzgando las situaciones y, por ende, describiéndolas erróneamente, lo que lleva a adoptar soluciones equivocadas.
                            Si bien es absolutamente cierto que el abandono tanto de perros como de gatos y la falta de conciencia acerca de la importancia de la castración provocan la existencia de muchos animales literalmente abandonados en la calle, la situación no es estrictamente así.
                            En nuestro país, el perro y el gato en situación de calle (lo cual no es lo mismo que vivir siempre en la calle) tienen una realidad que, si no se investiga a fondo, puede parecer lo que no es. ¿Hay abandono de animales en Argentina? Claro que sí, pero el abandono total, liso y llano, 
                            no es de la magnitud con la que se describe, lo que hace que los verdaderos responsables de la situación que vemos y sufrimos no se sientan aludidos. Y si no veo el problema, soy parte de él. </p>';
                        }
                    ?>
                    
                </div>
                <div class="seccionArt">

                    <?php

                        $articulos = $mysqli->query("SELECT * FROM ArtPerroGato ORDER BY fecha DESC LIMIT 1");

                        if ($articulos->num_rows > 0) {
                            $resultadoArt = $articulos->fetch_object();
                            echo '<h1>'.$resultadoArt->titulo.'</h1>';
                            echo '<img src="img/gatoPerro.jpg" alt="imagenArticulo" class="artPerroGato">';
                            echo '<p>'.$resultadoArt->cuerpo.'</p>';
                        }else{
                            echo '<h1> Un nuevo integrante en la familia</h1>
                                <img src="img/gatoPerro.jpg" alt="imagenArticulo" class="artPerroGato">
                                <p>Ocurre cada vez más: las familias ya no son solo de humanos; hoy ya es un denominador común la familia multi-especie. Este universo de afecto mutuo no solo tiene beneficios para los animales de compañía, sino también para los humanos. Mascotear es un festival que se inspira con el objetivo de ser tanto un espacio integral y un evento de ocio para las familias junto a los animales. Ahora bien ¿cuáles son los beneficios de tener una mascota? “Los beneficios de tener mascotas son muchos, pueden disminuir la sensación de soledad, estimular el contacto físico, como también, la comunicación. De hecho, se ha comprobado que durante la pandemia fue un gran soporte y compañía para muchas personas”, dice Juan Atilio Di Paolo, veterinario.
                                “También, ayudan a reducir el estrés. varios estudios han demostrado que la interacción con animales disminuye los niveles de cortisol (una hormona relacionada con el estrés) y disminuye la presión arterial, ya que al sacar a pasear a tu perro varias veces al día, realizas actividad física y estás en movimiento”, agregó el experto.</p>';
                        }
                    ?>
                    
                </div>
                
            </article>
        
            <aside>


                <?php
                    $adoptantes  = $mysqli->query("SELECT * FROM AdoptantesHistorias ORDER BY fecha DESC LIMIT 3");
                    
                    if ($adoptantes->num_rows > 2) {
                        while($resultado3 = $adoptantes->fetch_assoc() ) {
                            echo '<div class="container-aside">';
                            echo '<img width="100px" alt="imagenAdoptante" src="data:image/jpg;base64,'.base64_encode($resultado3['imagen']).'">';
                            echo '<p>'.$resultado3['cuerpo'].' </p>';
                            echo '</div> ';
                        } 
                    }else{
                        echo '  <div class="container-aside">
                                    <img src="img/adopcion2.jpeg" alt="MiriamyRoko">
                                    <p>Roko está súper bien, muy contento, aprendió millones de cosas. Es muy dulce, compañero, estamos felices. La foto con el cono fue post-castración la semana pasada. La verdad que se lo bancó bárbaro, durmió mucho y el veterinario dijo que esta impecable de salud, asi que todo super bien. Besos a todos por allá!!” </p>
                                </div>   
                                <div class="container-aside">
                                    <img src="img/adopcion1.jpeg" alt="MiriamyRoko">
                                    <p>Quería contarles que Dharma y Acuarela están muy bien. Están al día con las vacunas y ayer fue su primer paseo. Realmente nos vinieron a alegrar la vida, son adorables y muy traviesas… ja ja… se potencian entre hermanas.</p>
                                </div> 
                                <div class="container-aside">
                                    <img src="img/adopcion3.jpeg" alt="MiriamyRoko">
                                    <p>Toronto vive muy feliz con su nueva familia. Le encanta salir a la plaza y socializar con otros animalitos. También usar su rascador y todos los chiches que tiene. Es el mimado de la casa y estamos muy muy muy felices de haberlo adoptado. Se adaptó muy rápidamente a su nuevo hogar cuando llegó</p>
                                </div> ';
                    }
                ?>
           </aside>
        </div>

        <!--Footer-->
        <footer>
            <div class="container_footer">
                <div class="box_footer">
                    <div class="logo">
                        <img src="img/huellitas.png" alt="huellitasFooter">         
                    </div>
                    <div class="terms">
                        <p>
                            <b>Por que sacar una huellita de la calle...</b>
                        </p>
                        <p>
                            <b>Es llevar una huellita de por vida.</b>
                        </p>
                    </div>
                </div>
                <div class="box_footer">
                    <h2>Encontranos en nuestras redes sociales!</h2>
                    <a href="#"> <i class="fab fa-facebook-square"></i> Facebook</a>
                    <a href="#"><i class="fab fa-twitter-square"></i> Twitter</a>
                    <a href="#"><i class="fab fa-instagram-square"></i> Instagram</a>
                </div>
        
                <div class="box_footer">
                    <h2>Nuestra web!</h2>
                    <a href="adopta.html" class="nav-link">Adopta!</a>
                    <a href="donaciones.html" class="nav-link">Donaciones</a>
                    <a href="transito.html" class="nav-link">Transito</a>
                    <a href="voluntariados.html" class="nav-link">Voluntariados</a>
                </div>
            </div>
        
            <div class="box__copyright">
                <hr>
                <p>Todos los derechos reservados © 2023 <b>Huellitas en Rescate</b></p>
            </div>
        </footer> 
    </body>
</html>