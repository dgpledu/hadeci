<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
        <!-- ¡Esto debe ir antes que ningún otro stylesheet!!! -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="/css/tableexport.css" rel="stylesheet">
      <!-- Fin de lo que debe ir antes que ningún otro stylesheet!!! -->

    <title>Listado de docentes</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333">
    <h4>Listado de docentes
{{-- <span class="badge badge-primary badge-pill">{{count($todoslostutores)}}</span> --}}
</h4>
<h5>
<span class="badge badge-primary badge-pill">
{{ $docentes->firstItem() }}
</span>
<span class="">
a
</span>
<span class="badge badge-primary badge-pill">
{{ $docentes->lastItem() }}
</span>
<span class="">
de un total de
</span>
<span class="badge badge-primary badge-pill">
{{ $docentes->total() }}
</span>
<!-- Fin de cartel x a y de un total de n elementos -->
    </h5>
  </div>
  <div class="card-body">

    <!-- tabla -->
    @php
      $numorden = ($docentes->currentpage()-1)* $docentes->perpage();
    @endphp
    <table id="tabla-listado" class="table table-responsive table-striped">
      {{-- <thead style="background:#F2D333"> --}}
        <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Apellido</th>
          <th scope="col">Nombre</th>
          <th scope="col">CUIL/CUIT</th>
          <th scope="col">Celular</th>
          <th scope="col">Email</th>
          <th scope="col">Escuela</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($docentes as $docente)
          @php
            $numorden++;
          @endphp
        <tr>
          <th scope="row">{{ $numorden }}</th>
          <td>{{$docente["apellido"]}}</td>
          <td>{{$docente["nombre"]}}</td>
          <td>{{$docente["DNI"]}}</td>
          <td>{{$docente["celular"] }}</td>
          <td><a href="mailto:{{$docente["email"]}}">{{$docente["email"]}}</a></td>
          <td>
              @foreach ($docente->escuelas as $escuela)
                  {{$escuela["nombre"]}}
              @endforeach
         </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <!-- fin de tabla -->

  <!-- tabla para paginación -->
    <table class="table table-responsive ">
      <thead>
        <tr>
          {{-- <th scope="col"></th> --}}
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">{{$docentes->links()}}<a class="btn " style="background:#f2d333; color: black;" href="/consultas" role="button">Volver a Consultas</a></th>
        </tr>
      </tbody>
    </table>
    <!-- fin de tabla para paginación -->
</div></div>
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
    var table = TableExport(document.getElementById("tabla-listado"), {
      formats: ["xls", "csv", "txt"],    // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
      filename: "miListado",                     // (id, String), filename for the downloaded file, (default: 'id')
      bootstrap: true,
      position: 'bottom'                   // (Boolean), style buttons using bootstrap, (default: true)
      // exportButtons: true,                // (Boolean), automatically generate the built-in export buttons for each of the specified formats (default: true)
      // position: 'bottom'                 // (top, bottom), position of the caption element relative to table, (default: 'bottom')
    });
    </script>
</html>
