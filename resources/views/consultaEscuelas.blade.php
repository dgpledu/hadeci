<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Consulta de escuelas participantes</title>
  </head>
  <body>
    <!-- Primera barra de navegación  -->
  @include('primerabarranav')

  <div class="jumbotron jumbotron-confondo jumbotron-fluid container-fluid">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333"><h5>Consulta de datos de escuelas participantes</h5></div>
  <div class="card-body">


    <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->

<div class="alert alert-secondary w-85" role="alert">
  <form class="form-group pt-2" action="" method="get">
    {{ csrf_field() }}
    <input type="text" name="busqueda_escuela" value="" placeholder="Nombre de la escuela">
    <button type="submit" name="" class="btn btn-success">Realizar consulta</button>
    <small id="emailHelp" class="form-text text-muted">Tipee parte del nombre de la escuela participante o deje vacío el campo para listar <b>todas</b> las escuelas participantes</small>
  </form>

@if ($resultados_esc)
<p><i>Cantidad de escuelas encontradas:</i>
  @php
    echo count($resultados_esc);
  @endphp
</p>
@endif

@foreach ($resultados_esc as $escuela)
  <b>Nombre: </b> {{$escuela["nombre"]}} <br>
  <b>ID: </b>{{$escuela["ID"]}}<br>
  <b>CUE: </b>{{$escuela["CUE"]}}<br>
  <b>Dirección: </b>{{$escuela["direccion"]}}<br>
<b>Teléfono: </b>{{$escuela["telefono"]}}<br>
  =============================================<br>
@endforeach

<a class="btn " style="background:#f2d333; color: black;" href="/consultas" role="button">Volver a Consultas</a>

</div>
</div>
  @include('segundabarranav')
  </body>
</html>
