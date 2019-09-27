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

    <title>Armado de grupos</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333">
    <h4>Armado de grupos</h4>
    <div class="row">
    <!-- Seleccionar temática como 1ª opción-->
    <div class="col sm-4">
    <form action="" method="post">
      {{ csrf_field() }}
    <label>1ª opción:</label>
         <select class="" name="ID_categoria_tematica1" id="menu_de_tematicas1">
            <option value="">Seleccionar una temática</option>
             <option value="1">Ciencias Espaciales</option>
              <option value="2">Ciencias de la Vida</option>
             <option value="3">Gestión Territorial y Urbana</option>
             <option value="4">Ciencia y Arte</option>
             <option value="5">Cualquiera</option>
         </select>
    <!-- Fin de seleccionar temática para el desafío -->
    <button type="submit" class="btn btn-primary">Consultar</button>
  </form>
  </div>

  <!-- Seleccionar temática 2ª opción-->
  <div class="col sm-4">
  <form action="" method="post">
    {{ csrf_field() }}
  <label>2ª opción:</label>
       <select class="" name="ID_categoria_tematica2" id="menu_de_tematicas2">
          <option value="">Seleccionar una temática</option>
           <option value="1">Ciencias Espaciales</option>
            <option value="2">Ciencias de la Vida</option>
           <option value="3">Gestión Territorial y Urbana</option>
           <option value="4">Ciencia y Arte</option>
           <option value="5">Cualquiera</option>
       </select>
  <!-- Fin de seleccionar temática para el desafío -->
  <button type="submit" class="btn btn-primary">Consultar</button>
</form>
</div>

</div>
  </div>
  <div class="card-body">
  </div>
    <!-- tabla -->
    @php
      $numorden = 0;
    @endphp
    <table id="tabla-listado" class="table table-responsive table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Apellido</th>
          <th scope="col">Nombre</th>
          <th scope="col">DNI</th>
          <th scope="col">Escuela</th>
          <th scope="col">CT 1º</th>
          <th scope="col">CT 2º</th>
        </tr>
      </thead>
      <tbody>
        @if ($estudiantesPorTematica1raOpcion)
          {{-- @php dd($estudiantesPorTematica); @endphp --}}
          @foreach ($estudiantesPorTematica1raOpcion as $estudiante)
            @php
              $numorden++;
              @endphp
        <tr>
          <th scope="row">{{ $numorden }}</th>
          <td>{{$estudiante["apellido"]}}</td>
          <td>{{$estudiante["nombre"]}}</td>
          <td>{{$estudiante["DNI"]}}</td>
          <td>{{$estudiante->escuela["nombre"]}}</td> <!-- esto funciona porque $estudiante es de tipo estudiante -->
          <td>{{$estudiante->categoria1["alias"]}}</td>
         <td>{{$estudiante->categoria2["alias"]}}</td>
        </tr>
      @endforeach
    @endif

      @if ($estudiantesPorTematica2daOpcion)
        {{-- @php dd($estudiantesPorTematica); @endphp --}}
        @foreach ($estudiantesPorTematica2daOpcion as $estudiante)
          @php
            $numorden++;
            @endphp
      <tr>
        <th scope="row">{{ $numorden }}</th>
        <td>{{$estudiante["apellido"]}}</td>
        <td>{{$estudiante["nombre"]}}</td>
        <td>{{$estudiante["DNI"]}}</td>
        <td>{{$estudiante->escuela["nombre"]}}</td> <!-- esto funciona porque $estudiante es de tipo estudiante -->
        <td>{{$estudiante->categoria1["alias"]}}</td>
       <td>{{$estudiante->categoria2["alias"]}}</td>
      </tr>
    @endforeach
      </tbody>
    </table>
    <!-- fin de tabla -->
@endif
<!-- Zócalo de paginador -->
    {{-- <div class="container-fluid ml-3 mt-0 pt-1">
      <div class="alert alert-secondary w-85" role="alert">
        {{$estudiantes->links()}}
      </div>
    </div> --}}
    <!-- fin zócalo de paginador -->

{{-- <div class="alert alert-secondary ml-auto">
  {{$estudiantes->links()}}
</div> --}}

<table class="table table-responsive table-striped">
  <thead>
    <tr>
      {{-- <th scope="col"></th> --}}
    </tr>
  </thead>
  <tbody>
    {{-- <tr>
      <th scope="row">{{$estudiantes->links()}}<a class="btn " style="background:#f2d333; color: black;" href="/consultas" role="button">Volver a Consultas</a></th>
    </tr> --}}
  </tbody>
</table>

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
