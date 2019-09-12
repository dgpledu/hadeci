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

    <title>Editar docentes</title>
  </head>
  <body>
  @include('primerabarranav')
  <!--- prueba para ver si muestra el mensaje exitoso de registro -->

  <!--- fin de prueba para ver si muestra el mensaje exitoso de registro -->
 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">

  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333">
    <h4>Edición de datos del docente</h4>

<h5>
<form method="POST" action="/indiceDocentes"  role="form">
      {{ csrf_field() }}
      <input type="hidden" name="ID" value={{$docente["ID"]}}>
          <div class="form-group">
            <label for="nombre_docente">Nombre:</label>
            <input type="text" class="form-control" name="nombre" value="{{$docente["nombre"]}}" />
          </div>
          <div class="form-group">
            <label for="apellido_docente">Apellido:</label>
            <input type="text" class="form-control" name="apellido" value="{{$docente["apellido"] }}" />
          </div>
          <div class="form-group">
            <label for="DNI_docente">DNI:</label>
            <input type="text" class="form-control" name="DNI" value="{{$docente["DNI"] }}" />
          </div>
          <div class="form-group">
            <label for="email_docente">E-mail:</label>
            <input type="text" class="form-control" name="email" value="{{$docente["email"] }}" />
          </div>
          <div class="form-group">
            <label for="celular_docente">Celular:</label>
            <input type="text" class="form-control" name="celular" value="{{$docente["celular"] }}" />
          </div>

          <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
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
