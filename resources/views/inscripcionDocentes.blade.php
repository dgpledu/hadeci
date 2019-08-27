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

    <title>Inscripción de docentes</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333"><h5>Formulario de inscripción de docentes</h5><span><img src="/img/alert-icon.png" "height=40 width=40" <h6><b>IMPORTANTE:</b> En caso de que usted necesite registrar estudiantes de diferentes escuelas, luego de completar el siguiente formulario deberá volver a inscribirse como docente asociado a otra escuela. Sin embargo, en esta segunda inscripción solo deberá ingresar como datos su <b>nombre</b> y <b>apellido</b>, su <b>DNI</b> y el <b>ID</b> de la nueva escuela.</span></h6> </div>

  <div class="card-body">
    <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->

<!-- para mostrarle el mensaje de inscripción exitosa -->

     @if (session('estado'))
          <div class="alert alert-success">
<h5 ><img src="/imgs/tilde-correcto-4.png" style="width:40px; height:40px;" alt="aprobado">

             <b> {{session('estado')}}, </b>
             docente de la escuela <b>{{session('escuela')}}</b> se ha inscripto correctamente en "Desafíos Científicos".
             <br><br>
             <img src="/imgs/icono-mail-enviado.png" style="width:40px; height:40px;" alt="mail"> Se ha enviado un mail a <b>{{session('correo')}}</b> confirmando su inscripción desde la dirección <font color="#2E9AFE">desafios.cientificos@gmail.com</font><br> Por favor, verifique que el correo no se encuentre en la carpeta de correo no deseado o SPAM.

             <!-- prueba de botón para dirigir a inscripción de estudiantes -->
             {{-- <hr>
             Si desea inscribir ahora a sus estudiantes, haga clic en el botón siguiente: <a class="btn btn-success" href="/preinscripcionEstudiantes" role="button">Inscribir estudiantes</a> --}}
             <!-- fin prueba de botón  -->
             </h5>
          </div>

      @endif
<!-- fin del mensaje de exitoso -->

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
<form class="" action="/inscripcionDocentes" method="post">
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
      <input type="text" name="dni_docente" class="form-control" placeholder="DNI">
        <small class="form-text text-muted">Ingrese su DNI sin puntos ni espacios</small>
    </div>
  </div>
  <!-- fin de la primera línea del formulario -->
  <!-- Inicio segunda línea del formulario -->
  <div class="form-row">
    <div class="form-group col-sm-5">
      <input type="email" name="email_docente" class="form-control" placeholder="E-mail">
        <small class="form-text text-muted">Ingrese su email</small>
    </div>
  <div class="form-group col-sm-3">
    <input type="date" name="fecha_nac_docente" class="form-control" placeholder="Fecha de nacimiento">
      <small class="form-text text-muted">Ingrese su fecha de nacimiento</small>
  </div>
  <div class="form-group col-sm-3">
    <input type="text" name="celular" class="form-control" placeholder="Celular">
    <small class="form-text text-muted">Ingrese su celular de contacto sin 0 y sin 15 (lo utilizaremos solo para localizarlo dentro del evento)</small>
  </div>
  </div>
  <!-- fin de la segunda línea del formulario -->
  <!-- Inicio tercera línea del formulario -->
  <div class="form-inline">
<div class="form-group col-sm-6">

      <select class="form-control" name="restric_alim">
        {{-- <option value="No" selected>Si posee alguna restricción alimentaria, selecciónela haciendo clic acá</option> --}}
<option value="" selected>¿Posee alguna restricción alimentaria? (obligatorio)</option>
        <option>No</option>
        <option>Celiaquía</option>
        <option>Veganismo</option>
        <option>Vegetarianismo</option>
        <option>Fenilcetonuria</option>
        <option>Otra</option>
      </select>
      <small class="form-text text-muted">Si selecciona la opción "Otra", por favor envíe un mail a <a href="mailto:desafios.cientificos@bue.edu.ar">desafios.cientificos@bue.edu.ar</a> detallando su nombre y apellido y en qué consiste dicha restricción alimentaria.
      </small>
    </div>

<!-- Como estaba originalmente -->
    <div class="form-group col-sm-6">
<label for="id_escuela" >ID:&nbsp;</label>
      <input type="text" name="id_escuela" class="form-control" placeholder="ID de su escuela">
      <small class="form-text text-muted">Ingrese el ID de su escuela (solamente el número). Si no conoce el número de ID de su escuela para este hackatón, haga clic


<kbd style="background-color:#b2b4b7";><a href="/consultaEstablecimientos" target="_blank" style="color:#0066CC"; >aquí</a></kbd>

        para consultarlo (se abrirá una nueva pestaña) y luego vuelva aquí para finalizar su inscripción.</small>
    </div>
  <!-- fin de la tercera línea del formulario -->

<!-- Fin de carga de datos  -->
</div> <!--- este div lo agregué de prueba para cerrar el inline -->
<br>
    <div class="form-row">
    <div class="form-group col-sm-4">
  <input type="submit" class="btn btn-primary" value="Inscribirse">
  <small class="form-text text-muted">Al dar clic en este botón se enviarán los datos del formulario y se dará por completada su inscripción.</small>
</form>
<!-- fin de formulario de inscripción -->

</div>
</div>
</div>
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
