
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <meta http-equiv="refresh" content="30"> <!-- en segundos --> --}}
    <!-- Bootstrap CSS debe ir antes que ningún otro stylesheet!!! -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <!-- Fin de lo que debe ir antes que ningún otro stylesheet!!! -->
    <title>Mentores presentes (día 1)</title>
  </head>
  <body>
  @include('primerabarranav')

<div class="jumbotron jumbotron-fluid pt-2" id="contenedor_ppal" style="background:url('/imgs/patron-HDC-jpg-01.jpg')">
    <div class="col-sm-11 mx-auto pt-0 mt-0 ">
        <div class="card mx-auto pt-0 mt-0 ">
            <div class="card-header" style="background:#ffebcc"><h4>Mentores presentes (día 1)</h4></div>
              <div class="card-body pt-1" >

<!-- Carrousel -->
<div id="mySlider">
Hola <br>
Hola <br>
Hola <br>
Hola <br>
Hola <br>
Hola <br>
</div>

<!-- Fin del carrousel -->
                {{-- @if ($todoslosmentorespresentesD1)
                  @foreach ($todoslosmentorespresentesD1->sortBy('apellido') as $mentor)
                    @include('tarjetaMentores')
                  @endforeach
                @endif --}}
              </div>
<!-- fin del contenedor principal -->
        </div><br>
  </div>
</div>

@include('segundabarranav')

    <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.2/jquery.min.js">
      </script>
      <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
      <script src="js/jQuery-hm.js"></script>

<script>

$(function() {

var data = <?php echo $todoslosmentorespresentesD1json; ?>;

$("#mySlider").hmSilder({
  // animation speed
  showTime: 1000,
  // stay time before fading to next image
  step: 2000,
  // data array
  data: data,
  // autoplay
  isAuto: true
});

});
</script>

  </body>

    </html>
