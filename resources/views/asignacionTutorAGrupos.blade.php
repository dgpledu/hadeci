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
    <title>Asignar tutor a grupos</title>
  </head>
  <body>
  @include('primerabarranav')

<!-- Mensaje de asignación exitosa -->
  @if (session('grupo_asignado'))
       <div class="alert alert-success">
  <h5><img src="/imgs/tilde-correcto-4.png" style="width:40px; height:40px;" alt="aprobado">
          El tutor <b>{{session('tutor_asignado')}}</b>, fue asignado correctamente al grupo <b>{{session('grupo_asignado')}}</b>.
  </h5>
       </div>
   @endif
   <!-- Fin de mensaje de asignación exitosa -->

   <!-- Para validación -->
   @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
   @endif
   <!-- fin de para validación -->

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
    <!-- Formulario de inscripción -->
    <!-- Cabecera -->
    <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
    <div class="card-header" style="background:#f2d333"><h5>Crear grupo y asignarle tutor</h5></div>
    <div class="card-body">

      <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->

  <div class="alert alert-secondary w-85" role="alert">
  <form class="form-group pt-2" action="/asignacionTutorAGrupos" method="post">
    {{ csrf_field() }}
<!-- Seleccionar temática para el grupo-->
<label>Elegir la temática del grupo:</label>
     <select class="" name="cat_tematica_selec" id="menu_de_tematicas">
        <option value="">Seleccionar una temática</option>
         <option value="G-ESP-">Ciencias Espaciales</option>
         <option value="G-GES-">Gestión Territorial y Urbana</option>
         <option value="G-VID-">Ciencias de la Vida</option>
         <option value="G-ART-">Ciencia y Arte</option>
     </select>
<!-- Fin de seleccionar temática para el grupo -->
<br>

<div class="form-row">
  <div class="col-1">
<input class="form-control" id="mytext" type="text" placeholder="" readonly>
</div>
<div class="col-1">
<input class="form-control" id="mi_nro_de_equipo" type="text" name="nro_de_equipo" placeholder="número del equipo">
</div>
</div>

<script type="text/javascript">
    var mytextbox = document.getElementById('mytext');
    var mydropdown = document.getElementById('menu_de_tematicas');

    mydropdown.onchange = function(){
          //mytextbox.value = mytextbox.value  + this.value;
          mytextbox.value = this.value;
    }
</script>
<br>
<div class="form-group row">
<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Nombre del grupo/equipo:</label>
    <div class="col-sm-3">
<input class="form-control" id="nom_equipo" name="nombre_del_equipo" type="text" placeholder="" readonly>
</div>
</div>

<script type="text/javascript">
    var mytextbox2 = document.getElementById('mi_nro_de_equipo');
    var mydropdown = document.getElementById('menu_de_tematicas');
    var mytextbox3 = document.getElementById('nom_equipo');

    mytextbox2.onchange = function(){
          //mytextbox.value = mytextbox.value  + this.value;
          mytextbox3.value = mydropdown.value + mytextbox2.value;
    }
</script>
<br>
<!-- Seleccionar tutor -->
    <select class="" name="ID_del_tutor_seleccionado">
      <option value="">Seleccionar un tutor de la lista</option>
        @if($todoslostutores)
          @foreach ($todoslostutores as $tutor)
            <option value ="{{$tutor["ID"]}}">{{$tutor["Apellido"]}}, {{$tutor["Nombre"]}}</option>
          @endforeach
        @endif
    </select><br><br>
      <button type="submit" class="btn btn-primary">Asignar</button>
      <small id="emailHelp" class="form-text text-muted">Se asignará el tutor seleccionado al grupo creado.</small>
      <!-- Fin de seleccionar tutor -->
</form>
<!-- Fin del formulario para asignar el desafío al tutor -->
<!-- fin card -->


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
    <!-- JS y script para editor RTF -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

    <script>
    $('#summernote').summernote('disable');
    </script>
    <!-- Fin de JS y script para editor RTF -->
  </body>
</html>
