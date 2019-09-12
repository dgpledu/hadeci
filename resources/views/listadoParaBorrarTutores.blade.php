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

    <title>Listado de tutores para borrar</title>
  </head>
  <body>
  @include('primerabarranav')
  <!--- prueba para ver si muestra el mensaje exitoso de registro -->
  @if (session('estado'))
       <div class="alert alert-success">
  <h5><img src="/imgs/tilde-correcto-4.png" style="width:40px; height:40px;" alt="borrado">

          <b> {{session('estado')}} </b>
          ha sido borrado como <b>tutor</b> en "Desafíos Científicos".
  </h5>
       </div>
   @endif

   {{-- @if (isset($nombreTutorABorrar))
       <h5>
         <img src="/imgs/tilde-correcto-4.png" style="width:40px; height:40px;" alt="borrado">
         <b> {{$nombreTutorABorrar}} {{$apellidoTutorABorrar}} </b>
         ha sido borrado como <b>tutor</b> en "Desafíos Científicos".
         <br><br>
         {{-- <hr>
         <a class="btn " style="background:#f2d333; color: black;" href="/listadoParaBorrarTutores" role="button">Borrar otro tutor</a>
         </h5>
   @endif --}}

  <!--- fin de prueba para ver si muestra el mensaje exitoso de registro -->
 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">

  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333">
    <h4>Listado de tutores para borrar
{{-- <span class="badge badge-primary badge-pill">{{count($todoslostutores)}}</span> --}}
</h4>


<h5>
<span class="badge badge-primary badge-pill">
{{ $tutores->firstItem() }}
</span>
<span class="">
a
</span>
<span class="badge badge-primary badge-pill">
{{ $tutores->lastItem() }}
</span>
<span class="">
de un total de
</span>
<span class="badge badge-primary badge-pill">
{{ $tutores->total() }}
</span>
<!-- Fin de cartel x a y de un total de n elementos -->
    </h5>

  </div>

  <div class="card-body">

    <!-- tabla -->
    @php
      $numorden = ($tutores->currentpage()-1)* $tutores->perpage();
    @endphp
    <table id="tabla-listado" class="table table-responsive table-striped">
      {{-- <thead style="background:#F2D333"> --}}
        <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">ID</th>
          <th scope="col">Apellido</th>
          <th scope="col">Nombre</th>
          <th scope="col">CUIL/CUIT</th>
          <th scope="col">Celular</th>
          <th scope="col">Email</th>
          <th scope="col">Institución</th>
          <th scope="col">¿Borrar?</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tutores as $tutor)
          @php
            $numorden++;
          @endphp
        <tr>

          <th scope="row">{{ $numorden }}</th>
          <td>{{$tutor["ID"]}}</td>
          <td>{{$tutor["Apellido"]}}</td>
          <td>{{$tutor["Nombre"]}}</td>
          <td>{{$tutor["DNI"]}}</td>
          <td>{{$tutor["Celular"] }}</td>
          <td><a href="mailto:{{$tutor["email"]}}">{{$tutor["email"]}}</a></td>
          <td>{{$tutor["instit_rep"] }}</td>
<!-- Prueba de borrar tutor -->
          <td>
              <form action="" method="post">
              {{ csrf_field() }}
              <input type="checkbox" name="ID_tutor" value="{{$tutor["ID"]}}" >
   </div>
           </td>
<!-- Fin de prueba borrar tutor -->
        </tr>
      @endforeach
      </tbody>
    </table>
    <!-- fin de tabla -->
    <input type="submit" class="btn btn-primary" value="Borrar tutor">
                    </form>
{{-- <br><br> --}}
    <a class="btn " style="background:#f2d333; color: black;" href="/consultas" role="button">Volver a Consultas</a>
  <!-- tabla para paginación -->
    {{-- <table class="table table-responsive ">
      <tbody>
        <tr>
          <th scope="row">{{$tutores->links()}}<a class="btn " style="background:#f2d333; color: black;" href="/consultas" role="button">Volver a Consultas</a></th>
        </tr>
      </tbody>
    </table> --}}
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
