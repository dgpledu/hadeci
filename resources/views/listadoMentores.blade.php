<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        {{-- <link href="/css/bootstrap.min.css" rel="stylesheet"> --}}
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="/css/tableexport.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
        <!-- ¡Esto debe ir antes que ningún otro stylesheet!!! -->

      <!-- Fin de lo que debe ir antes que ningún otro stylesheet!!! -->

    <title>Listado de mentores</title>

{{-- <link rel="stylesheet" href="/css/bootstrap.min.css">--}}


  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333">
    <h4>Listado de mentores
{{-- <span class="badge badge-primary badge-pill">{{count($todoslosmentores)}}</span> --}}
</h4>
<h5>
<span class="badge badge-primary badge-pill">
{{ $otros->firstItem() }}
</span>
<span class="">
a
</span>
<span class="badge badge-primary badge-pill">
{{ $otros->lastItem() }}
</span>
<span class="">
de un total de
</span>
<span class="badge badge-primary badge-pill">
{{ $otros->total() }}
</span>
<!-- Fin de cartel x a y de un total de n elementos -->
    </h5>
  </div>
  {{-- <div class="card-body bg-light"> <!-- contiene la tabla para darle margen --> --}}

    <!-- tabla -->
    @php
      $numorden = ($otros->currentpage()-1)* $otros->perpage();
    @endphp
    <table id="tabla-listado" class="table table-sm table-responsive table-striped">
      {{-- <thead style="background:#F2D333"> --}}
        <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Apellido</th>
          <th scope="col">Nombre</th>
          <th scope="col">Fecha</th>
          <th scope="col">CUIL/CUIT</th>
          <th scope="col">Celular</th>
          <th scope="col">Email</th>
          <th scope="col">Breve CV</th>
          <th scope="col">Día 1</th>
          <th scope="col">Día 2</th>
          <th scope="col">Exp.</th>
          {{-- <th scope="col">Exp.</th> --}}
          <th scope="col">Rob.</th>
          <th scope="col">Prog.</th>
          <th scope="col">Foto</th>
          <th scope="col">Contacto</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($otros as $otro)
          @php
            $numorden++;
          @endphp
        <tr>

          <th scope="row">{{ $numorden }}</th>
          <td>{{$otro["apellido"]}}</td>
          <td>{{$otro["nombre"]}}</td>
          <td>{{$otro["fecha_nac"]}}</td>
          <td>{{$otro["cuilcuit"]}}</td>
          <td>{{$otro["celular"]}}</td>
          <td><a href="mailto:{{$otro["email"]}}">{{$otro["email"]}}</a></td>
          <td>{{$otro["CV"]}}</td>
          <td>{{$otro["disp_horariaD1"]}}</td>
          <td>{{$otro["disp_horariaD2"]}}</td>
          <td>{{$otro["area_expertise1"]}}/{{$otro["area_expertise2"]}}</td>
          <td>{{$otro["exp_robotica"]}}</td>
          <td>{{$otro["exp_program"]}}</td>
          <td><a href="/storage/{{$otro["nom_foto"]}}" target="_blank"><img src="storage/{{$otro["nom_foto"]}}" width="40" height="40"></a></td>
          <td>{{$otro["contacto"]}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <!-- fin de tabla -->
    <!-- Llamar a los complementos javascript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blob-polyfill/4.0.20190430/Blob.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.6/xls.core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.2/dist/FileSaver.min.js"></script>

    <script src="/js/tableexport.min.js"></script>


  <!-- tabla para paginación -->
    <table class="table table-responsive ">
      <tbody>
        <tr>
          <th scope="row">
            {{$otros->links()}}
            <a class="btn" style="background:#f2d333; color: black;" href="/consultas" role="button">Volver a Consultas</a>
          </th>
        </tr>
      </tbody>
    </table>
  <!-- fin de tabla para paginación -->

{{-- </div><!-- fin del contenedor de la tabla --> --}}
</div><!-- fin del contenedor principal -->
</div><!-- fin del jumbotron secundario -->

  @include('segundabarranav')
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> --}}
  {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}
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
