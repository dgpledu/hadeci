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
        <p class="card-text">{{$des["descripcion"]}}</p>

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

  </body>
</html>
