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

    <title>Inscripción de estudiantes</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
  <!-- Formulario de inscripción -->
  <!-- Cabecera -->
  <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>

  <div class="card-header" style="background:#f2d333"><h5>Formulario de inscripción de estudiantes</h5></div>
  <div class="card-body">
    <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->

      @if (session('estado'))
          <div class="alert alert-success">
<h5 ><img src="/imgs/tilde-correcto-4.png" style="width:40px; height:40px;" alt="aprobado">
La inscripción de
            <b> {{ session('estado') }} </b>
             se ha realizado exitosamente. En el mensaje de bienvenida como docente que recibió por mail cuando se inscribió, hay un enlace desde el cual podrá consultar el listado de los estudiantes que usted ha inscripto.</h5>
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

<h6><span class="text-body"><b>INSTRUCTIVO:</b></span><span class="text-secondary"> A continuación podrá cargar los datos de sus estudiantes, uno tras otro. Al finalizar cada carga, haga clic en el botón <kbd style="background-color:#0275d8";>Inscribir estudiante</kbd> (ubicado al final de este formulario) y verá un mensaje en pantalla confirmando que el/la estudiante fue inscripto/a correctamente. <br>
Luego de un envío, el formulario se limpiará y podrá cargar los datos para el/la siguiente estudiante. <br><br>Recuerde que en caso de que necesite registrar <b>estudiantes de diferentes escuelas</b>, deberá primero inscribirse como docente de cada una de ellas (completando un formulario de inscripción como docente por cada institución con la que participará).

{{-- Luego, al final de este formulario de inscripción de estudiantes podrá seleccionar la escuela correspondiente de una lista desplegable. --}}

</span> </h6>

<hr>

      <h5>Datos del/la estudiante</h5>
      <!-- 3er form -->
      <form class="" action="" method="post">
{{ csrf_field() }}
<div class="form-row">
    <div class="form-group col-sm-4.5">

      <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre">
      <small class="form-text text-muted">Ingrese el nombre del/la estudiante a registrar tal como figura en su DNI</small>
    </div>

    <div class="form-group col-sm-4.5">
      <input type="text" name="apellido" value="{{old('apellido')}}" class="form-control" placeholder="Apellido">
        <small class="form-text text-muted">Ingrese el apellido del/la estudiante tal como figura en su DNI</small>
    </div>

    <div class="form-group col-sm-3">
      <input type="text" name="DNIestudiante" value="{{old('DNIestudiante')}}" class="form-control" placeholder="DNI">
        <small class="form-text text-muted">Ingrese el DNI del/la estudiante sin puntos ni espacios</small>
    </div>

</div>
  <!-- fin de la primera línea del formulario -->
<div class="form-row">
  <div class="form-group col-sm-5">
    <input type="email" name="EmailEstudiante" value="{{old('EmailEstudiante')}}" class="form-control" placeholder="E-mail">
      <small class="form-text text-muted">Ingrese email del/la estudiante</small>
  </div>
  <div class="form-group col-sm-5">
    <input type="number" name="celular" value="" class="form-control" placeholder="Celular">
      <small class="form-text text-muted">Ingrese celular del/la estudiante sin 0, sin 15, sin guiones ni espacios, solo números consecutivos.</small>
  </div>
</div>
  <!-- Inicio segunda línea del formulario -->
  <div class="form-row">

  <div class="form-group col-sm-3">
    <input type="date" name="FechaNacimientoEstudiante" value="{{old('FechaNacimientoEstudiante')}}" class="form-control" placeholder="Fecha de nacimiento del/la estudiante">
      <small class="form-text text-muted">Ingrese fecha de nacimiento del/la estudiante</small>
  </div>
  <div class="form-group col-sm-2">
    <select class="form-control" name="AnioQueCursa">
      <option value="">Elegir...</option>
      {{-- <option value="3er. año">3er. año</option> --}}
      <option value="4to. año">4to. año</option>
      <option value="5to. año">5to. año</option>
      <option value="6to. año">6to. año</option>
    </select>
    <small class="form-text text-muted">Año que cursa actualmente</small>
  </div>
