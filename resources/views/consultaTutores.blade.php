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

    <title>Consulta de tutores</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333"><h5>Consulta de tutores</h5></div>
  <div class="card-body">
    <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->

<div class="alert alert-secondary w-85" role="alert">
  <form class="form-group pt-2" action="" method="get">
    {{ csrf_field() }}
<select class="" name="busqueda_tutor">
   <option value="">Seleccionar un tutor de la lista</option>
   @if($todoslostutores)
  @foreach ($todoslostutores->sortBy('Apellido') as $tutor)
    <option value="{{$tutor["ID"]}}">{{$tutor["Nombre"]}} {{$tutor["Apellido"]}}</option>
  @endforeach
@endif
  <small id="emailHelp" class="form-text text-muted">Seleccionar el tutor</small>
</select>
<br><br>
<button type="submit" name="" class="btn btn-success">Listar grupos y su desafío</button>
</form>

@if ($resultados_tutor)
<b>Tutor:</b> {{$resultados_tutor["Apellido"]}}, {{$resultados_tutor["Nombre"]}} | <b>DNI: </b> {{$resultados_tutor["DNI"]}} | <b>E-mail: </b> {{$resultados_tutor["email"]}}<br>
<hr>
<h5 class="card-title text-success">Grupos a cargo</h5>
@foreach ($resultados_tutor->grupos as $grupo)
<b>{{$grupo["nombre"]}}: </b>
<b>{{$resultados_tutor->desafio["nombre"]}}</b><br><br>
<ul>
@foreach ($grupo->estudiantes->sortBy('apellido') as $estudiante)
  <li>
    {{$estudiante["apellido"]}}, {{$estudiante["nombre"]}} | {{$estudiante->escuela["nombre"]}}
  </li>
@endforeach
</ul>
@endforeach
@endif
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
