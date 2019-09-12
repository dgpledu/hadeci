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

     <!-- CSS para editor RTF -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
     <!-- Fin de CSS para editor RTF -->

    <title>Consulta de desafíos</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
    <!-- Formulario de inscripción -->
    <!-- Cabecera -->
    <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
    <div class="card-header" style="background:#f2d333"><h5>Consulta de desafíos por código</h5></div>
    <div class="card-body">


      <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->

  <div class="alert alert-secondary w-85" role="alert">
  <form class="form-group pt-2" action="/consultaPorDesafio" method="get">
    {{ csrf_field() }}
    {{-- <input type="text" name="busqueda_desafio2" value="" placeholder="Código del desafío">
    <button type="submit" name="" class="btn btn-success">Realizar consulta</button>
     <small id="emailHelp" class="form-text text-muted">Tipee el código del desafío. Por ejemplo: <b>ART-412</b></small> --}}
     <select class="" name="busqueda_desafio">
        <option value="">Seleccionar un desafío de la lista</option>
    @if($todoslosdesafios)
       @foreach ($todoslosdesafios as $desafio)
         <option value="{{$desafio["codigo"]}}">{{$desafio["codigo"]}}: {{$desafio["nombre"]}}</option>
       @endforeach
     @endif
     </select>

     <br><br>
     <button type="submit" name="" class="btn btn-success">Mostrar datos del desafío</button>
     <small id="emailHelp" class="form-text text-muted">Se mostrará el nombre del desafío, el código, la descripción, el tutor, los grupos asignados y los integrantes de cada grupo</small>
  </form>

  @if ($des)
<!-- comienzo card -->
    <div class="card">
      <h5 class="card-header text-white bg-primary">{{$des["codigo"]}}</h5>
      <div class="card-body">


        <h5 class="card-title">{{$des["nombre"]}}</h5>
        <textarea id="summernote">
{{$des["descripcion"]}}
        </textarea>


    @foreach ($des->tutores as $tutor)
      <b>Tutor:</b> {{$tutor["Nombre"]}} {{$tutor["Apellido"]}}
      <br><br>

      @foreach ($tutor->grupos as $grupo)
        <b>Grupo:</b> {{$grupo->nombre}}
        <br><br>

        <ul>
        @foreach ($grupo->estudiantes as $estudiante)
          <li>
            {{$estudiante["nombre"]}} {{$estudiante["apellido"]}}, {{$estudiante->escuela["nombre"]}}

          </li>
        @endforeach
        </ul>

      @endforeach

    @endforeach

  @endif
</div>
</div>
<br>
<a class="btn " style="background:#f2d333; color: black;" href="/consultas" role="button">Volver a Consultas</a>
<!-- fin card -->


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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

   <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.2/dist/FileSaver.min.js"></script>

   <!-- JS y script para editor RTF -->
   <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

   <script>
   $('#summernote').summernote('disable');
   </script>
   <!-- Fin de JS y script para editor RTF -->

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
