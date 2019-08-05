
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
        <!-- ¡Esto debe ir antes que ningún otro stylesheet!!! -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <!-- Fin de lo que debe ir antes que ningún otro stylesheet!!! -->
<link rel="stylesheet" href="/css/estilos.css">

<!-- Agregado para popup -->
<style>
/* Popup container - can be anything you want */
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.popup .popuptext {
  visibility: hidden;
  width: 600px;
  background-color: #555;
  color: #fff;
  text-align: left;
  border-radius: 6px;
  padding: 12px 12px;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -100px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
</style>
<!-- fin de agregado para popup -->

    <title>Principal</title>
  </head>
  <body>
  @include('primerabarranav')


<!-- mapa -->
      {{-- <div class="modal fade" role="dialog" id="imgModal">
          <div class="modal-dialog">
              <div class="modal-content"></div>
                <img class="img-responsive" src="/imgs/plano-hadeci.jpg" id="show-img">
              </div>
      </div> --}}
<!-- fin del mapa -->



          <!-- Barra de navegación con menú -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark" >
      <div class="collapse navbar-collapse" >
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/"><b>Inicio</b> <span class="sr-only">(ésta)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <b>Preguntas frecuentes</b>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#que_es">¿Qué es?</a>
              <a class="dropdown-item" href="#quienes_pueden_participar">¿Quiénes pueden participar?</a>
              <a class="dropdown-item" href="#como_participar">¿Cómo participar?</a>
              <a class="dropdown-item" href="#donde_se_realiza">¿Dónde se realiza?</a>
              <a class="dropdown-item" href="#tematicas">Temáticas</a>
              <a class="dropdown-item" href="#equipo_organizador">Equipo organizador</a>
              <div class="dropdown-divider"></div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mailto:desafios.cientificos@bue.edu.ar"><b>Contacto</b></a>
          </li>
          <!-- Módulo de login oculto hasta resolver tema servidor
          <li class="nav-item">
            <a class="nav-link" href="login.php"><b>Login</b></a>
          </li>
           fin módulo de login -->
            <li class="nav-item">
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" style="margin-left:155px" type="search" placeholder="¿Qué buscás?" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>
        </li>
        </ul>
      </div>
    </nav>
    <!-- fin barra de navegación -->


<!-- Jumbotron -->
 <!-- DIV de fin del Jumbotron con la imagen de los chicos-->



 <div class="conimagenoscurecida">
   <h1 class="blanco animated wobble delay-2s"> Hackatón Desafíos Científicos </h1>

</div>

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron-verde.png')">



    <div class="contenedor">
     <div class="card-deck">
       <div class="card"> <!-- primera tarjeta -->
         <img class="card-img-top" src="/imgs/hdc2017-1.jpg" alt="estudiantes en hackatón">
         <div class="card-body">
           <h5 class="card-title"><a name="que_es">¿Qué es?</a></h5>
           <p class="card-text">

             Desafíos Científicos es una propuesta que promueve el abordaje de diversos desafíos regionales, globales y espaciales y la búsqueda de su resolución a lo largo de dos jornadas. <br>
             Los estudiantes trabajan en equipos <b>(5 a 8 integrantes cada uno)</b> para encontrar soluciones a problemas actuales vinculados al enfoque de ciencia y tecnología en sociedad.<br><br>
             Durante la actividad se promueve la imaginación, el trabajo colaborativo y el “espíritu emprendedor”.


             {{-- Desafíos Científicos es una propuesta que promueve el abordaje de diversos desafíos regionales, globales y espaciales y la búsqueda de su resolución a lo largo de dos jornadas de trabajo.
           <br>
             Los estudiantes trabajan en equipos de entre <strong>5 a 8 estudiantes</strong> y eligen una entre <strong><a href="#tematicas">cuatro temáticas</a></strong> posibles a las cuales pertenecen los problemas. Los problemas abordan aspectos del mundo real. --}}


           <br>
           </p>
         </div>
       </div> <!-- fin de primera tarjeta -->

       <div class="card"> <!-- segunda tarjeta -->
         <img class="card-img-top" src="/imgs/hdc2017-2.jpg" alt="estudiantes en hackatón">
         <div class="card-body">
           <h5 class="card-title"><a name="quienes_pueden_participar">¿Quiénes pueden participar?</a></h5>
           <p class="card-text">Desafíos Científicos está destinado a <b>estudiantes de 4º, 5º y 6º año</b> de cualquier institución oficial del sistema educativo de la Ciudad de Buenos Aires.

         Los grupos participantes deben ser acompañados por un adulto cada <b>10 (diez) estudiantes</b>. Los equipos son armados por los organizadores del evento:
         <ul>
<li>en base a las <a href="#tematicas">temáticas</a> elegidas por cada estudiante;</li>
<li>integrando estudiantes de diferentes escuelas.</li></ul>
No se requieren conocimientos previos.

         {{-- Los equipos son armados por un equipo central en base a las <a href="#tematicas">temáticas</a> elegida por cada estudiante para asegurar la heterogeneidad. <br>Los equipos trabajan durante un día y medio para encontrar soluciones a problemas reales vinculados al enfoque de ciencia y tecnología en sociedad. --}}
           <br></p><a name="tematicas">
         </div>
       </div> <!-- fin de segunda tarjeta -->

       <div class="card"> <!-- tercera tarjeta -->
         <img class="card-img-top" src="/imgs/hdc2017-3.jpg" alt="estudiantes en hackatón">
         <div class="card-body">
           <h5 class="card-title"><a name="como_participar">¿Cómo participar?</a></h5>
           <p class="card-text">


             Para participar en <b>Desafíos Científicos</b> se debe realizar la inscripción correspondiente. Cada estudiante debe ser registrado por un docente o directivo de la institución escolar a la que pertenece.
             Los cupos son limitados. Las vacantes serán confirmadas a partir del <b>20/09</b>.
             No es necesario llevar al evento ningún elemento en especial, aunque es más que bienvenido si desean concurrir con sus dispositivos portátiles como smartphones, netbooks o tablets.


             {{-- Para participar en Desafíos Científicos se debe realizar la inscripción correspondiente. Cada estudiante debe registrarse a través de un docente o de otro personal responsable de la institución escolar. Para participar no es necesario llevar ningún elemento en especial aunque está más que bienvenido si desean llevar sus dispositivos portátiles como smartphones, netbooks o tablets. --}}



           </p>
         </div>
       </div> <!-- fin de tercera tarjeta -->

     </div> <!-- cierre del mazo de cartas -->
     <br>
     <!--- Segunda fila de cards -->
     <div class="card-deck"> <!-- inicio del segundo juego de tarjetas -->
       <div class="card"> <!-- primera tarjeta -->
         <img class="card-img-top" src="/imgs/hdc2017-4.jpg" alt="estudiantes en hackatón">
         <div class="card-body">
           <h5 class="card-title"><a name="donde_se_realiza">¿Cuándo y dónde se realiza?</a></h5>
           <p class="card-text">


             <span h6>Edición 2019:</span h6> <b>martes 1 y miércoles 2 de octubre (8:30 a 17:00)</b>.
             El evento se lleva a cabo en <a href="https://www.google.com.ar/maps/place/La+Usina+del+Arte/@-34.6285277,-58.3591658,17z/data=!3m1!4b1!4m5!3m4!1s0x95a334c73fe3e107:0xeae5d0a098ae5c1!8m2!3d-34.6285321!4d-58.3569718" target="_blank">La Usina del Arte, Agustín R. Caffarena 1, barrio de La Boca</a>, con la presencia de cerca de <b>600 estudiantes</b> de diferentes escuelas y <b>100 docentes</b> acompañantes que participan en actividades específicas, formativas e informativas.


{{-- El evento se lleva a cabo en <a href="https://www.google.com.ar/maps/place/La+Usina+del+Arte/@-34.6285277,-58.3591658,17z/data=!3m1!4b1!4m5!3m4!1s0x95a334c73fe3e107:0xeae5d0a098ae5c1!8m2!3d-34.6285321!4d-58.3569718" target="_blank">La Usina del Arte, Agustín R. Caffarena 1, barrio de La Boca</a>, con la presencia de cerca de <b>600 estudiantes</b> de diferentes escuelas y <b>100 docentes</b> acompañantes que participan en actividades específicas, formativas e informativas. --}}

             {{-- El evento se llevará a cabo en <a href="https://www.google.com.ar/maps/place/La+Usina+del+Arte/@-34.6285277,-58.3591658,17z/data=!3m1!4b1!4m5!3m4!1s0x95a334c73fe3e107:0xeae5d0a098ae5c1!8m2!3d-34.6285321!4d-58.3569718" target="_blank">La Usina del Arte, Agustín R. Caffarena 1, barrio de La Boca</a>, donde más de 600 estudiantes se repartirán en equipos conformados por representantes de escuelas diferentes. Durante la actividad se promoverá la imaginación, el trabajo colaborativo y el espíritu emprendedor. Los docentes acompañantes participarán de actividades específicas, formativas e informativas. --}}


           </p>
         </div>
       </div> <!-- fin de primera tarjeta -->

       <div class="card"> <!-- segunda tarjeta -->
         <img class="card-img-top" src="/imgs/hdc2017-5.jpg" alt="estudiantes en hackatón">
         <div class="card-body">
           <h5 class="card-title">Temáticas</h5>
           <p class="card-text">Las cuatro temáticas que aborda el hackatón:
             <ul>
  <li>
    <div class="popup" onclick="myFunction1()">
        <a href="#" onclick="return false;">Ciencias Espaciales</a>
          <span class="popuptext" id="myPopup1">Modo de utilización de satélties artificiales para resolver problemas globales y regionales de nuestro planeta y proveer de información para mejorar las condiciones de vida de los que lo habitamos, humanos y las demás especies. <br>Conocer la dinámica de la atmósfera, los mares y de la vida en la tierra, proveer de información en tiempo real sobre el clima a través de imágenes, el diseño de naves espaciales y habitáculos para alcanzar y habitar otros planetas y la exploración del espacio, la detección de planetas capaces de albergar vida, y el relevamiento de recursos mineros en asteroides.
          </span>
    </div>
  </li>
  <li>
    <div class="popup" onclick="myFunction2()">
        <a href="#" onclick="return false;">Gestión Territorial y Urbana</a>
          <span class="popuptext" id="myPopup2">Habitar el planeta, convivir entre seres humanos y con las demás especies contemplando el cuidado del ambiente para las futuras generaciones brinda un panorama global, regional y local para una infinidad de desafíos. <br>Diseñar sistemas para el tránsito, los recorridos arqueológicos, la distribución de recursos naturales, el uso y distribución de tales recursos, el monitoreo de las distintas actividades de los seres vivos en el terreno, la distribución de especies, los distintos modos de intervención para el desarrollo sostenible, las mejoras en la vivienda, los transportes y los servicios públicos. Todos ellos son desafíos que apuntan a mejorar la calidad de vida de las personas echando mano a soluciones científicas y tecnológicas que contemplen la equidad y la sustentabilidad desde su diseño inicial.

          </span>
    </div>
  </li>
  <li>
    <div class="popup" onclick="myFunction3()">
        <a href="#" onclick="return false;">Ciencias de la Vida</a>
          <span class="popuptext" id="myPopup3">Proponer soluciones tecnológicas con fines de diagnóstico temprano y terapéuticas, con el uso de la radiación para proveer imágenes, nanomáquinas para la intervención a nivel celular, nuevos materiales para las prótesis, implantes, tejidos y órganos sintéticos, cirujía remota, inteligencia artificial en áreas de salud, dispositivos tecnológicos para personas con capacidades especiales. <br>Nuevos métodos de detección y clasificación de agentes patógenos. Propuestas de desarrollo de productos para producción de alimentos, prevención de epidemias y soluciones masivas para el sistema de salud incluyendo el diseño de campañas de difusión.
          </span>
    </div>
  </li>
  <li>
    <div class="popup" onclick="myFunction4()">
        <a href="#" onclick="return false;">Ciencia y Arte</a>
          <span class="popuptext" id="myPopup4">Dos formas de entrar en contacto con el mundo que nos rodea se combinan para alimentarse mutuamente. Los desafíos abarcan el diseño de parques temáticos científicos con un fuerte componente de actividades artísticas y apreciación estética, campañas de difusión y divulgación a través de expresiones artísticas como obras de teatro, videos, spots publicitarios, instalaciones participativas, juegos y zonas de actividades físicas. <br>Diseño de obras de arte sobre la base de principios de las diferentes ciencias naturales: esculturas sonoras, bioarte, música y genética, etc. El cruce del mundo del arte con el de las ciencias y la tecnología es una invitación a la creatividad de un territorio por explorar.
          </span>
    </div>
  </li>

             </ul>
            Los trabajos son evaluados por un jurado y los ganadores de cada temática ingresan al <a href="https://drive.google.com/file/d/1t2H_FGB7sZwphauQxaSY4lH1iHU75Ud1/view?usp=sharing" target="_blank">Programa Desafíos Científicos</a>, que involucra actividades en centros de ciencia, tecnología y arte de vanguardia en el país.</p>
         </div>
       </div> <!-- fin de segunda tarjeta -->


       <div class="card"> <!-- tercera tarjeta -->
         <img class="card-img-top" src="/imgs/hdc2017-6.jpg" alt="estudiantes en hackatón">
         <div class="card-body">
           <h5 class="card-title"><a name="equipo_organizador">Equipo organizador</a></h5>
           <p class="card-text">El hackatón Desafíos Científicos está organizador por el <a href="http://www.buenosaires.gob.ar/educacion/escuelas/planeamiento-educativo/enlace-ciencias" target="_blank">Programa Enlace Ciencias</a>, una iniciativa para la mejora de la enseñanza de las ciencias y la tecnología. Enlace Ciencias es impulsado por la <a href="http://www.buenosaires.gob.ar/educacion/institucional-subsecretaria-de-planeamiento-e-innovacion-educativa/dg-planeamiento-educativo" target="_blank">Dirección General de Planeamiento Educativo</a> del Ministerio de Educación e Innovación del Gobierno de la Ciudad Autónoma de Buenos Aires.</p>
         </div>
       </div> <!-- fin de tercera tarjeta -->

     </div> <!-- fin del segundo juego de tarjetas -->


   <!-- Recursos -->
   <br>
  <div class="alert alert-info ml-auto">

  <a href="/docs/Manual_Hackaton_web_final_22ago18.pdf" target="_blank"><img src="/imgs/compose_64px.png" style="height:40px; width:40px" alt=""></a> <span class="alert ">
      Manual de hackatón educativo <small>(clic en el ícono para descargarlo en PDF)</small>
</span><br>
<a href="https://drive.google.com/file/d/1t2H_FGB7sZwphauQxaSY4lH1iHU75Ud1/view?usp=sharing" target="_blank"><img src="/imgs/compose_64px.png" style="height:40px; width:40px" alt=""></a> <span class="alert ">
    Documento Programa Desafíos Científicos <small>(clic en el ícono para descargarlo en PDF)</small>


  </div>


<!-- Footer de la página (tunearlo más adelante)-->

<!-- Script para el popup-->
<script>
// When the user clicks on div, open the popup
function myFunction1() {
  var popup = document.getElementById("myPopup1");
  popup.classList.toggle("show");
}
function myFunction2() {
  var popup = document.getElementById("myPopup2");
  popup.classList.toggle("show");
}
function myFunction3() {
  var popup = document.getElementById("myPopup3");
  popup.classList.toggle("show");
}
function myFunction4() {
  var popup = document.getElementById("myPopup4");
  popup.classList.toggle("show");
}
</script>
<!-- Fin del script para el popup-->

</div>
      </div><!-- fin del jumbotron secundario -->



      @include('segundabarranav')

          <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




    </body>
</html>
