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

    <title>Inscripción de mentores</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333"><h5>Formulario de inscripción de mentores</h5></div>
  <div class="card-body">
    <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->

<div class="alert alert-secondary w-85" role="alert">
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <h5>Datos personales</h5>
<!-- prueba de otro formulario más bonito -->
<form class="" action="/inscripcionMentores" method="post">
  {{ csrf_field() }}
  <div class="form-row">
    <div class="form-group col-sm-4.5">
      <input type="text" name="nombre" class="form-control" placeholder="Nombre">
      <small class="form-text text-muted">Ingrese su nombre tal como figura en su DNI</small>
    </div>
    <div class="form-group col-sm-4.5">
      <input type="text" name="apellido" class="form-control" placeholder="Apellido">
        <small class="form-text text-muted">Ingrese su apellido tal como figura en su DNI</small>
    </div>
    <div class="form-group col-sm-3">
      <input type="number" name="cuilcuit" class="form-control" placeholder="DNI">
        <small class="form-text text-muted">Ingrese su CUIL o CUIT sin puntos ni espacios</small>
    </div>
  </div>
  <!-- fin de la primera línea del formulario -->
  <!-- Inicio segunda línea del formulario -->
  <div class="form-row">
    <div class="form-group col-sm-4">
      <input type="email" name="email" class="form-control" placeholder="E-mail">
        <small class="form-text text-muted">Ingrese su email</small>
    </div>
  <div class="form-group col-sm-2.5">
    <input type="date" name="fecha_nac" class="form-control" placeholder="Fecha de nacimiento del/la estudiante">
      <small class="form-text text-muted">Ingrese su fecha de nacimiento</small>
  </div>
  <div class="form-group col-sm-2.5">
    <input type="text" name="celular" class="form-control" placeholder="celular">
    <small class="form-text text-muted">Ingrese un teléfono de contacto (preferentemente su número de celular)</small>
  </div>
  <div class="form-group col-sm-3">
    <input type="text" name="instit_rep" class="form-control" placeholder="Institución">
    <small class="form-text text-muted">Ingrese el nombre de la institución que representa</small>
  </div>
  </div>
  <!-- fin de la segunda línea del formulario -->
  <!-- Inicio tercera línea del formulario -->
  <div class="form-row">
    <div class="form-group col-sm-6">
      <input type="file" name="foto_mentor" class="form-control" placeholder="Foto personal">
      <small class="form-text text-muted">Suba su foto en formato JPG, PNG, GIF, BMP o SVG. El archivo debe ser menor a 6 Mb.</small>
    </div>
    <div>
    {{-- <div class="form-group col-sm-6">
      <select class="form-control" name="restric_alim">
      <option value="No" selected>Si posee alguna restricción alimentaria, selecciónela haciendo clic acá</option>
<option>No</option>
        <option>Celiaquía</option>
        <option>Veganismo</option>
        <option>Vegetarianismo</option>
        <option>Fenilcetonuria</option>
        <option>Otra</option>
      </select>
      <small class="form-text text-muted">Si selecciona la opción "Otra", por favor envíe un mail a <a href="mailto:desafios.cientificos@bue.edu.ar">desafios.cientificos@bue.edu.ar</a> detallando en qué consiste dicha restricción alimentaria.
      </small>
    </div> --}}

  <!-- fin de la tercera línea del formulario -->



<!-- Fin de carga de datos del estudiante -->
<hr>
      {{-- <div class="form-group col-sm-4" name="escuela">
        <select class="form-control" name="escuela">
          <option selected>Elegir escuela...</option>
          {{-- <option value="{{$escuelaAnterior}}">{{$escuelaAnterior}}</option> --}}
          {{-- @foreach ($escuelas as $escuela)
            <option value="{{$escuela->ID}}">
              {{$escuela->nombre}}
            </option>
          @endforeach
        </select>
        <small class="form-text text-muted">Seleccionar la escuela a la cual concurre el/la estudiante</small>
    </div> --}}
    <div class="form-row">
    <div class="form-group col-sm-4">
  <input type="submit" class="btn btn-primary" value="Inscribirse">
  <small class="form-text text-muted">Al dar clic en este botón se enviarán los datos del formulario y se dará por completada su inscripción.</small>
</form>
<!-- fin de formulario de inscripción -->

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
