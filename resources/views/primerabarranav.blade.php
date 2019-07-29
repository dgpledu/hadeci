
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#f2d333">
  <a class="navbar-brand" href="#">
    {{-- <img src="/imgs/LogoHDC2018_3D-sm.png" height="70" class="d-inline-block align-middle" alt=""></a> --}}
    <img src="/imgs/Logo-HDC2019.png" height="70" class="d-inline-block align-middle" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="/">Principal <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/inscripcion">Inscripción</a>
      </li>

      @if(Date(today()) < '2019-09-04 00:00:00')
      <li class="nav-item">
        <a class="nav-link" href="/acreditarEstudiantesDia1">AcreditaciónD1</a>
      </li>
    @endif
      <li class="nav-item">
      </li>

      @if(Date(today()) == '2019-09-04 00:00:00')
      <li class="nav-item">
        <a class="nav-link" href="/acreditarEstudiantesDia2">AcreditaciónD2</a>
      </li>
    @endif
      @if (Auth::check())
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
    </ul>
  </div>
</nav>
