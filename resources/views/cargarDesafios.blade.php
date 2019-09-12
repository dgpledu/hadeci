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

      <!-- CSS para editor RTF -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
      <!-- Fin de CSS para editor RTF -->

    <title>Cargar Desafíos</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
  <div class="card-header" style="background:#f2d333"><h5>Carga de Desafíos</h5></div>
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
  <h5>Datos del desafío</h5>
<!-- prueba de otro formulario más bonito -->
<form class="" action="/cargarDesafios" method="post">
  {{ csrf_field() }}
  <div class="form-row">
    <div class="form-group col-sm-4">

      <!-- Seleccionar temática para el desafío-->
      <label>Elegir la temática del desafío:</label>
           <select class="" name="codigo_desafio_alf" id="menu_de_tematicas">
              <option value="">Seleccionar una temática</option>
               <option value="D-ESP-">Ciencias Espaciales</option>
               <option value="D-GES-">Gestión Territorial y Urbana</option>
               <option value="D-VID-">Ciencias de la Vida</option>
               <option value="D-ART-">Ciencia y Arte</option>
           </select>
      <!-- Fin de seleccionar temática para el desafío -->
    </div>
</div>

  <div class="form-row">
    <div class="form-group col-sm-4">
      <input type="text" name="nombre_desafio" class="form-control" placeholder="nombre del desafío">
        <small class="form-text text-muted">Ingresar el nombre del desafío. Ej: "Plásticos perecederos"</small>
    </div>
  </div>

      <div class="form-row">
    <div class="form-group col-sm-9">
      <label for="descripcion_des">Descripción del desafío</label>

     <textarea class="form-control" id="summernote" name="descripcion_desafio" rows="3"></textarea>
   </div>
    </div>


  <!-- fin del formulario -->
  <hr>

    <div class="form-row">
    <div class="form-group col-sm-4">
  <input type="submit" class="btn btn-primary" value="Grabar desafío">

</form>
<!-- fin de formulario de inscripción -->

</div>
</div></div></div></div></div>

</div><!-- fin del jumbotron secundario -->

@include('segundabarranav')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- JS y script para editor RTF -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

    <script>
    $('#summernote').summernote('enable');
    </script>
    <!-- Fin de JS y script para editor RTF -->

  </body>
</html>
