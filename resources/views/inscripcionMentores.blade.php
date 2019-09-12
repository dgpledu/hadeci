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
<!-- Confirmación de inscripción -->
@if (session('estado'))
     <div class="alert alert-success">
<h5><img src="/imgs/tilde-correcto-4.png" style="width:40px; height:40px;" alt="aprobado">

        <b> {{session('estado')}} </b>
        se ha inscripto correctamente como <b>mentor</b> en "Desafíos Científicos".
        <br><br>
        <img src="/imgs/icono-mail-enviado.png" style="width:40px; height:40px;" alt="mail"> Se ha enviado un mail a <b>{{session('correo')}}</b> confirmando su inscripción desde la dirección <font color="#2E9AFE">desafios.cientificos@gmail.com</font><br> Por favor, verifique que el correo no se encuentre en la carpeta de correo no deseado o SPAM.<hr>

</h5>
     </div>

 @endif
<!-- Fin de confirmación de inscripción -->
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
{{-- <form class="" action="/inscripcionMentores" method="post"> --}}
<form class="" action="/inscripcionMentores" method="post" enctype="multipart/form-data">
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
      <input type="number" name="cuilcuit" class="form-control" placeholder="CUIL o CUIT">
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
    <input type="text" name="celular" class="form-control" placeholder="Celular de contacto">
    <small class="form-text text-muted">Ingrese solo números, ni guiones, ni paréntesis, ni espacios, sin 0 y sin 15. <br>Los organizadores lo utilizarán para ubicarlo/a en el evento.</small>
  </div>
  </div>
  <!-- Fin segunda línea del formulario -->
  <!-- Inicio tercera línea del formulario -->
  <div class="form-row">
      <div class="form-group col-sm-5">
          <input type="text" name="contacto" class="form-control" placeholder="Contacto">
          <small class="form-text text-muted">Ingrese el nombre y apellido de la persona que lo invitó a participar como mentor.</small>
      </div>
      <div class="form-group col-sm-5">
          <input type="text" name="instit_rep" class="form-control" placeholder="Institución">
          <small class="form-text text-muted">Ingrese el nombre de la institución que representa</small>
      </div>
 </div>
  <!-- Fin tercera línea del formulario -->
  <!-- Inicio cuarta línea del formulario -->
  <div class="form-row">

      <div class="form-group col-sm-5">
          <label for="TextAreaBreveCV"></label>
          <textarea placeholder="Descripción de perfil" name="breveCV" class="form-control" id="TextAreaBreveCV" rows="3"></textarea>
          <small class="form-text text-muted">Ingrese una breve descripción de su perfil laboral. Esto será de utilidad para que los estudiantes sepan sobre qué cuestiones consultarle. Tamaño máximo: 255 caracteres.</small>
        </div>

  </div>
  <!-- Fin cuarta línea del formulario -->

  <!-- Inicio sexta línea del formulario -->
  <div class="form-row">
    <div class="form-group col-sm-6">
      <input type="file" name="foto_mentor" class="form-control-file" placeholder="Foto personal">
      <small class="form-text text-muted">Suba su foto en formato JPG, JPEG, PNG. Tamaño máximo: <b>2 MB</b> (2048 KB).</small>
    </div>
  </div>

  <!-- Agregado para area de expertise y conocimientos de robótica y programación -->
  <div class="form-row">
      <div class="form-group col-sm-4">
           <select class="form-control" name="area_expertise1">
               <option value="">Seleccione área de expertise primaria</option>
               <option value="ESP">Ciencias Espaciales</option>
               <option value="VID">Ciencias de la Vida</option>
               <option value="ART">Ciencia y Arte</option>
               <option value="GES">Gestión Territorial y Urbana</option>
          </select>
      </div>
      <div class="form-group col-sm-4">
           <select class="form-control" name="area_expertise2">
               <option value="">Seleccione área de expertise secundaria</option>
               <option value="ESP">Ciencias Espaciales</option>
               <option value="VID">Ciencias de la Vida</option>
               <option value="ART">Ciencia y Arte</option>
               <option value="GES">Gestión Territorial y Urbana</option>
          </select>
      </div>
 </div>
<div class="form-row">
      <div class="form-group col-sm-4">
           <select class="form-control" name="exp_robotica">
               <option value="">¿Posee experiencia en el área de robótica?</option>
               <option value="S">Sí</option>
               <option value="N">No</option>
          </select>
      </div>

      <div class="form-group col-sm-6">
           <select class="form-control" name="exp_program">
               <option value="">¿Posee experiencia en el área de programación de software?</option>
               <option value="S">Sí</option>
               <option value="N">No</option>
          </select>
      </div>
  </div>


  <!-- Fin de área de expertise -->

<!-- Fin quinta línea del formulario -->
<hr>
<h5>Disponibilidad horaria</h5>
<h6>Complete por favor la siguiente información según su disponibilidad horaria. <br>No necesariamente tiene que venir ambos días (¡aunque sería buenísimo!)
</h6>
<div class="form-group col-sm-5">

    <input type="text" name="disp_horariaD1" class="form-control" placeholder="Disponibilidad día martes">
    <small class="form-text text-muted">Ingrese el/los horario/s del día martes 1/10 en que va a poder estar presente (Recuerde que el trabajo fuerte es sobre todo de 14 a 17hs).
</small>
</div>
<div class="form-group col-sm-5">
    <input type="text" name="disp_horariaD2" class="form-control" placeholder="Disponibilidad día miércoles">
    <small class="form-text text-muted">Ingrese el/los horario/s del día miércoles 2/10 en que va a poder estar presente (Recuerde que el trabajo fuerte es de 8:30 a 13:30hs).
</small>
</div>


    <div class="form-row">
    <div class="form-group col-sm-4">
  <input type="submit" class="btn btn-primary" value="Inscribirse">
  <small class="form-text text-muted">Al dar clic en este botón se enviarán los datos del formulario y se dará por completada su inscripción.</small>
</form>
<!-- fin de formulario de inscripción -->

</div></div></div></div></div></div></div></div>

 </div><!-- fin del jumbotron secundario -->

@include('segundabarranav')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
