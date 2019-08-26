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

    <title>Agregar escuelas</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">
    <!-- Formulario de inscripción -->
    <!-- Cabecera -->
    <div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
    <div class="card-header" style="background:#f2d333"><h5>Agregar escuelas faltantes</h5></div>
    <div class="card-body">


      <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->

        @if (session('estado'))
            <div class="alert alert-success">
  <h5 ><img src="/imgs/tilde-correcto-4.png" style="width:40px; height:40px;" alt="aprobado">
  La escuela
              <b> {{ session('estado') }} </b>
               fue agregada exitosamente!</h5>
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

<form class="" action="/agregarescuelas" method="post">
  {{-- <div class="alert alert-secondary w-85" role="alert">
  <form class="form-group pt-2" action="/agregarescuelas" method="post"> --}}
    {{ csrf_field() }}
<!-- Línea -->
    <div class="form-row">
      <div class="form-group col-sm-4">
        <input type="text" name="nombre" class="form-control" placeholder="Nombre completo de la escuela">
        <small class="form-text text-muted">Ingrese nombre de la escuela</small>
      </div>
      <div class="form-group col-sm-4">
        <input type="text" name="nombre_abrev" class="form-control" placeholder="Nombre abreviado de la escuela">
        <small class="form-text text-muted">Ingrese el nombre abreviado de la escuela. <u>Ej:</u><i> Instit. J V González</i></small>
      </div>
      <div class="form-group col-sm-4">
        <input type="text" name="dom_edific" class="form-control" placeholder="Domicilio del edificio">
        <small class="form-text text-muted">Ingrese el domicilio del edificio</small>
      </div>
    </div>
<!-- Fin de línea -->

<!-- Línea -->
    <div class="form-row">
      <div class="form-group col-sm-4">
        <input type="text" name="dom_establ" class="form-control" placeholder="Domicilio del establecimiento">
        <small class="form-text text-muted">Ingrese el domicilio del establecimiento</small>
      </div>
      <div class="form-group col-sm-2.5">
        <input type="text" name="cui" class="form-control" placeholder="CUI de la escuela">
        <small class="form-text text-muted">Ingrese CUI de la escuela</small>
      </div>
      <div class="form-group col-sm-2.5">
        <input type="text" name="cueanexo" class="form-control" placeholder="CUE Anexo">
        <small class="form-text text-muted">Ingrese el CUE Anexo de la escuela.</small>
      </div>
      <div class="form-group col-sm-2.5">
        <input type="text" name="cue" class="form-control" placeholder="CUE de la escuela">
        <small class="form-text text-muted">Ingrese el CUE de la escuela.</small>
      </div>

    </div>
<!-- Fin de línea -->

<!-- Línea -->
    <div class="form-row">
      <div class="form-group col-sm-2.5">
        <input type="text" name="telefono" class="form-control" placeholder="Teléfono del establecimiento">
        <small class="form-text text-muted">Ingrese el teléfono del establecimiento</small>
      </div>
      <div class="form-group col-sm-2.5">
        <input type="text" name="nivelmodal" class="form-control" placeholder="Nivel modal">
        <small class="form-text text-muted">Ingrese Nivel modal de la escuela</small>
      </div>
      <div class="form-group col-sm-2">
        <input type="text" name="de" class="form-control" placeholder="Distrito escolar">
        <small class="form-text text-muted">Ingrese el Distrito escolar de la escuela.</small>
      </div>
      <div class="form-group col-sm-2">
        <input type="text" name="comunas" class="form-control" placeholder="Nº comuna">
        <small class="form-text text-muted">Ingrese el número de comuna en que está ubicada la escuela.</small>
      </div>
    </div>
<!-- Fin de línea -->

<!-- Línea -->
    <div class="form-row">
      <div class="form-group col-sm-2">
        <input type="text" name="barrio" class="form-control" placeholder="barrio de la escuela">
        <small class="form-text text-muted">Ingrese el barrio del establecimiento</small>
      </div>
      <div class="form-group col-sm-2">
        <input type="text" name="codigo_postal" class="form-control" placeholder="Código postal">
        <small class="form-text text-muted">Ingrese Código postal de la escuela (solo números)</small>
      </div>
    </div>
<!-- Fin de línea -->

     <button type="submit" name="" class="btn btn-success">Agregar la escuela</button>
     <small id="emailHelp" class="form-text text-muted">ATENCIÓN: Esta operación es delicada y no puede deshacerse. Verifique bien los datos antes de confirmar la operación.</small>
  </form>


<!-- comienzo card -->


</div>

</div>

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

  </body>
</html>
