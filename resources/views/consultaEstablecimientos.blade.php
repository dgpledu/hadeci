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

    <title>Consulta establecimientos oficiales</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333"><h5>Consulta de datos de establecimientos oficiales de CABA </h5></div>

  <div class="card-body">


    <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->

<div class="alert alert-secondary w-85" role="alert">
  <form class="form-group pt-2" action="" method="get">
    {{ csrf_field() }}
<h6> <span class="text-black"> <b>IMPORTANTE:</b> </span> <span class="text-secondary">Consulte aquí para conocer el <kbd style="background:#5cb85c">ID</kbd> de su escuela: Dicho dato le será requerido para inscribirse como docente. Si su escuela no está dentro de la base de datos, por favor envíe un mail a <a href="mailto:desafios.cientificos@bue.edu.ar">desafios.cientificos@bue.edu.ar</a> </span> </h6><br>
    <input type="text" name="busqueda_establecimiento" value="" placeholder="Nombre o parte del nombre del establecimiento" style="width: 355px; height: 40px;">
    <button type="submit" name="" class="btn btn-success">Realizar consulta</button>
    <small id="emailHelp" class="form-text text-muted"><span style="color:red">ATENCIÓN:</span> Tipear <b>parte</b> del nombre de la escuela (una palabra entera del nombre, por ejemplo, si se busca el colegio "Mariano Moreno", tipear "Moreno", sin las comillas) y luega dar clic en "Realizar consulta" para conocer los datos de su escuela (incluido el ID). Tomar nota del ID de su escuela, el cual le será requerido para inscribirse como docente. Luego de visualizar el ID de la escuela, puede volver a la pestaña anterior para continuar con su inscripción.</small>
  </form>

@if ($resultados_e)
  <p><i>Cantidad de escuelas encontradas:</i>
    @php
      echo count($resultados_e);
    @endphp
  </p>

<hr>
@foreach ($resultados_e->sortBy('nombre') as $establecimiento)
  <h5>Nombre: {{$establecimiento["nombre"]}}</h5>
  <h5><kbd style="background:#5cb85c">ID: {{$establecimiento["ID"]}}</kbd></h5>
  <b>CUE: </b>{{$establecimiento["cue"]}}<br>
  <b>Dirección: </b>{{$establecimiento["dom_edific"]}}<br>
  <b>Distrito escolar: </b>{{$establecimiento["de"]}}<br>
  <b>Comuna: </b>{{$establecimiento["comunas"]}}<br>
  <b>Barrio: </b>{{$establecimiento["barrio"]}}<br>
  <b>Tipo de establecimiento: </b>{{$establecimiento["tipoesta"]}}<br>
  <hr>
@endforeach
@endif
</div>
</div>

<a class="btn " style="background:#f2d333; color: black;" href="/consultas" role="button">Volver a Consultas</a>

</div></div>
</div><!-- fin del jumbotron secundario -->

@include('segundabarranav')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
