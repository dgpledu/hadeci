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
      <!-- CSS para editor RTF -->
      <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
      <!-- Fin de CSS para editor RTF -->
    <title>Re-asignar tutor a grupos</title>
  </head>
  <body>
  @include('primerabarranav')

<!-- Mensaje de asignación exitosa -->
  @if (session('grupo_actualizado'))
       <div class="alert alert-success">
  <h5><img src="/imgs/tilde-correcto-4.png" style="width:40px; height:40px;" alt="aprobado">
          El tutor <b>{{session('tutor_reasignado')}}</b>, fue re-asignado correctamente al grupo <b>{{session('grupo_actualizado')}}</b>.
  </h5>
       </div>
   @endif
   <!-- Fin de mensaje de asignación exitosa -->

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
    <!-- Formulario de inscripción -->
    <!-- Cabecera -->
    <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
    <div class="card-header" style="background:#f2d333"><h5>Re-asignación de tutores a grupos</h5></div>
    <div class="card-body">

      <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->

  <div class="alert alert-secondary w-85" role="alert">
  <form class="form-group pt-2" action="/reasignacionTutorAGrupos" method="post">
    {{ csrf_field() }}
<!-- Seleccionar grupo -->
     <select class="" name="ID_grupo_seleccionado">
        <option value="">Seleccionar un grupo de la lista</option>
    @if($todoslosgrupos)
       @foreach ($todoslosgrupos as $grupo)
         <option value="{{$grupo["ID"]}}">{{$grupo["nombre"]}}</option>
       @endforeach
     @endif
     </select>
<!-- Fin de seleccionar grupo -->

<!-- Seleccionar tutor -->
    <select class="" name="ID_tutor_seleccionado">
      <option value="">Seleccionar un tutor de la lista</option>
        @if($todoslostutores)
          @foreach ($todoslostutores as $tutor)
            <option value ="{{$tutor["ID"]}}">{{$tutor["Apellido"]}}, {{$tutor["Nombre"]}}</option>
          @endforeach
        @endif
    </select><br><br>
      <button type="submit" class="btn btn-primary">Asignar</button>
      <small id="emailHelp" class="form-text text-muted">Se asignará al grupo elegido el tutor seleccionado.</small>
      <!-- Fin de seleccionar tutor -->
</form>
<!-- Fin del formulario para asignar el desafío al tutor -->
<!-- fin card -->


</div>
</div>
</div>

</div>
</div><!-- fin del jumbotron secundario -->

@include('segundabarranav')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- JS y script para editor RTF -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

    <script>
    $('#summernote').summernote('disable');
    </script>
    <!-- Fin de JS y script para editor RTF -->
  </body>
</html>
