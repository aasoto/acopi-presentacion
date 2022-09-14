<nav class="main-header navbar navbar-expand navbar-white navbar-light" id="headerNav">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      @if (Auth::user()->rol == '')
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          Hola, por favor verifique su usuario.
          <!-- Este botón se usará para brindar información acerca del tipo de usuario. -->
        </a>
      @else
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          Hola, {{ Auth::user()->rol }} 
          <!-- Este botón se usará para brindar información acerca del tipo de usuario. -->
        </a>
      @endif 
    </li>
    <li class="nav-item">
      <a class="nav-link modoNocturno" title="Modo nocturno" action="{{ Auth::user()->id }}" method="PUT" pagina="{{url()->current()}}" token="{{csrf_token()}}" role="button">
        @if (Auth::user()->modo == 'Diurno')
          <i class="fas fa-moon"></i>
        @endif
        @if (Auth::user()->modo == 'Nocturno')
          <i class="fas fa-sun"></i>
        @endif
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
        <i class="fas fa-sign-out-alt"></i>
      </a>
      <form id="logout-form" action="{{ route('logout')}}" method="post" style="display:none">
        @csrf
      </form>
    </li>
  </ul>
</nav>