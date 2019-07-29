
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

    <title>Inscripción</title>
  </head>
  <body>
  @include('primerabarranav')

 {{-- <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')"> --}}
   <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron-HDC-jpg-01.jpg')">
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
            <a class="dropdown-item" href="/preinscripcionEstudiantes">Inscribir estudiantes</a>
            <hr>
            <a class="dropdown-item" href="/inscripcionDocentes">Inscribirme como docente</a>
            <a class="dropdown-item" href="/inscripcionTutores">Inscribirme como tutor/a</a>
            <a class="dropdown-item" href="/inscripcionMentores">Inscribirme como mentor/a</a>
            <a class="dropdown-item" href="/inscripcionJurados">Inscribirme como jurado</a>
            <a class="dropdown-item" href="/inscripcionOrganizadores">Inscribirme como organizador/a</a>
            <a class="dropdown-item" href="/inscripcionAutoridades">Inscribirme como autoridad (funcionario/a)</a>
            <a class="dropdown-item" href="/inscripcionColaboradores">Inscribirme como colaborador/a</a>
            <a class="dropdown-item" href="/inscripcionInvitados">Inscribirme como invitado/a</a>
            <a class="dropdown-item" href="/inscripcionDisertantes">Inscribirme como disertante/tallerista</a>
            <a class="dropdown-item" href="/inscripcionProveedores">Inscribirme como proveedor/a de servicios y/o productos</a>
            {{-- <a class="dropdown-item" href="#">Miembro de institución asociada</a> --}}
            {{-- <a class="dropdown-item" href="/inscripcionMentores">Inscribirme como mentor</a>
            <a class="dropdown-item" href="/inscripcionJurados">Inscribirme como jurado</a>
            <a class="dropdown-item" href="/inscripcionOrganizadores">Inscribirme como organizador</a>
            <a class="dropdown-item" href="/inscripcionAutoridades">Inscribirme como autoridad</a>
            <a class="dropdown-item" href="/inscripcionColaboradores">Inscribirme como colaborador</a>
            <a class="dropdown-item" href="/inscripcionInvitados">Inscribirme como invitado</a>
            <a class="dropdown-item" href="/inscripcionDisertante">Inscribirme como disertante/tallerista</a>
            <a class="dropdown-item" href="/inscripcionProveedor">Inscribirme como proveedor de servicios y/o productos</a>
            <a class="dropdown-item" href="/inscripcionMiembroIA">Miembro de institución asociada</a> --}}
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
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
    </html>
