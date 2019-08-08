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

    <title>Consulta de tutores</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333"><h5>Consulta de tutores</h5></div>
  <div class="card-body">
    <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->

<div class="alert alert-secondary w-85" role="alert">
  <form class="form-group pt-2" action="" method="get">
    {{ csrf_field() }}
<select class="" name="busqueda_tutor">
   <option value="">Seleccionar un tutor de la lista</option>
   @if($todoslostutores)

  @foreach ($todoslostutores->sortBy('Apellido') as $tutor)
    <option value="{{$tutor["ID"]}}">{{$tutor["Nombre"]}} {{$tutor["Apellido"]}}</option>
  @endforeach
@endif

  <small id="emailHelp" class="form-text text-muted">Seleccionar el tutor</small>
</select>
<br><br>
<button type="submit" name="" class="btn btn-success">Listar grupos y su desafío</button>
</form>


<!-- Prueba de resultados en forma de tabla -->

@if ($resultados_tutor)

  {{-- <b>Tutor: </b> {{$resultados_tutor["Apellido"]}}, {{$resultados_tutor["Nombre"]}}<br>
<b>DNI: </b>{{$resultados_tutor["DNI"]}}<br>
<b>E-mail: </b>{{$resultados_tutor["email"]}}<br> --}}

<hr><h5 class="card-title text-success">Grupos</h5> @php $cant_est = 0; @endphp

  <table id="tabla-listado" class="table table-responsive table-striped">

    @foreach ($resultados_tutor->grupos as $grupo)

    <thead style="background:#F2D333">
      <!-- Encabezado de la tabla -->
     <td colspan="5">
         <b>Tutor: </b>{{$resultados_tutor["Apellido"]}}, {{$resultados_tutor["Nombre"]}} ({{$grupo["nombre"]}}: {{$resultados_tutor->desafio["nombre"]}})
    </td>
     <!-- Fin encabezado de la tabla -->
  <tr>
    <th scope="col">#</th><th scope="col">Apellido</th><th scope="col">Nombre</th><th scope="col">Escuela</th><th scope="col">Grupo</th>
  </tr>
    </thead>

    <tbody> @php $cant_est = 0; @endphp

      @foreach ($grupo->estudiantes->sortBy('apellido') as $estudiante) @php $cant_est++; @endphp
 <tr>
 <th scope="row">{{ $cant_est }}</th><td>{{$estudiante["apellido"]}}</td><td>{{$estudiante["nombre"]}}</td><td>{{$estudiante->escuela["nombre"]}}</td><td>{{$grupo["nombre"]}}</td>
</tr>
     @endforeach
   </tbody>
@endforeach
@endif

</table>

<!-- Fin de resultados en forma de tabla -->
</div>
</div>
{{-- <a class="btn btn-warning" href="/consultas" role="button">Volver a Consultas</a> --}}
<a class="btn " style="background:#f2d333; color: black;" href="/consultas" role="button">Volver a Consultas</a>

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
