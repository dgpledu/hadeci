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
      <link href="/css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="/css/tableexport.css" rel="stylesheet">

    <title>Consulta de estudiantes por apellido</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333"><h5>Consulta de estudiantes por apellido</h5></div>
  <div class="card-body">


    <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->

<div class="alert alert-secondary w-85" role="alert">
  <form class="form-group pt-2" action="" method="get">
    {{-- {{ csrf_field() }} --}}
    <input class="form-control-lg col-lg-4" type="text" name="busqueda_apellido_estudiante" value="" placeholder="apellido o parte del apellido">
    <button type="submit" name="" class="btn btn-success">Realizar consulta</button>
    <small id="emailHelp" class="form-text text-muted">Tipee el apellido o parte del apellido del estudiante que busca.</small>
  </form>
  <!-- Prueba de ficha -->
  @if ($resultados_e)
    <br>
    <b>Estudiantes inscriptos</b><br><br>
    @php
      $numorden = 0;
    @endphp

          @foreach ($resultados_e->sortBy('apellido') as $estudiante)
              @php
                $numorden++;
              @endphp
              <div class="card">
                  <div class="card-header" style="background:#F2D333">{{$estudiante["apellido"]}}, {{$estudiante["nombre"]}}</div>
                      <div class="card-body">
                    <h5 class="card-title">DNI: {{$estudiante["DNI"]}}</h5>
                    <p class="card-text">Escuela: {{$estudiante->escuela["nombre"]}}</p>
                    <p class="card-text">Grupo: {{$estudiante->grupo["nombre"]}}</p>
                    <p class="card-text">E-mail: {{$estudiante["email"]}}</p>
                    <p class="card-text">Fecha de nacimiento: {{$estudiante["fecha_nac"]}}</p>
                    <p class="card-text">Año: {{$estudiante["anio_cursa"]}}</p>
                    <p class="card-text">Restricción alim.: {{$estudiante["restric_alim"]}}</p>
            Datos de los padres
                    <p class="card-text">Padre/Madre/Enc: {{$estudiante["nom_padre"]}} {{$estudiante["ape_padre"]}}</p>
                    <p class="card-text">Teléfono: {{$estudiante["telefono_padre"]}}</p>
                    <p class="card-text">Mail: {{$estudiante["mail_padre"]}}</p>
</div></div><br>
          @endforeach



@endif
  <!-- Fin de prueba con tabla linda -->
</div>
</div>
</div>
</div>
</div>
</div><!-- fin del jumbotron secundario -->
@include('segundabarranav')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blob-polyfill/4.0.20190430/Blob.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.6/xls.core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.2/dist/FileSaver.min.js"></script>

    <script src="/js/tableexport.min.js"></script>
  </body>
  <script>
    var table = TableExport(document.getElementById("tabla-listado"),
    {
      formats: ["xls", "csv", "txt"],    // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
      filename: "miListado",                     // (id, String), filename for the downloaded file, (default: 'id')
      bootstrap: true,
      position: 'bottom'                   // (Boolean), style buttons using bootstrap, (default: true)
      // exportButtons: true,                // (Boolean), automatically generate the built-in export buttons for each of the specified formats (default: true)
      // position: 'bottom'                 // (top, bottom), position of the caption element relative to table, (default: 'bottom')
    });
    </script>
</html>
