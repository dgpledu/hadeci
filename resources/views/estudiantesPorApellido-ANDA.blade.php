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
  <!-- Prueba de tabla linda -->
  @if ($resultados_e)

    <br><hr>
    <b>Estudiantes inscriptos</b><br><br>
    @php
      $numorden = 0;
    @endphp
  <table id="tabla-listado" class="table table-responsive table-striped">
    <thead style="background:#F2D333">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Apellido</th>
        <th scope="col">Nombre</th>
        <th scope="col">DNI</th>
        <th scope="col">Escuela</th>
        <th scope="col">Grupo</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($resultados_e->sortBy('apellido') as $estudiante)
                  @php
                    $numorden++;
                  @endphp
      <tr>
        <th scope="row">{{ $numorden }}</th>
        <td>{{$estudiante["apellido"]}}</td>
        <td>{{$estudiante["nombre"]}}</td>
        <td>{{$estudiante["DNI"]}}</td>
        <td>{{$estudiante->escuela["nombre"]}}</td> <!-- esto funciona porque $estudiante es de tipo estudiante -->
        <td>{{$estudiante->grupo["nombre"]}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endif
  <!-- Fin de prueba con tabla linda -->
  {{-- @if ($resultados_d)
    <b>Docente:</b> {{$resultados_d["apellido"]}}, {{$resultados_d["nombre"]}} |
    <b>DNI:</b> {{$resultados_d["DNI"]}}<br>
    <b>Cantidad de estudiantes: </b>{{count($resultados_d->estudiantes)}}
    <br><hr>
    <b>Estudiantes registrados por el docente</b><br><br>
    @php
      $cant_est = 0;
    @endphp

    @foreach ($resultados_d->estudiantes->sortBy('apellido') as $estudiante)
      @php
        $cant_est++;
      @endphp

      {{$cant_est}}. {{$estudiante["apellido"]}}, {{$estudiante["nombre"]}}, {{$estudiante["DNI"]}}<br>
    @endforeach

  @endif --}}
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
