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
    <title>Asignar desafío a tutores</title>
  </head>
  <body>
  @include('primerabarranav')

<!-- Mensaje de asignación exitosa -->
  @if (session('eltutor'))
       <div class="alert alert-success">
  <h5><img src="/imgs/tilde-correcto-4.png" style="width:40px; height:40px;" alt="aprobado">
          El desafío <b>{{session('eldesafio')}}</b>, código <b>{{session('elcodigo')}}</b>, fue asignado correctamente al tutor <b>{{session('eltutor')}}</b>.
  </h5>
       </div>
   @endif
   <!-- Fin de mensaje de asignación exitosa -->

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
    <!-- Formulario de inscripción -->
    <!-- Cabecera -->
    <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
    <div class="card-header" style="background:#f2d333"><h5>Asignación de desafíos a tutores</h5></div>
    <div class="card-body">

      <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->

  <div class="alert alert-secondary w-85" role="alert">
  <form class="form-group pt-2" action="/asignarDesafioATutores" method="get">
    {{ csrf_field() }}

     <select class="" name="busqueda_desafio" id="lista_de_desafios">
        <option value="">Seleccionar un desafío de la lista</option>
    @if($todoslosdesafios)
       @foreach ($todoslosdesafios as $desafio)
         <option value="{{$desafio["ID"]}}">{{$desafio["codigo"]}}: {{$desafio["nombre"]}}</option>
       @endforeach
     @endif
     </select>

     {{-- <button type="submit" class="btn btn-success" name="btn_mostrar_desafio">Mostrar datos del desafío</button> --}}
     <input type="submit" name="btn_mostrar_desafio" style="color: transparent; background-color: transparent; border-color: transparent; cursor: default;">
     {{-- <small id="emailHelp" class="form-text text-muted">Se mostrará el nombre del desafío, el código y la descripción.</small> --}}
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
  @endif

</div></div>
<br>
<!-- Formulario para asignar el desafío al tutor -->
<form class="" action="" method="POST">
  {{csrf_field()}}
    <select class="" name="ID_tutor">
      <option value="">Seleccionar un tutor de la lista</option>
        @if($todoslostutoress)
          @foreach ($todoslostutoress as $tutor)
            <option value ="{{$tutor["ID"]}}">{{$tutor["Apellido"]}}, {{$tutor["Nombre"]}}</option>
          @endforeach
        @endif
    </select>
      <button type="submit" class="btn btn-primary">Asignar el desafío al tutor</button>
      <small id="emailHelp" class="form-text text-muted">Se asignará el desafío a dicho tutor.</small>
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

<!-- Script para que se dispare solo el botón "Mostrar desafío" -->
<script>
    $('#lista_de_desafios').on('change', function(){
    $("[name='btn_mostrar_desafio']:submit").trigger("click");
});
</script>
<!-- Fin del script para que se dispare solo el botón "Mostrar desafío" -->

  </body>
</html>
