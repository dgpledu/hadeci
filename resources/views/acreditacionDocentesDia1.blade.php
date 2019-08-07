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

    <title>Acreditación docentes</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333"><h5>Acreditación de docentes</h5></div>
  <div class="card-body">

    <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->
<!-- prueba para confirmar que está presente -->
      @if (session('estado'))
           <div class="alert alert-success">
      <h5><img src="/imgs/tilde-correcto-4.png" style="width:40px; height:40px;" alt="aprobado">

              <b> {{session('estado')}} </b>
              ha confirmado su presencia en el día de la fecha.
      </h5>
           </div>
       @endif
      <!-- Fin de prueba para confirmar que está presente -->

<div class="alert alert-secondary w-85" role="alert">
  <form class="form-group pt-2" action="" method="get">
    {{-- {{ csrf_field() }} --}}
    <input class="form-control-lg col-lg-4" type="text" name="busqueda_DNI_docente" value="" placeholder="DNI del docente">
    <button type="submit" name="" class="btn btn-success">Realizar consulta</button>
    <small id="emailHelp" class="form-text text-muted">Tipee el DNI completo del docente a acreditar.</small>
  </form>
  <!-- Prueba de ficha -->

  @if ($resultados_d)
        @foreach ($resultados_d->sortBy('apellido') as $docente)
              <div class="card">
                  <div class="card-header" style="background:#F2D333">
                      {{$docente["apellido"]}}, {{$docente["nombre"]}}
                  </div>

                  <div class="card-body">
                    <h5 class="card-title">DNI: {{$docente["DNI"]}}</h5>
                    <p class="card-text">Escuela: {{$docente->escuela["nombre"]}}</p>
                    <p class="card-text">E-mail: {{$docente["email"]}}</p>
                        <form class="" method="post">
                          {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" name="presente" value="Acreditarse">
                        </form>
                  </div>
              </div>
                      <br>
          @endforeach
   @endif

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
