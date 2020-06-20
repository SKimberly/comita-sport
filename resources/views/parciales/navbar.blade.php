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
      @endguest
    </ul>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link"  href="{{ route('carrito.detalle') }}" data-toggle="tooltip" data-placement="bottom" title="Compras">
                  @if($nummsj = auth()->user()->carrito->carrito_detalles->count() )
                    <span class="badge btn-comita text-white navbar-badge" style="margin-top: -4px;" >
                    {{ $nummsj }}</span>
                  @endif
                  <img src="{{ asset('img/cart.svg') }}" alt="pedidos" width="35" class="nav-icon" style="margin-top: -5px;">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="tooltip" data-placement="bottom" title="Mensajes">
                    <img src="{{ asset('img/message.svg') }}" alt="pedidos" width="35" class="nav-icon" style="margin-top: -5px;">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="bottom" title="SALIR">
                      <img src="{{ asset('img/powerb.svg') }}" alt="salir" width="35" class="nav-icon" style="margin-top: -5px;">
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>