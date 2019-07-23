
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

    <title>Consultas</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">

     {{-- <div class="jumbotron bg-light" > <!-- jumbotron secundario --> --}}
      <!-- Dos columnas -->
      <div class="row">
  <div class="col-sm-5 ml-auto">
    <div class="card">
      <div class="card-header" style="background:#ffebcc"><h5>Consultas</h5></div>
       <div class="card-body">
        <h5 class="card-title">Consulta de datos</h5>
            <p class="card-text">Permite realizar consultas de estudiantes a partir del DNI del docente; de estudiantes por escuela; de desafíos para saber descripción, tutor y estudiantes; de grupos para saber tutor e integrantes, etc.</p>
              <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            clic para desplegar opciones
          </button>
            <small id="emailHelp" class="form-text text-muted">Elegir la consulta a realizar seleccionando una de las opciones</small>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/estudiantesPorDocente">Estudiantes por docente (por DNI)</a>
            <a class="dropdown-item" href="/estudiantesPorEscuela">Estudiantes por escuela</a>
            <a class="dropdown-item" href="/estudiantesPorGrupo">Estudiantes por grupo</a>
            <a class="dropdown-item" href="/consultaPorDesafio">Desafíos (por nombre para saber descripción, tutor y grupos asignados)</a>
            <a class="dropdown-item" href="/consultaEstablecimientos">Establecimientos oficiales de CABA (por nombre o parte del nombre)</a>
              <a class="dropdown-item" href="/consultaEscuelasParticipantes">Escuelas participantes del hackatón (por nombre o parte del nombre)</a>
              <a class="dropdown-item" href="/consultaTutores">Tutores (para saber grupos y estudiantes)</a>
      </div>
    </div>
      </div>
    </div>
  </div>
  <!-- Fin columna 1 -->
    <!-- Columna 2 -->
  <div class="col-sm-5 mr-auto ">
    <div class="card">
        <div class="card-header" style="background:#b3ffb3"><h5>Listados</h5></div>
      <div class="card-body">
        <h5 class="card-title">Listados de personas y organizaciones</h5>
          <p class="card-text">Obtener listados en pantalla de Tutores, Mentores, Jurados, Colaboradores, Organizadores, Escuelas, etc.</p><br><br>
        {{-- <div class="card-body"> --}}
          <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        clic para desplegar opciones
      </button>
        <small id="emailHelp" class="form-text text-muted">Elegir el tipo de listado a visualizar seleccionando una de las opciones</small>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="/listadoTutores">Listado de tutores</a>
        <a class="dropdown-item" href="/listadoMentores">Listado de mentores</a>
        <a class="dropdown-item" href="/listadoDisertantes">Listado de disertantes</a>
        <a class="dropdown-item" href="/listadoEscuelas">Listado de escuelas participantes</a>
        <a class="dropdown-item" href="/listadoEstudiantes">Listado de estudiantes inscriptos</a>
        <a class="dropdown-item" href="/listadoEstudiantesPresentesDia1">Listado de estudiantes presentes (día 1)</a>
        <a class="dropdown-item" href="/listadoEstudiantesPresentesDia2">Listado de estudiantes presentes (día 2)</a>
        </div>
        </div>
        </div>
        </div>
        </div>
              <!-- fin de columna 2 -->
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