</div>
  <!-- fin de la segunda línea del formulario -->
  <!-- Inicio tercera línea del formulario -->
  <div class="form-row">
    <div class="form-group col-sm-6">
      <select class="form-control" name="RestriccionAlimentaria">
        {{-- <option value="No" selected>Si posee alguna restricción alimentaria, selecciónela haciendo clic acá</option> --}}
        <option value="" selected>¿Posee alguna restricción alimentaria? (obligatorio)</option>
<option>No</option>
        <option value="Celiaquía">Celiaquía</option>
        <option value="Veganismo">Veganismo</option>
        <option value="Vegetarianismo">Vegetarianismo</option>
        <option value="Fenilcetonuria">Fenilcetonuria</option>
        <option value="Otra">Otra</option>
      </select>
      <small class="form-text text-muted">Si selecciona la opción "Otra", por favor envíe un mail a <a href="mailto:desafios.cientificos@bue.edu.ar">desafios.cientificos@bue.edu.ar</a> detallando en qué consiste dicha restricción alimentaria.
      </small>
    </div>
    <div class="form-group col-sm-3">
      <select class="form-control" name="Opcion1DeCategoriaTematica">
        <option selected>Categoría temática...</option>
        @foreach ($categorias as $cat_tem1)
          <option value="{{$cat_tem1->ID}}">
            {{$cat_tem1->nombre}} ({{$cat_tem1->alias}})
          </option>
        @endforeach
      </select>
      <small class="form-text text-muted">Categoría temática preferida en <b>primer</b> lugar</small>
    </div>
    <div class="form-group col-sm-3">
      <select class="form-control" name="Opcion2DeCategoriaTematica">
        <option selected>Categoría temática...</option>
        @foreach ($categorias as $cat_tem2)
          <option value="{{$cat_tem2->ID}}">
            {{$cat_tem2->nombre}} ({{$cat_tem2->alias}})
          </option>
        @endforeach
      </select>
      <small class="form-text text-muted">Categoría temática preferida en <b>segundo</b> lugar. <span style="color: red">ATENCIÓN:</span> Debe ser <b>diferente</b> a la categoría elegida en <b>primer</b> lugar, salvo que la elección sea <b>"Cualquiera"</b>.</small>
    </div>
  </div>
  <!-- fin de la tercera línea del formulario -->


<!-- Fin de carga de datos del estudiante -->
<hr>

    <div class="form-row">
    <div class="form-group col-sm-4">

<!-- fin de formulario de inscripción -->
<!-- original -->
@if (isset($docentereg)) <!-- esta condición siempre da true, aunque el valor sea null -->
  <span>DNI Docente: {{$docentereg["DNI"]}}</span>
  <input type="hidden" name="dnidocente" value="{{$docentereg["DNI"]}}">
@endif

<!-- fin del original -->


<br>
<br>
<input type="submit" class="btn btn-primary" value="Inscribir Estudiante">

<small class="form-text text-muted">Al dar clic en este botón se enviarán los datos del formulario y se dará por completada la inscripción del/la estudiante.</small>
</div>

<div class="form-group col-sm-4">
  <select class="form-control" name="escuela">
      <option selected>Elegir escuela...</option>

        @if(isset($docentereg))
            @foreach ($docentereg->escuelas as $escuelas)
              <option selected value="{{$escuelas["ID"]}}">
                {{$escuelas["nombre"]}}
              </option>
            @endforeach
          @endif

  </select>
{{-- @dd($docentereg); --}}
<small class="form-text text-muted">Seleccionar la escuela a la cual concurre el/la estudiante</small>
</div>
 </div>
 <!-- Cierre 3er form -->
</form>
</div></div></div></div>
</div><!-- fin del jumbotron secundario -->

@include('segundabarranav')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
