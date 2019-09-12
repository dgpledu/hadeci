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

    <title>Editar tutores</title>
  </head>
  <body>
  @include('primerabarranav')
  <!--- prueba para ver si muestra el mensaje exitoso de registro -->
  {{-- @if (session('estado'))
       <div class="alert alert-success">
  <h5><img src="/imgs/tilde-correcto-4.png" style="width:40px; height:40px;" alt="borrado">

          <b> {{session('estado')}} </b>
          ha sido borrado como <b>tutor</b> en "Desafíos Científicos".
  </h5>
       </div>
   @endif --}}

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
    <h4>Listado de tutores para editar
{{-- <span class="badge badge-primary badge-pill">{{count($todoslostutores)}}</span> --}}
</h4>
<h5>

  {{-- <form method="POST" action="{{ route('actualizarTutor',$tutorAEditar["ID"]) }}"  role="form"> --}}
<form method="POST" action="/indiceTutores"  role="form">
      {{ csrf_field() }}
      <input type="hidden" name="ID" value={{$tutor["ID"]}}>
          <div class="form-group">
            <label for="nombre_tutor">Nombre:</label>
            <input type="text" class="form-control" name="Nombre" value="{{$tutor["Nombre"]}}" />
          </div>
          <div class="form-group">
            <label for="apellido_tutor">Apellido:</label>
            <input type="text" class="form-control" name="Apellido" value="{{$tutor["Apellido"]}}" />
          </div>
          <div class="form-group">
            <label for="celular_tutor">Celular:</label>
            <input type="text" class="form-control" name="Celular" value="{{$tutor["Celular"]}}" />
          </div>
          <div class="form-group">
            <label for="DNI_tutor">DNI:</label>
            <input type="text" class="form-control" name="DNI" value="{{$tutor["DNI"] }}" />
          </div>
          <div class="form-group">
            <label for="email_tutor">E-mail:</label>
            <input type="text" class="form-control" name="email" value="{{$tutor["email"] }}" />
          </div>
          <div class="form-group">
            <label for="instit_rep_tutor">Institución:</label>
            <input type="text" class="form-control" name="instit_rep" value="{{$tutor["instit_rep"]}}" />
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
