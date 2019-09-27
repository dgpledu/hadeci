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

    <title>Índice de estudiantes</title>
  </head>
  <body>
  @include('primerabarranav')
  <!--- prueba para ver si muestra el mensaje exitoso de registro -->


    @if(session()->get('exitoso'))
        <div class="alert alert-success" role="alert">
        {{ session()->get('exitoso') }}
      </div>
    @endif

  <!--- fin de prueba para ver si muestra el mensaje exitoso de registro -->
 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">

  <!-- Formulario de inscripción -->
  <!-- Cabecera -->

  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 78rem";>

  <div class="card-header" style="background:#f2d333">

    <h4>Índice de estudiantes

</h4>


<h5>
<span class="badge badge-primary badge-pill">

{{ $estudiantes->firstItem() }}
</span>
<span class="">
a
</span>
<span class="badge badge-primary badge-pill">
{{ $estudiantes->lastItem() }}
</span>
<span class="">
de un total de
</span>
<span class="badge badge-primary badge-pill">
{{ $estudiantes->total() }}
</span>
<!-- Fin de cartel x a y de un total de n elementos -->
    </h5>

  </div>

  <div class="card-body">

    <!-- tabla -->
    @php
      $numorden = ($estudiantes->currentpage()-1)* $estudiantes->perpage();
    @endphp
    <table id="tabla-listado" class="table table-responsive table-sm table-striped">
      {{-- <thead style="background:#F2D333"> --}}
        <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">ID</th>
          <th scope="col">Apellido</th>
          <th scope="col">Nombre</th>
          <th scope="col">DNI</th>
          <th scope="col">Celular</th>
          <th scope="col">Email</th>
          <th scope="col">Escuela</th>
          <th scope="col" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Editar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($estudiantes as $estudiante)
          @php
            $numorden++;
          @endphp
        <tr>

          <th scope="row">{{ $numorden }}</th>
          <td>{{$estudiante["ID"]}}</td>
          <td>{{$estudiante["apellido"]}}</td>
          <td>{{$estudiante["nombre"]}}</td>
          <td>{{$estudiante["DNI"]}}</td>
          <td>{{$estudiante["celular"] }}</td>
          <td><a href="mailto:{{$estudiante["email"]}}">{{$estudiante["email"]}}</a></td>
          <td>{{$estudiante->escuela["nombre"]}}</td>

          <td></td>
<!-- Prueba de borrar tutor -->
          <td>
            <form action="/editarEstudiantes" method="post">
              {{ csrf_field() }}
                <input type="hidden" name="ID_estudiante_a_editar" value="{{$estudiante["ID"]}}">
                <input type="image" img src="/imgs/icono-editar4.png" style="width:30px;height:30px;">
            </form>
          </td>

          <td>
             <form action="" method="post">
               {{ csrf_field() }}
               <input type="hidden" name="ID_estudiante_a_borrar" value="{{$estudiante["ID"]}}">
               <input type="image" img src="/imgs/icono-borrar.png" style="width:30px;height:30px;" onclick="return confirm('¿Seguro que quiere borrar este estudiante?');">
            </form>
          </td>
<!-- Fin de prueba borrar estudiante -->
        </tr>
      @endforeach
      </tbody>
    </table>
    <!-- fin de tabla -->
    {{-- <input type="submit" class="btn btn-primary" value="Borrar tutor"> --}}
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
