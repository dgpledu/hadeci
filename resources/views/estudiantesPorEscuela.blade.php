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

    <title>Consulta de estudiantes por escuela</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
    <!-- Formulario de inscripción -->
    <!-- Cabecera -->
    <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
    <div class="card-header" style="background:#f2d333"><h5>Consulta de estudiantes por escuela</h5></div>
    <div class="card-body">


      <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->

  <div class="alert alert-secondary w-85" role="alert">
  <form class="form-group pt-2" action="" method="get">
    {{ csrf_field() }}
    <select class="" name="busqueda_escuela">
       <option value="">Seleccionar escuela de la lista</option>
       @if($escuelasactivas)
      @foreach ($escuelasactivas->sortBy('nombre') as $escuela)
        <option value="{{$escuela["nombre"]}}">{{$escuela["nombre"]}}</option>
      @endforeach
    @endif
      <small id="emailHelp" class="form-text text-muted">Seleccionar la escuela</small>
    </select>
    <br><br>
    <button type="submit" name="" class="btn btn-success">Listar estudiantes</button>
  </form>
  @if ($resultados_esc)
    <b>Escuela: </b> {{$resultados_esc["nombre"]}}<br>
<b>Cantidad de estudiantes: </b>{{count($resultados_esc->estudiantes)}}
  <hr>
    @php
      $cant_est = 0;
    @endphp
    <!-- prueba con tabla linda -->
    <!-- fin de prueba con tabla linda -->
    <table class="table table-responsive table-striped">
      <thead style="background:#F2D333">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Apellido</th>
          <th scope="col">Nombre</th>
          <th scope="col">DNI</th>
          <th scope="col">Fecha de nac.</th>
          <th scope="col">Año</th>
          <th scope="col">Restr. Alim.</th>
          <th scope="col">Docente</th>
          <!-- lo agrego como prueba -->
          <th scope="col">Grupo</th>
          <!-- fin de lo agregado como prueba -->
          <th scope="col">Nombre adulto</th>
          <th scope="col">Apellido adulto</th>
          <th scope="col">Teléfono adulto</th>
        </tr>
      </thead>
      <tbody>
 @foreach ($resultados_esc->estudiantes->sortBy('apellido') as $estudiante)
      @php
        $cant_est++;
    @endphp
      <tr>
        <th scope="row">{{ $cant_est }}</th>
        <td>{{$estudiante["apellido"]}}</td>
        <td>{{$estudiante["nombre"]}}</td>
        <td>{{$estudiante["DNI"]}}</td>
        <td>{{$estudiante["fecha_nac"]}}</td>
        <td>{{$estudiante["anio_cursa"]}}</td>
        <td>{{$estudiante["restric_alim"]}}</td>
        <td>{{$estudiante->docente["apellido"]}}</td>
        <!-- lo agrego como prueba -->
        <td>{{$estudiante->grupo["nombre"]}}</td>
        <!-- fin de lo agregado como prueba -->
        <td>{{$estudiante["nom_padre"]}}</td>
        <td>{{$estudiante["ape_padre"]}}</td>
        <td>{{$estudiante["telefono_padre"]}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
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
