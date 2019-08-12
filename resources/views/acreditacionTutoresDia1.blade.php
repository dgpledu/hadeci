
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

    <title>Acreditación</title>
  </head>
  <body>
  @include('primerabarranav')

 <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">

  <div class="col-sm-12 ml-auto">
    <div class="card">

    </div>
  </div>

<div class="card mx-auto text-black bg-light mb-3" style="max-width: 75rem";>
<div class="card-header" style="background:#f2d333"><h5>Acreditación de tutores (día 1)</h5></div>
<div class="card-body">
  <div class="container-fluid ml-3 mt-0 pt-1"> <!-- Donde va todo -->
        @if (session('estado'))
             <div class="alert alert-success">
        <h5><img src="/imgs/tilde-correcto-4.png" style="width:40px; height:40px;" alt="aprobado">

                <b> {{session('estado')}} </b>
                ha confirmado su presencia en el día de la fecha.
        </h5>
             </div>
         @endif
<!-- Acá va la búsqueda propia de cada perfil -->

<div class="alert alert-secondary w-85" role="alert">
  <form class="form-group pt-2" action="" method="get">
    {{-- {{ csrf_field() }} --}}
    <input class="form-control-lg col-lg-4" type="text" name="busqueda_DNI_tutor" value="" placeholder="CUIL/CUIT del tutor">
    <button type="submit" name="" class="btn btn-success">Realizar consulta</button>
    <small id="emailHelp" class="form-text text-muted">Tipee el CUIL/CUIT completo del tutor a acreditar (sin puntos ni guiones ni espacios)</small>
  </form>

  @if ($resultados_t)
        @foreach ($resultados_t->sortBy('Apellido') as $tutor)
              <div class="card">
                  <div class="card-header" style="background:#F2D333">
                    <h5>  {{$tutor["Apellido"]}}, {{$tutor["Nombre"]}}</h5>
                  </div>

                  <div class="card-body">
                    <h6 class="card-title"><b>CUIL/CUIT:</b> {{$tutor["DNI"]}}</h6>
                    <p class="card-text"><b>Institución:</b> {{$tutor["instit_rep"]}}</p>
                    <p class="card-text"><b>E-mail:</b> {{$tutor["email"]}}</p>
                        <form class="" method="post">
                          {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" name="presente" value="Acreditarse">
                        </form>
                  </div>
              </div>
                      <br>
          @endforeach
   @endif

</div>

<!-- Fin búsqueda propia de cada perfil -->
    </div>


</div></div></div></div></div>

</div><!-- fin del jumbotron secundario -->

@include('segundabarranav')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
