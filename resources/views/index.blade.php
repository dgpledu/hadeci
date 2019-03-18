
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
      {{-- <button type="button" style="margin-left: 500px;" class="btn btn-primary" data-toggle="modal" data-target="#imgModal">
     Mapa del evento
      </button> --}}
</div>

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">



    <div class="contenedor">
     <div class="card-deck">
       <div class="card"> <!-- primera tarjeta -->
         <img class="card-img-top" src="/imgs/hdc2017-1.jpg" alt="estudiantes en hackatón">
         <div class="card-body">
           <h5 class="card-title"><a name="que_es">¿Qué es?</a></h5>
           <p class="card-text">Desafíos Científicos es una propuesta que promueve el abordaje de diversos desafíos regionales, globales y espaciales y la búsqueda de su resolución a lo largo de dos jornadas de trabajo.
           <br>
             Los estudiantes trabajan en equipos de entre <strong>5 a 8 estudiantes</strong> y eligen una entre <strong>cuatro temáticas</strong> posibles a las cuales pertenecen los problemas. Los problemas abordan aspectos del mundo real.
           <br>
           </p>
         </div>
       </div> <!-- fin de primera tarjeta -->

       <div class="card"> <!-- segunda tarjeta -->
         <img class="card-img-top" src="/imgs/hdc2017-2.jpg" alt="estudiantes en hackatón">
         <div class="card-body">
           <h5 class="card-title"><a name="quienes_pueden_participar">¿Quiénes pueden participar?</a></h5>
           <p class="card-text">Desafíos Científicos está destinado a <b>estudiantes de 4º, 5º y 6º año</b> de cualquier institución oficial del sistema educativo de la Ciudad de Buenos Aires.
         <br>Los estudiantes participantes deben ser <b>acompañados por un adulto cada 10 (diez) estudiantes</b>.

         Los equipos son armados por un equipo central en base a las <a href="#tematicas">temáticas</a> elegidas por los estudiantes para asegurar la heterogeneidad. Los equipos trabajan durante un día y medio para encontrar soluciones a problemas reales vinculados al enfoque de ciencia, tecnología y sociedad.
           <br></p>
         </div>
       </div> <!-- fin de segunda tarjeta -->

       <div class="card"> <!-- tercera tarjeta -->
         <img class="card-img-top" src="/imgs/hdc2017-3.jpg" alt="estudiantes en hackatón">
         <div class="card-body">
           <h5 class="card-title"><a name="como_participar">¿Cómo participar?</a></h5>
           <p class="card-text">Para participar en Desafíos Científicos se debe realizar la inscripción correspondiente. Los estudiantes deben ser registrados por sus docentes o por personal de la institución escolar. Para participar no es necesario llevar ningún elemento en especial aunque está más que bienvenido si desean llevar sus dispositivos portátiles como smartphones, netbooks o tablets.</p>
         </div>
       </div> <!-- fin de tercera tarjeta -->

     </div> <!-- cierre del mazo de cartas -->
     <br>
     <!--- Segunda fila de cards -->
     <div class="card-deck"> <!-- inicio del segundo juego de tarjetas -->
       <div class="card"> <!-- primera tarjeta -->
         <img class="card-img-top" src="/imgs/hdc2017-4.jpg" alt="estudiantes en hackatón">
         <div class="card-body">
           <h5 class="card-title"><a name="donde_se_realiza">¿Dónde se realiza?</a></h5>
           <p class="card-text">El evento se llevará a cabo en <a href="https://www.google.com.ar/maps/place/La+Usina+del+Arte/@-34.6285277,-58.3591658,17z/data=!3m1!4b1!4m5!3m4!1s0x95a334c73fe3e107:0xeae5d0a098ae5c1!8m2!3d-34.6285321!4d-58.3569718" target="_blank">La Usina del Arte, Agustín R. Caffarena 1, barrio de La Boca</a>, donde más de 600 estudiantes se repartirán en equipos conformados por representantes de escuelas diferentes. Durante la actividad se promoverá la imaginación, el trabajo colaborativo y el espíritu emprendedor. Los docentes acompañantes participarán de actividades específicas, formativas e informativas.</p>
         </div>
       </div> <!-- fin de primera tarjeta -->

       <div class="card"> <!-- segunda tarjeta -->
         <img class="card-img-top" src="/imgs/hdc2017-5.jpg" alt="estudiantes en hackatón">
         <div class="card-body">
           <h5 class="card-title"><a name="tematicas">Temáticas</a></h5>
           <p class="card-text">Las cuatro temáticas que aborda el hackatón Desafíos Científicos son:
             <ul>
               <li>Ciencias Espaciales</li>
               <li>Gestión Territorial y Urbana</li>
               <li>Ciencias de la Vida</li>
               <li>Ciencia y Arte</li>
             </ul>
             Los trabajos son evaluados por un jurado y los ganadores de cada temática ingresan al <b>Programa Desafíos Científicos</b> que involucra actividades en centros de ciencia, tecnología y arte de vanguardia en el país.</p>
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

  <a href="/docs/Manual_Hackaton_web_final_22ago18.pdf" target="_blank"><img src="/imgs/compose_64px.png" alt=""></a> <span class="alert ">


      Manual de hackatón educativo <small>(clic en el ícono para descargarlo en PDF)</small>


</span>



  </div>


<!-- Footer de la página (tunearlo más adelante)-->


{{-- <script>
    $(document).ready(function(){
        $("img").click(function(){
           var img=$(this).attr('src');
             $("#show-img").attr('src',img);
             $("#imgmodal").modal('show');
        });
    });
</script> --}}

</div>
      </div><!-- fin del jumbotron secundario -->

      @include('segundabarranav')

          <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
</html>
