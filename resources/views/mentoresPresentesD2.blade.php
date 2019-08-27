
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="refresh" content="30"> <!-- en segundos -->
    <!-- Bootstrap CSS -->
        <!-- ¡Esto debe ir antes que ningún otro stylesheet!!! -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <!-- Fin de lo que debe ir antes que ningún otro stylesheet!!! -->

    <title>Mentores presentes (día 2)</title>
  </head>
  <body>
<a class="abajo" href="#"></a>

  @include('primerabarranav')

   <div class="jumbotron jumbotron-fluid pt-2" id="contenedor_ppal" style="background:url('/imgs/patron-HDC-jpg-01.jpg')">

 <div class="col-sm-11 mx-auto pt-0 mt-0 ">

    <div class="card mx-auto pt-0 mt-0 ">

      <div class="card-header" style="background:#ffebcc"><h4>Mentores presentes (día 2)</h4></div>
       <div class="card-body pt-1" >
         @if ($todoslosmentorespresentesD2)
               @foreach ($todoslosmentorespresentesD2->sortBy('apellido') as $mentor)
<!-- CON TABLAS DENTRO DE TARJETAS -->
<div class="card" style="width: 65rem;">
<ul class="list-group list-group-flush">
<li class="list-group-item">

  <!-- Principio de tabla -->
 <table style="width:100%">
  <td width="20%">
    <img src="storage/{{$mentor["nom_foto"]}}" width="120" height="90">
  </td>
  <td width="55%">
    <font size="6"><b>{{$mentor["nombre"]}} {{$mentor["apellido"]}}</b></font>
  </td>
  <td width="25%">{{$mentor["area_expertise1"]}} | {{$mentor["area_expertise2"]}}
<p>
Robótica: {{$mentor["exp_robotica"]}} | Programación: {{$mentor["exp_program"]}}
</p>
  </td>
</table>
<!-- fin de la tabla -->
 </li>
</ul>
</div>
<!-- fin de primera tarjeta -->

@endforeach
        @endif
</div>
<a class="arriba" href="#"></a>
<!-- fin del contenedor principal -->
            </div>
<br>


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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.2/jquery.min.js">
      </script>

      <script>
    $(document).ready(function() {
  $(".abajo").click(function() {
       $('html, body').animate({
           scrollTop: $(".arriba").offset().top
       }, 15000);
   });
  });

  $( document ).ready(function() {
   $( ".abajo" ).trigger( "click" );

  });

  $(document).ready(function() {
  $(".arriba").click(function() {
       $('html, body').animate({
           scrollTop: $(".abajo").offset().top
       }, 1000);
   });
  });

  $( document ).ready(function() {
   $( ".arriba" ).trigger( "click" );

  });
      </script>


  </body>
    </html>
