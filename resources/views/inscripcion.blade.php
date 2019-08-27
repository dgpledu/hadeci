
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
        <!-- ¡Esto debe ir antes que ningún otro stylesheet!!! -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <!-- Fin de lo que debe ir antes que ningún otro stylesheet!!! -->

    <title>Inscripción</title>
  </head>
  <body>
  @include('primerabarranav')

 {{-- <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')"> --}}
   <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron-HDC-jpg-01.jpg')">

<!-- Toast -->
  <div class="toast" style="position: absolute; top: 0; right: 27rem;" id="cupocompleto" data-autohide="false" role="alert" aria-live="assertive" aria-atomic="true" >
  <div class="toast-header">
    <img src="/imgs/alerta.png" class="rounded mr-2" alt="...">
    <strong class="mr-auto">¡CUPO COMPLETO!</strong>
    <small>27 de Agosto</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
    No se aceptan más inscripciones de <b>estudiantes</b>. Solo docentes acompañantes y demás perfiles (tutores, mentores, etc.).
  </div>
</div>
<!-- fin de toast -->


 <div class="col-sm-6 mx-auto">
    <div class="card mx-auto" >
      <div class="card-header" style="background:#ffebcc"><h4>Menú de opciones para inscripción</h4></div>
       <div class="card-body">
        <h5 class="card-title">Hackatón "Desafíos Científicos" edición 2019</h5>
            <p class="card-text">Todas las personas asistentes al evento deben completar su registro. Para poder registrar estudiantes, primero debe haberse registrado como <b>docente</b>. Seleccione una de las opciones disponibles dando clic en el selector azul.</p>
              <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            clic para desplegar opciones
          </button>
            <small id="emailHelp" class="form-text text-muted">Elija la opción que corresponda y recuerde que para inscribir estudiantes debe primero inscribirse como docente. Si usted es personal de la escuela pero no se desempeña como docente, igual debe inscribirse como docente de su escuela por más que no tenga estudiantes a cargo en este evento.</small>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <!-- Deshabilitación transitoria por falta de cupo -->
            {{-- <a class="dropdown-item disabled" href="#">Inscribir estudiantes</a> --}}
            {{-- <a class="dropdown-item" href="/preinscripcionEstudiantes">Inscribir estudiantes</a> --}}
                <!-- Fin de deshabilitación transitoria por falta de cupo -->
            {{-- <hr> --}}
            <a class="dropdown-item" href="/inscripcionDocentes">Inscribirme como docente acompañante</a>
            <a class="dropdown-item" href="/inscripcionTutores">Inscribirme como tutor/a</a>
            <a class="dropdown-item" href="/inscripcionMentores">Inscribirme como mentor/a</a>
            <a class="dropdown-item" href="/inscripcionJurados">Inscribirme como jurado</a>
            <a class="dropdown-item" href="/inscripcionOrganizadores">Inscribirme como organizador/a</a>
            <a class="dropdown-item" href="/inscripcionAutoridades">Inscribirme como autoridad (funcionario/a)</a>
            <a class="dropdown-item" href="/inscripcionColaboradores">Inscribirme como colaborador/a</a>
            <a class="dropdown-item" href="/inscripcionInvitados">Inscribirme como invitado/a</a>
            <a class="dropdown-item" href="/inscripcionDisertantes">Inscribirme como disertante/tallerista</a>
            <a class="dropdown-item" href="/inscripcionProveedores">Inscribirme como proveedor/a de servicios y/o productos</a>

      </div>
    </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <!-- Fin columna 1 -->
@include('segundabarranav')

    <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      <script>
      $(document).ready(function(){
          $("#cupocompleto").toast('show');
      });
      </script>

  </body>
    </html>
