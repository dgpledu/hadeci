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

    <title>Preinscripción de estudiantes</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333"><h5>Inscripción de estudiantes</h5></div>
  <div class="card-body">
    <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->

<!-- Esto lo agregué, antes no estaba -->
{{-- @if (session('estado'))
    <div class="alert alert-success">
<h5 >
El estudiante
      <b> {{ session('estado') }} </b>
       ha sido inscripto exitosamente!</h5>
    </div>
@endif --}}
<!-- fin de lo que agregué que antes no estaba y funcionaba perfecto -->



<div class="alert alert-secondary w-85" role="alert">
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

    <h6>Ingrese su DNI y luego haga clic en el botón <kbd style="background-color:#808080";>Ir al formulario</kbd> para realizar la carga de datos de estudiantes:</h6>
  <!-- Inicio sección datos del docente registrante -->
  <div class="form-row">
        <div class="form-group col-sm-4">
          <!-- 1er form -->
          <form class="form-group pt-2" action="/preinscripcionEstudiantes" method="post">
                    {{-- <form class="form-group pt-2" action="/inscripcionEstudiantes" method="get"> --}} <!-- esto era cuando validaba el DNI del docente en la página de INSCRIPCIÓN -->
            {{ csrf_field() }}
          <input type="number" name="dnidocente" class="form-control" placeholder="DNI del docente registrante">
            <small class="form-text text-muted"><b>¡ATENCIÓN!:</b>  Para poder inscribir estudiantes, debe haberse inscripto previamente como docente en el hackatón actual, si no, el sistema tomará su DNI como inválido (la inscripción de años anteriores no sirve). <br> <br>
              Si aún no está inscripto/a, haga clic <kbd style="background-color:#808080";><a href="/inscripcionDocentes" style="color:white"; >en éste enlace</a></kbd>  para ir a la página de inscripción de docentes.</small>
            <div class="form-group col-sm-3">
              <br>
              <button type="submit" name="" class="btn btn-success">Ir al formulario</button>
            </form>
            <!-- Cierre 1er form -->
            </div>
        </div>
  </div>
    </div>  </div>  </div>
</div>
</div><!-- fin del jumbotron secundario -->

@include('segundabarranav')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
