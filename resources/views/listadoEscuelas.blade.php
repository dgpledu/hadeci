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

    <title>Listado de escuelas</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333">

    <h4>Listado de escuelas participantes</h4>

      <!-- Cartel x a y de un total de n elementos -->
      <h5>
<span class="badge badge-primary badge-pill">
  {{ $escuelasordenadas->firstItem() }}
</span>
<span class="">
  a
</span>
<span class="badge badge-primary badge-pill">
  {{ $escuelasordenadas->lastItem() }}
</span>
<span class="">
  de un total de
</span>
<span class="badge badge-primary badge-pill">
  {{ $escuelasordenadas->total() }}
</span>
<!-- Fin de cartel x a y de un total de n elementos -->

    </h5>
  </div>
  <div class="card-body">
<!-- Prueba de tabla -->
@php
  $numorden = ($escuelasordenadas->currentpage()-1)* $escuelasordenadas->perpage();
@endphp
<table class="table table-responsive table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Dirección</th>
      <th scope="col">CUE</th>
      <th scope="col">Teléfono</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($escuelasordenadas as $clave => $escuela)
      @php
        $numorden++;
      @endphp
    <tr>

      <th scope="row">{{ $numorden }}</th>
      <td>{{$escuela["nombre"]}}</td>
      <td>{{$escuela["dom_edific"]}}</td>
      <td>{{$escuela["cue"]}}</td>
      <td>{{$escuela["telefono"]}}</td>
    </tr>
  @endforeach
  </tbody>
</table>
{{$escuelasordenadas->links()}}
<!-- fin prueba de tabla -->
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
