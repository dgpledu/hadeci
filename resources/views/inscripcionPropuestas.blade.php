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

    <title>Inscripción de propuestas para People's Choice</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>

  <div class="card-header" style="background:#f2d333"><h5>Formulario de inscripción de propuestas</h5></div>
  <div class="card-body">
    <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->

      @if (session('estado'))
          <div class="alert alert-success">
<h5 ><img src="/imgs/tilde-correcto-4.png" style="width:40px; height:40px;" alt="aprobado">
La propuesta
            <b> {{ session('estado') }} </b>
             ha sido inscripta exitosamente!</h5>
          </div>
      @endif

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

<h6><span class="text-body"><b>INSTRUCTIVO:</b></span><span class="text-secondary"> A continuación podrá cargar los datos de la propuesta. </span> </h6>

<hr>

      <h5>Datos de la propuesta</h5>
      <!-- inicio del formulario -->
      <form class="" action="/inscripcionPropuestas" method="post">
        {{ csrf_field() }}
        <!-- Primera línea del formulario -->
        <div class="form-row">
          <div class="form-group col-sm-4">
            <input type="text" name="nombre_coord" class="form-control" placeholder="Nombre y apellido">
            <small class="form-text text-muted">Ingrese su nombre y apellido</small>
          </div>
          <div class="form-group col-sm-8">
            <input type="text" name="nom_propuesta" class="form-control" placeholder="Nombre de la propuesta">
            <small class="form-text text-muted">Ingrese el nombre de la propuesta. <u>Ej:</u><i> Biodigestor alimentado por margaritas</i></small>
          </div>
        </div>
        <!-- Segunda línea del formulario -->
        <div class="form-row">

          {{-- <div class="form-group col-sm-4.5">
            <input type="text" name="descrip_propuesta" class="form-control" placeholder="Descripción">
              <small class="form-text text-muted">Ingrese la descripción de la propuesta</small>
          </div> --}}


          <div class="form-group col-sm-9">
              <label for="TextAreaDescripProp"></label>
              <textarea placeholder="Descripción de la propuesta" name="descrip_propuesta" class="form-control" id="TextAreaDescripProp" rows="3"></textarea>
              <small class="form-text text-muted">Ingrese la descripción de su propuesta. Tamaño máximo: 255 caracteres.</small>
            </div>

  </div>

          <div class="form-group col-sm-3">
            <input type="text" name="codigo" class="form-control" placeholder="Código de validación">
              <small class="form-text text-muted">Ingrese el código que le proporcionó el tutor del grupo</small>
          </div>

        <!-- fin de la primera línea del formulario -->
        <!-- Inicio segunda línea del formulario -->
        {{-- <div class="form-row">
          <div class="form-group col-sm-5">
            <input type="number" name="ID_grupo" class="form-control" placeholder="ID_grupo">
              <small class="form-text text-muted">Ingrese el ID del grupo</small>
          </div>
        </div> --}}
        <div class="form-group col-sm-6">
          <select class="form-control" name="ID_grupo">
            <option value="">¿Cuál es el grupo que presenta esta propuesta?</option>
            <option value="ESP-01">ESP-01</option>
            <option value="ESP-02">ESP-02</option>
            <option value="ESP-03">ESP-03</option>
            <option value="ESP-04">ESP-04</option>
            <option value="ESP-05">ESP-05</option>
            <option value="ESP-06">ESP-06</option>
            <option value="ESP-07">ESP-07</option>
            <option value="ESP-08">ESP-08</option>
            <option value="ESP-09">ESP-09</option>
            <option value="ESP-10">ESP-10</option>
            <option value="ESP-11">ESP-11</option>
            <option value="ESP-12">ESP-12</option>
            <option value="ESP-13">ESP-13</option>
            <option value="ESP-14">ESP-14</option>
            <option value="ESP-15">ESP-15</option>
            <option value="ESP-16">ESP-16</option>
            <option value="ESP-17">ESP-17</option>
            <option value="ESP-18">ESP-18</option>
            <option value="ESP-19">ESP-19</option>
            <option value="ESP-20">ESP-20</option>
            <option value="#" disabled>-------</option>
            <option value="VID-01">VID-01</option>
            <option value="VID-02">VID-02</option>
            <option value="VID-03">VID-03</option>
            <option value="VID-04">VID-04</option>
            <option value="VID-05">VID-05</option>
            <option value="VID-06">VID-06</option>
            <option value="VID-07">VID-07</option>
            <option value="VID-08">VID-08</option>
            <option value="VID-09">VID-09</option>
            <option value="VID-10">VID-10</option>
            <option value="VID-11">VID-11</option>
            <option value="VID-12">VID-12</option>
            <option value="VID-13">VID-13</option>
            <option value="VID-14">VID-14</option>
            <option value="VID-15">VID-15</option>
            <option value="VID-16">VID-16</option>
            <option value="VID-17">VID-17</option>
            <option value="VID-18">VID-18</option>
            <option value="VID-19">VID-19</option>
            <option value="VID-20">VID-20</option>
            <option value="#" disabled>-------</option>
            <option value="ART-01">ART-01</option>
            <option value="ART-02">ART-02</option>
            <option value="ART-03">ART-03</option>
            <option value="ART-04">ART-04</option>
            <option value="ART-05">ART-05</option>
            <option value="ART-06">ART-06</option>
            <option value="ART-07">ART-07</option>
            <option value="ART-08">ART-08</option>
            <option value="ART-09">ART-09</option>
            <option value="ART-10">ART-10</option>
            <option value="ART-11">ARTP-11</option>
            <option value="ART-12">ART-12</option>
            <option value="ART-13">ART-13</option>
            <option value="ART-14">ART-14</option>
            <option value="ART-15">ART-15</option>
            <option value="ART-16">ART-16</option>
            <option value="ART-17">ART-17</option>
            <option value="ART-18">ART-18</option>
            <option value="ART-19">ART-19</option>
            <option value="ART-20">ART-20</option>
            <option value="#" disabled>-------</option>
            <option value="GES-01">GES-01</option>
            <option value="GES-02">GES-02</option>
            <option value="GES-03">GES-03</option>
            <option value="GES-04">GES-04</option>
            <option value="GES-05">GES-05</option>
            <option value="GES-06">GES-06</option>
            <option value="GES-07">GES-07</option>
            <option value="GES-08">GES-08</option>
            <option value="GES-09">GES-09</option>
            <option value="GES-10">GES-10</option>
            <option value="GES-11">GES-11</option>
            <option value="GES-12">GES-12</option>
            <option value="GES-13">GES-13</option>
            <option value="GES-14">GES-14</option>
            <option value="GES-15">GES-15</option>
            <option value="GES-16">GES-16</option>
            <option value="GES-17">GES-17</option>
            <option value="GES-18">GES-18</option>
            <option value="GES-19">GES-19</option>
            <option value="GES-20">GES-20</option>
          </select>
          <small class="form-text text-muted">Seleccionar el grupo. Consultar con el tutor si no están seguros.</small>
        </div>
<hr>
      <!-- Fin de carga de datos  -->

      <br>
          <div class="form-row">
          <div class="form-group col-sm-4">
        <input type="submit" class="btn btn-primary" value="Inscribir Propuesta">
        <small class="form-text text-muted">Al dar clic en este botón se enviarán los datos del formulario y se dará por completado el envío de la propuesta.</small>
      </div>
      </form>       </div> </div>  </div>      </div>       </div>
      <!-- fin de formulario de inscripción -->






<!-- fin de formulario de carga de la propuesta -->



 <!-- Cierre 3er form -->


</div><!-- fin del jumbotron secundario -->

@include('segundabarranav')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
