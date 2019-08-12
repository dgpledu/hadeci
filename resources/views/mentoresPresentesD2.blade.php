
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="refresh" content="30">
    <!-- Bootstrap CSS -->
        <!-- ¡Esto debe ir antes que ningún otro stylesheet!!! -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <!-- Fin de lo que debe ir antes que ningún otro stylesheet!!! -->

    <title>Mentores presentes (día 2)</title>
  </head>
  <body>
  @include('primerabarranav')

 {{-- <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')"> --}}
   <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron-HDC-jpg-01.jpg')">
 <div class="col-sm-6 mx-auto">
    <div class="card mx-auto" >
      <div class="card-header" style="background:#ffebcc"><h4>Mentores presentes (día 2)</h4></div>
       <div class="card-body">
        <h5 class="card-title">Hackatón "Desafíos Científicos" edición 2019</h5>
            <p class="card-text">Listado de los mentores presentes en el evento en el día 2</p>
              <!-- Acá van las tarjetas de los mentores -->

              @if ($todoslosmentorespresentesD2)
                    @foreach ($todoslosmentorespresentesD2->sortBy('apellido') as $mentor)
<!-- Primera tarjeta -->
              <div class="card" style="width: 34rem;">
  <div class="card mb-3 bg-warning" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="/storage/{{$mentor["nom_foto"]}}" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$mentor["apellido"]}}, {{$mentor["nombre"]}}</h5>
        <p class="card-text"><b>Rol:</b> {{$mentor["rol"]}}</p>
        <p class="card-text"><b>Institución:</b> {{$mentor["instit_rep"]}}</p>
      </div>
    </div>
  </div>
{{-- </div> --}}
<!-- fin de primera tarjeta -->
<!-- segunda tarjeta -->
<div class="card-body" style="background:#ffebcc">
<p class="card-text"><b>CV:</b> {{$mentor["CV"]}}</p>
<p class="card-text"><b>Área de expertise 1:</b> {{$mentor["area_expertise1"]}}</p>
<p class="card-text"><b>Área de expertise 2:</b> {{$mentor["area_expertise2"]}}</p>
<p class="card-text"><b>¿Robótica?</b> {{$mentor["exp_robotica"]}}</p>
<p class="card-text"><b>¿Programación?</b> {{$mentor["exp_program"]}}</p>

</div></div>
<!-- fin de segunda tarjeta -->

<!-- fin del contenedor principal -->
            </div>
<br>
            @endforeach
                    @endif

</div></div>

              <!-- Fin de las tarjetas de los mentores -->
      </div>
    </div>
  </div>

  <!-- Fin columna 1 -->
@include('segundabarranav')

    <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
    </html>
