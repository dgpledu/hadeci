
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

        <!-- Barra de navegación con menú Inicio / PF / Contacto -->
          <div class="container-fluid bg-dark">
            <div class="row mt-0 pt-1 pb-1 ">
                <a class="nav-link text-secondary non-underline-link" href="/">Inicio</a>
                <a class="nav-link text-secondary" href="#PMF">Preguntas frecuentes</a>
                <a class="nav-link text-secondary" href="mailto:desafios.cientificos@bue.edu.ar">Contacto</a>
            </div>
          </div>
          </div>
        <!-- fin barra de navegación Inicio / PF / Contacto-->

<!-- Imagen oscurecida con título -->
 <div class="conimagenoscurecida">
   <h1 class="blanco animated wobble delay-2s"> Hackatón Desafíos Científicos </h1>
 </div>
<!-- Fin magen oscurecida con título -->

<!-- Jumbotron que contiene todo -->
 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron-verde.png')">

<!-- Contenedor seis tarjetas -->
    <div class="contenedor container-fluid">
     <div class="card-deck"> <!-- Primer fila de tarjetas -->
       <div class="card"> <!-- primera tarjeta -->
         <img class="card-img-top" src="/imgs/hdc2017-1.jpg" alt="estudiantes en hackatón">
         <div class="card-body">
           <h5 class="card-title"><a name="que_es">¿Qué es?</a></h5>
           <p class="card-text">
             Desafíos Científicos es una propuesta que promueve el abordaje de diversos desafíos regionales, globales y espaciales y la búsqueda de su resolución a lo largo de dos jornadas. <br>
             <br>Los estudiantes trabajan en equipos <b>(5 a 8 integrantes cada uno)</b> para encontrar soluciones a problemas actuales vinculados al enfoque de ciencia y tecnología en sociedad.<br><br>
             Durante la actividad se promueve la imaginación, el trabajo colaborativo y el “espíritu emprendedor”.
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

           <br></p><a name="tematicas">
         </div>
       </div> <!-- fin de segunda tarjeta -->

       <div class="card"> <!-- tercera tarjeta -->
         <img class="card-img-top" src="/imgs/hdc2017-3.jpg" alt="estudiantes en hackatón">
         <div class="card-body">
           <h5 class="card-title"><a name="como_participar">¿Cómo participar?</a></h5>
           <p class="card-text">

             Para participar en Desafíos Científicos se debe realizar la inscripción correspondiente. <b>Cada estudiante debe ser registrado por un docente o directivo</b> de la institución escolar a la que pertenece.
             Los cupos son limitados. <br>
             <br>No es necesario llevar al evento ningún elemento en especial, aunque es más que bienvenido si desean concurrir con sus dispositivos portátiles como smartphones, netbooks o tablets.
           </p>
         </div>
       </div> <!-- fin de tercera tarjeta -->
     </div> <!-- cierre primer fila de tarjetas ("deck") -->
     <br>
     <!--- Segunda fila de tarjetas -->
     <div class="card-deck"> <!-- inicio segunda fila de tarjetas -->
       <div class="card"> <!-- primera tarjeta -->
         <img class="card-img-top" src="/imgs/hdc2017-4.jpg" alt="estudiantes en hackatón">
         <div class="card-body">
           <h5 class="card-title"><a name="donde_se_realiza">¿Cuándo y dónde se realiza?</a></h5>
           <p class="card-text">
             <span h6>Edición 2019:</span h6> Se realizará el <b>8 y 9 de octubre en el Palais Rouge</b> (Jerónimo Salguero 1441, CABA).
             <br><br>El evento contará con la presencia de cerca de <b>600 estudiantes</b> de diferentes escuelas y <b>100 docentes</b> acompañantes que participan en actividades específicas, formativas e informativas.
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
           <p class="card-text">El hackatón Desafíos Científicos está organizado por el <a href="http://www.buenosaires.gob.ar/educacion/escuelas/planeamiento-educativo/enlace-ciencias" target="_blank">Programa Enlace Ciencias</a>, una iniciativa para la mejora de la enseñanza de las ciencias y la tecnología. <br><br>Enlace Ciencias es impulsado por la <a href="http://www.buenosaires.gob.ar/educacion/institucional-subsecretaria-de-planeamiento-e-innovacion-educativa/dg-planeamiento-educativo" target="_blank">Dirección General de Planeamiento Educativo</a> del Ministerio de Educación e Innovación del Gobierno de la Ciudad Autónoma de Buenos Aires.</p>
         </div>
       </div> <!-- fin de tercera tarjeta -->
    </div> <!-- Fin de segunda fila de tarjetas -->
  </div> <!-- Cierre contenedor de seis tarjetas -->
    <br>

