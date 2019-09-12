
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#f2d333">
  <a class="navbar-brand" href="#">

    <a href="/"><img src="/imgs/Logo-HDC2019.png" height="70" class="d-inline-block align-middle" alt=""></a></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<!-- Opciones de menú -->
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <!-- Opción de menú: Principal -->
      <li class="nav-item">
        <a class="nav-link" href="/">Principal <span class="sr-only">(current)</span></a>
      </li>
      <!-- Opción de menú: Inscripción -->
      <li class="nav-item">
        <a class="nav-link" href="/inscripcion">Inscripción</a>
      </li>

  @if (Auth::check())
<!-- Opción de menú: Acreditación D1 -->
      @if(Date(today()) == '2019-10-08 00:00:00') <!-- tiene que ser MENOR A -->
<!-- Probando menú descolgable -->
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">AcreditaciónD1</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="/acreditarEstudiantesDia1">Estudiantes</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="/acreditacionDocentesDia1">Docentes</a>
<a class="dropdown-item" href="/acreditacionTutoresDia1">Tutores</a>
<a class="dropdown-item" href="/acreditacionOtrosDia1"><i>Otros</i></a>
<div class="dropdown-divider"></div>
<a class="dropdown-item bg-warning" href="/checkoutMentoresDia1">Check-out Mentores</a>
</div>
</li>
<!-- Fin prueba menú descolgable -->
    @endif

      <li class="nav-item"></li>

<!-- Opción de menú: Acreditación D2 -->
      @if(Date(today()) == '2019-10-09 00:00:00')
        {{-- @if(Date(today()) < '2019-10-02 00:00:00') --}}
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">AcreditaciónD2</a>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="/acreditarEstudiantesDia2">Estudiantes</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="/acreditacionDocentesDia2">Docentes</a>
        <a class="dropdown-item" href="/acreditacionTutoresDia2">Tutores</a>
        <a class="dropdown-item" href="/acreditacionOtrosDia2"><i>Otros</i></a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item bg-warning" href="/checkoutMentoresDia2">Check-out Mentores</a>
        </div>
        </li>
    @endif

    <!-- Opción de menú: Consultas -->
    {{-- @if (Auth::check()) --}}
        <li class="nav-item">
          <a class="nav-link" href="/consultas">Consultas</a>
        </li>
        <!-- esto lo agregué para el logout -->
        <li class="nav-item">
          <a class="nav-link" href="/logout">Salir</a>
        </li>
        <!-- fin de lo que agregué para el logout -->
       @else
        <li class="nav-item">
          <a class="nav-link" href="/login">Ingresar</a>
        </li>
    @endif
    <!-- Fin opción menú "consultaDeTutores" -->

    </ul>
  </div>
  <!-- Fin de menú -->
</nav>
