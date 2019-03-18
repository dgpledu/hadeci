
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
<link rel="stylesheet" href="/css/estilos.css">

  <!-- MathJax -->
  <script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML">
</script>
  <!-- Fin de MathJax -->
  <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
    <title>Probando cosas</title>
  </head>
  <body>
     <div class="jumbotron jumbotron-fluid" id="contenedor_ppal" style="background:url('/imgs/patron.png')">

       <div style="width:800px; margin:0 auto;"> <!-- DIV centrado en la página -->
         <div class="card">
    <h5 class="card-header bg-primary text-white">Editor de textos</h5>
    <div class="card-body">
      <h5 class="card-title">Editor clásico de CKEditor</h5>
      <p class="card-text">
        <textarea name="content" id="editor">
            &lt;p&gt;Esto es un contenido de ejemplo.&lt;/p&gt;
        </textarea>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
      </p>
    </div>
  </div>
</div> <!-- Fin de DIV centrado en la página -->
<br><br> <!-- separación entre ambos DIV -->
      <div style="width:800px; margin:0 auto;"> <!-- Segundo DIV centrado en la página -->
        <div class="card">
   <h5 class="card-header bg-primary text-white">Escribir fórmulas</h5>
   <div class="card-body">
     <h5 class="card-title">Ejemplo de MathJax</h5>
     <p class="card-text">
       Cuando \(a \ne 0\), hay dos soluciones posibles para \(ax^2 + bx + c = 0\) las cuales son
       $$x = {-b \pm \sqrt{b^2-4ac} \over 2a}.$$
     </p>
     {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
   </div>
 </div>
</div> <!-- Fin del segundo DIV centrado en la página -->

      </div><!-- fin del jumbotron secundario -->

          <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
</html>
