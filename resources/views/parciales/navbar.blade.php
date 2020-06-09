<nav class="main-header navbar navbar-expand navbar-white navbar-admin">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars side"></i></a>
      </li>
      @guest
          <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
          <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif
      @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <font class="side"> {{ Auth::user()->fullname }}</font>  <span class="caret side"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Salir') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link"  href="">
            <img src="{{ asset('img/shoppingcard.svg') }}" alt="pedidos" width="35" class="nav-icon">
          </a>
        </li>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="">
            <img src="{{ asset('img/message.svg') }}" alt="pedidos" width="35" class="nav-icon">
        </a>
      </li>
    </ul>
</nav>