<!-- Preguntas frecuentes y recursos --><div class="container">
<!-- Encabezado de las preguntas -->
<div class="card">
  <h4 class="card-header" style="background-color:#f2d333"><a name="PMF">Preguntas más frecuentes</a>
  </h4>
</div>
<!-- Fin encabezado -->
<!-- Inicio acordeón de preguntas -->
<div class="accordion" id="accordionExample">
<!-- Nueva pregunta -->
<div class="card">
  <div class="card-header" id="primeraPregunta">
    <h2 class="mb-0">
      <a href="" style="font-size: 0.5em" class="btn-link" type="text"  data-toggle="collapse" data-target="#preguntaUno" aria-expanded="false" aria-controls="collapseTwo">
          ¿Qué escuelas pueden participar?
        </a>
      </h2>
    </div>
    <div id="preguntaUno" class="collapse" aria-labelledby="primeraPregunta" data-parent="#accordionExample">
      <div class="card-body">
        Todas las escuelas de gestión estatal o privada de la Ciudad Autónoma de Buenos Aires.
      </div>
    </div>
  </div>
  <!-- fin de la pregunta -->
  <!-- Nueva pregunta -->
  <div class="card">
    <div class="card-header" id="segundaPregunta">
      <h2 class="mb-0">
        <a href="" style="font-size: 0.5em" class="btn-link" type="text" data-toggle="collapse" data-target="#preguntaDos" aria-expanded="true" aria-controls="collapseOne">
          ¿Quiénes pueden participar en el evento?
        </a>
      </h2>
    </div>
    <div id="preguntaDos" class="collapse" aria-labelledby="segundaPregunta" data-parent="#accordionExample">
      <div class="card-body">
        Estudiantes de 4°, 5° y 6° año del secundario. Los grupos de estudiante participantes debe ser acompañados por un adulto cada 10 (diez) estudiantes.
      </div>
    </div>
  </div>
  <!-- fin de la pregunta -->
  <!-- Nueva pregunta -->
  <div class="card">
    <div class="card-header" id="terceraPregunta">
      <h2 class="mb-0">
        <a href="" style="font-size: 0.5em" class="btn-link" type="text" data-toggle="collapse" data-target="#preguntaTres" aria-expanded="false" aria-controls="collapseThree">
          ¿Cómo puedo hacer para inscribirme?
        </a>
      </h2>
    </div>
    <div id="preguntaTres" class="collapse" aria-labelledby="terceraPregunta" data-parent="#accordionExample">
      <div class="card-body">
        Todas las personas asistentes al evento deben completar su registro.<br>
        Cada estudiante debe ser registrado por un docente o directivo de la institución escolar a la que pertenece. <br>Los cupos son limitados. <br>
        Los docentes deben primero inscribirse como tales, para poder luego inscribir estudiantes. <br>En el caso de que los estudiantes sean registrados por personal de la escuela que no se desempeña como docente, igualmente debe inscribirse antes como “docente” (aunque no tenga estudiantes a cargo en este evento).
      </div>
    </div>
  </div>
  <!-- fin de nueva pregunta -->

  <!-- Nueva pregunta -->
  <div class="card">
    <div class="card-header" id="cuartaPregunta">
      <h2 class="mb-0">
        {{-- <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#preguntaCuatro" aria-expanded="false" aria-controls="collapseThree">
          ¿Puede un/a mismo/a docente inscribir estudiantes de diferentes escuelas?
        </button> --}}
        <a href="" style="font-size: 0.5em" class="btn-link" type="text" data-toggle="collapse" data-target="#preguntaCuatro" aria-expanded="false" aria-controls="collapseThree" role="button">
          ¿Puede un/a mismo/a docente inscribir estudiantes de diferentes escuelas?
        </a>
      </h2>
    </div>
    <div id="preguntaCuatro" class="collapse" aria-labelledby="cuartaPregunta" data-parent="#accordionExample">
      <div class="card-body">
      Sí. En caso de que el/la docente necesite registrar estudiantes de diferentes escuelas, deberá volver a inscribirse como docente asociado/a a cada una de esas escuelas (antes de inscribir a los estudiantes).
      </div>
    </div>
  </div>
  <!-- fin de nueva pregunta -->

  <!-- Nueva pregunta -->
  <div class="card">
    <div class="card-header" id="quintaPregunta">
      <h2 class="mb-0">
        <a href="" style="font-size: 0.5em" class="btn-link" type="text"  data-toggle="collapse" data-target="#preguntaCinco" aria-expanded="false" aria-controls="collapseThree">
          ¿Cómo sé si estoy inscripto/a?
        </a>
      </h2>
    </div>
    <div id="preguntaCinco" class="collapse" aria-labelledby="quintaPregunta" data-parent="#accordionExample">
      <div class="card-body">
      Una vez que el/la docente o directivo/a haya completado el formulario de inscripción de cada estudiante, recibirá automáticamente una confirmación de correcto registro en el correo electrónico que haya indicado.
      </div>
    </div>
  </div>
  <!-- fin de nueva pregunta -->

  <!-- Nueva pregunta -->
  <div class="card">
    <div class="card-header" id="sextaPregunta">
      <h2 class="mb-0">
        <a href="" style="font-size: 0.5em" class="btn-link" type="text" data-toggle="collapse" data-target="#preguntaSeis" aria-expanded="false" aria-controls="collapseThree">
          ¿Cómo me entero sobre la temática y el equipo asignados a cada estudiante?
        </a>
      </h2>
    </div>
    <div id="preguntaSeis" class="collapse" aria-labelledby="sextaPregunta" data-parent="#accordionExample">
      <div class="card-body">
      Unos días antes del evento, se enviará un mensaje confirmando la asignación de vacantes de estudiantes, y con la temática y equipo al que haya sido asignado/a cada alumno/a. Los equipos de trabajo estarán integrados por estudiantes de diferentes escuelas.
      </div>
    </div>
  </div>
  <!-- fin de nueva pregunta -->

  <!-- Nueva pregunta -->
  <div class="card">
    <div class="card-header" id="septimaPregunta">
      <h2 class="mb-0">
        <a href="" style="font-size: 0.5em" class="btn-link" type="text"  data-toggle="collapse" data-target="#preguntaSiete" aria-expanded="false" aria-controls="collapseThree">
          ¿Los estudiantes pueden ir solos hasta el evento o necesitan ir acompañados por su docente?
        </a>
      </h2>
    </div>
    <div id="preguntaSiete" class="collapse" aria-labelledby="septimaPregunta" data-parent="#accordionExample">
      <div class="card-body">
      Cada estudiante pueden llegar hasta el lugar solo, llegado el caso, pero al momento de la acreditación en el evento deberá estar acompañado/a por su docente a cargo.
      </div>
    </div>
  </div>
  <!-- fin de nueva pregunta -->

  <!-- Nueva pregunta -->
  <div class="card">
    <div class="card-header" id="octavaPregunta">
      <h2 class="mb-0">
        <a href="" style="font-size: 0.5em" class="btn-link" type="text"  data-toggle="collapse" data-target="#preguntaOcho" aria-expanded="false" aria-controls="collapseThree">
          ¿Es necesario preparar algo antes del evento?
        </a>
      </h2>
    </div>
    <div id="preguntaOcho" class="collapse" aria-labelledby="octavaPregunta" data-parent="#accordionExample">
      <div class="card-body">
      No es necesario llevar algo ya resuelto al comienzo del encuentro.
      </div>
    </div>
  </div>
  <!-- fin de nueva pregunta -->

  <!-- Nueva pregunta -->
  <div class="card">
    <div class="card-header" id="novenaPregunta">
      <h2 class="mb-0">
        <a href="" style="font-size: 0.5em" class="btn-link" type="text"  data-toggle="collapse" data-target="#preguntaNueve" aria-expanded="false" aria-controls="collapseThree">
          ¿Es necesario que los estudiantes conozcan contenidos específicos para participar?
        </a>
      </h2>
    </div>
    <div id="preguntaNueve" class="collapse" aria-labelledby="novenaPregunta" data-parent="#accordionExample">
      <div class="card-body">
      No es necesario contar con saberes específicos para participar en el hackatón. Se alienta la diversidad de saberes y conocimientos entre los miembros de cada equipo de estudiantes.
      </div>
    </div>
  </div>
  <!-- fin de nueva pregunta -->

  <!-- Nueva pregunta -->
  <div class="card">
    <div class="card-header" id="decimaPregunta">
      <h2 class="mb-0">
        <a href="" style="font-size: 0.5em" class="btn-link" type="text"  data-toggle="collapse" data-target="#preguntaDiez" aria-expanded="false" aria-controls="collapseThree">
          ¿Qué necesito llevar al lugar de realización para ingresar al evento?
        </a>
      </h2>
    </div>
    <div id="preguntaDiez" class="collapse" aria-labelledby="decimaPregunta" data-parent="#accordionExample">
      <div class="card-body">
        Es importante asistir con el DNI para corroborar identidad; junto con la autorización de uso de imagen impresa y firmada. En el caso de que les sea posible, los estudiantes pueden concurrir con su notebook, netbook o smartphone para trabajar.<br><br>

        <b>IMPORTANTE:</b> Para la acreditación es indispensable conocer el DNI del docente registrante (quien efectivamente haya inscrito a los estudiantes de la escuela), si no coincide con el docente acompañante (quien esté a cargo de los alumnos/as en el día del evento).
      </div>
    </div>
  </div>
  <!-- fin de nueva pregunta -->

  <!-- Nueva pregunta -->
  <div class="card">
    <div class="card-header" id="undecimaPregunta">
      <h2 class="mb-0">
        <a href="" style="font-size: 0.5em" class="btn-link" type="text"  data-toggle="collapse" data-target="#preguntaOnce" aria-expanded="false" aria-controls="collapseThree">
          ¿Tengo que asistir los dos días al evento?
        </a>
      </h2>
    </div>
    <div id="preguntaOnce" class="collapse" aria-labelledby="undecimaPregunta" data-parent="#accordionExample">
      <div class="card-body">
      Los estudiantes participantes deben asistir los dos días del evento y solo pueden ingresar con un docente que se haya registrado previamente. Los docentes acompañantes pueden ser diferentes personas por día (deben registrarse en cada caso).
      </div>
    </div>
  </div>
  <!-- fin de nueva pregunta -->

  <!-- Nueva pregunta -->
  <div class="card">
    <div class="card-header" id="duocecimaPregunta">
      <h2 class="mb-0">
        <a href="" style="font-size: 0.5em" class="btn-link" type="text"  data-toggle="collapse" data-target="#preguntaDoce" aria-expanded="false" aria-controls="collapseThree">
          ¿Tengo que llevar mi propia comida y/o bebida?
        </a>
      </h2>
    </div>
    <div id="preguntaDoce" class="collapse" aria-labelledby="duocecimaPregunta" data-parent="#accordionExample">
      <div class="card-body">
        Podés llevar lo que desees. Desde la organización del evento brindaremos desayuno, almuerzo y merienda para los dos días del encuentro.
