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

    <title>Acreditación de estudiantes</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="col-sm-9 mx-auto">
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333"><h5>Acreditación de estudiantes Día 2</h5></div>
  <div class="card-body">
    {{-- <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo --> --}}

<div class="alert alert-secondary w-85" role="alert">
  <form class="form-group pt-2" action="" method="get">
    {{ csrf_field() }}
    <input type="text" name="busqueda_DNI_docente" value="" placeholder="DNI del docente">
    <button type="submit" name="" class="btn btn-success">Listar estudiantes</button>
<small id="emailHelp" class="form-text text-muted">
  <ol>
    <li>Tipee el DNI del docente registrante sin puntos ni espacios (por ejemplo, <b>11111111</b>)</li>
    <li>Haga clic o toque en <kbd style="background-color: #808080";>Listar estudiantes</kbd> para ver el listado de sus estudiantes</li>
    <li>Marque la casilla de aquellos estudiantes que está acreditando en este momento</li>
    <li>Una vez que visualice el listado de sus estudiantes haga clic en <kbd style="background-color: #808080";>Confirmar asistencia</kbd></li>
  </ol>
</small>
  </form>
  <hr>


@if ($resultados_d)
    <b>Docente:</b> {{$resultados_d["apellido"]}} , {{$resultados_d["nombre"]}}<br>
    <b>DNI:</b> {{$resultados_d["DNI"]}}<br>
        @php
          $cant_est = 0;
        @endphp
    <br>
    <form class="" action="/estudiantesAcreditadosDia2" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="dnidocente" value="{{$resultados_d["DNI"]}}">

    <table class="table table-responsive table-striped ">
      <thead style="background:#F2D333">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Apellido</th>
          <th scope="col">Nombre</th>
          <th scope="col">DNI</th>
          <th scope="col">Escuela</th>
          <!-- agregado para mostrar grupo -->
          <th scope="col">Grupo</th>
          <th scope="col">Tutor</th>
          <!-- fin de agregado para mostrar grupo -->
          <th scope="col">¿Acreditado?</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($resultados_d->estudiantes as $estudiante)
          @php
            $cant_est++;
          @endphp
        <tr>
          <th scope="row">{{ $cant_est }}</th>
          <td>{{$estudiante["apellido"]}}</td>
          <td>{{$estudiante["nombre"]}}</td>
          <td>{{$estudiante["DNI"]}}</td>
          <td>{{$estudiante->escuela["nombre"]}}</td>
          <!-- agregado para mostrar grupo -->
          <td>{{$estudiante->grupo["nombre"]}}</td>
          <td>{{$estudiante->grupo->tutor["Nombre"]}}
{{$estudiante->grupo->tutor["Apellido"]}}
          </td>
          <!-- fin de agregado para mostrar grupo -->
          <td>
           @if ($estudiante["pres_dia2"] == 1)
               <input type="checkbox" checked name="presente[]" value="{{$estudiante["DNI"]}}" >
               <br>
            @else
               <input type="checkbox" name="presente[]" value="{{$estudiante["DNI"]}}" ><br>
            @endif

          </td>
        </tr>
  @endforeach
      </tbody>
    </table>
      <input type="submit" class="btn btn-primary" value="Confirmar asistencia">
    @endif

  </form>
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