<br>
        En caso de tener alguna restricción alimentaria, se puede indicar esto al momento de completar el formulario de inscripción.
      </div>
    </div>
  </div>
  <!-- fin de nueva pregunta -->

  <!-- Nueva pregunta -->
  <div class="card">
    <div class="card-header" id="decimoterceraPregunta">
      <h2 class="mb-0">
        <a href="" style="font-size: 0.5em" class="btn-link" type="text"  data-toggle="collapse" data-target="#preguntaTrece" aria-expanded="false" aria-controls="collapseThree">
          ¿Cómo llego al Palais Rouge?
        </a>
      </h2>
    </div>
    <div id="preguntaTrece" class="collapse" aria-labelledby="decimoterceraPregunta" data-parent="#accordionExample">
      <div class="card-body">
        Líneas de colectivo que te acercan: 36, 39, 92, 106, 109, 160, 188.
        <br><br>
        Estaciones BAEcobici #122 – Costa Rica, #066 - Billinghurst.
      </div>
    </div>
  </div>
  <!-- fin de nueva pregunta -->

  <!-- Nueva pregunta -->
  <div class="card">
    <div class="card-header" id="decimocuartaPregunta">
      <h2 class="mb-0">
        <a href="" style="font-size: 0.5em" class="btn-link" type="text" data-toggle="collapse" data-target="#preguntaCatorce" aria-expanded="false" aria-controls="collapseThree">
          ¿Cómo puedo despejar otras dudas?
        </a>
      </h2>
    </div>
    <div id="preguntaCatorce" class="collapse" aria-labelledby="decimocuartaPregunta" data-parent="#accordionExample">
      <div class="card-body">
      Podés escribirnos a <a href="mailto:desafíos.cientificos@bue.edu.ar">desafios.cientificos@bue.edu.ar</a>
      </div>
    </div>
  </div>
  <!-- fin de nueva pregunta -->
</div> <!-- fin de acordeón de preguntas frecuentes -->
   <br>
      <!-- Recursos -->
  <div class="alert alert-info ml-auto">
    <a href="/docs/Manual_Hackaton_web_final_22ago18.pdf" target="_blank"><img src="/imgs/compose_64px.png" style="height:40px; width:40px" alt=""></a>
    <span class="alert ">
      Manual de hackatón educativo <small>(clic en el ícono para descargarlo en PDF)</small>
    </span><br>
    <a href="https://drive.google.com/file/d/1t2H_FGB7sZwphauQxaSY4lH1iHU75Ud1/view?usp=sharing" target="_blank"><img src="/imgs/compose_64px.png" style="height:40px; width:40px" alt=""></a> <span class="alert ">
    Documento Programa Desafíos Científicos <small>(clic en el ícono para descargarlo en PDF)</small>
  </div>    <!-- Fin de recursos -->
</div>     <!-- Fin de PMF y recursos -->
      </div><!-- fin del jumbotron secundario -->

      @include('segundabarranav')

          <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Script para el popup-->
<script>
// Cuando el usuario cliquea en el div, se abre el popup
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

    </body>
</html>
