@php


@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link text-center">
      <img src="{{ asset('/img/sidebar/comitaicon.svg') }}" alt="AdminLTE Logo" class="brand-image elevation-3"
           style="opacity: .8">
        <span class="brand-text font-weight-light yellow">Sport La Comita</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/sidebar/userdefault.svg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('admin.users.show', [Auth::user()->slug]) }}" class="text-center " >
              <span >{{ Auth::user()->fullname }} </span>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/escritorio.svg') }}" alt="" class="nav-icon">
              <p>
                Escritorio
              </p>
            </a>
          </li>
          @can('viewAny', auth::user())
          <li class="nav-item">
              <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                <img src="{{ asset('img/sidebar/users.svg') }}" alt="usuarios" class="nav-icon">
                <p>
                    Usuarios
                </p>
              </a>
          </li>
          @endcan
          @can('create', auth::user())
            <li class="nav-item has-treeview {{ request()->is('admin/categorias*') || request()->is('admin/tallas*') || request()->is('admin/materiales*') ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ request()->is('admin/categorias*') || request()->is('admin/tallas*') || request()->is('admin/materiales*') ? 'active' : '' }}">
                <img src="{{ asset('img/sidebar/otros.svg') }}" alt="complementos" class="nav-icon">
                <p>
                    Complementos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('admin.categorias') }}" class="nav-link {{ request()->is('admin/categorias') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sitemap"></i>
                    <p>Categorias</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.tallas.index') }}" class="nav-link {{ request()->is('admin/tallas') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sort-numeric-up"></i>
                    <p>Tallas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.materiales.index') }}" class="nav-link {{ request()->is('admin/materiales') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tshirt"></i>
                    <p>Materiales</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan
          <li class="nav-item">
            <a href="{{ route('admin.productos.index') }}" class="nav-link {{ request()->is('admin/productos*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/producto.svg') }}" alt="" class="nav-icon">
              <p>
                Productos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('carrito.detalle') }}" class="nav-link {{ request()->is('admin/carrito/detalle*') ? 'active' : '' }}">
              <img src="{{ asset('img/shoppingcard.svg') }}" alt="carrito" class="nav-icon">
              <p>
                  Carrito
                  @if($nummsj = auth()->user()->carrito->carrito_detalles->count())
                      <span class="right badge bg-success" >{{ $nummsj }}</span>
                  @endif
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.cotizaciones.index') }}" class="nav-link {{ request()->is('admin/cotizaciones*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/cotizacion.svg') }}" alt="pedidos" class="nav-icon">
              <p>
                  Cotizaciones
                  @if($numco = auth()->user()->cotizaciones->where('estado','Activo')->count())
                      <span class="right badge bg-warning">{{ $numco }}</span>
                  @endif
              </p>
            </a>
          </li>
          @php
            use App\Models\CarritoPago;
            use App\Models\CotiPago;
          @endphp
          @can('viewAny', auth::user())
          <li class="nav-item">
            <a href="{{ route('admin.pagos.index') }}" class="nav-link {{ request()->is('admin/pagos*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/imgpago.svg') }}" alt="pedidos" class="nav-icon">
              <p>
                  @if($numimg = CarritoPago::where('estado','Pendiente')->where('usuario',auth()->user()->id)->count())
                      <span class="right badge bg-success mr-4" >{{ $numimg }}</span>
                  @endif
                  Imagenes/pagos
                  @if($numimage = CotiPago::where('estado','Pendiente')->where('usuario',auth()->user()->id)->count())
                      <span class="right badge bg-warning" >{{ $numimage }}</span>
                  @endif
              </p>
            </a>
          </li>
          @endcan
          <li class="nav-item">
            <a href="{{ route('admin.pedidos.index') }}" class="nav-link {{ request()->is('admin/pedidos*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/pedidos.svg') }}" alt="pedidos" class="nav-icon">
              <p>
                @php
                  use App\Models\Carrito;
                  use App\Models\Cotizacion;
                @endphp
                  @if($nummsj = Carrito::where('estado','Pendiente')->count())
                      <span class="right badge bg-success mr-4" >{{ $nummsj }}</span>
                  @endif
                  Pedidos
                  @if($numco = Cotizacion::where('estado','Pendiente')->count())
                      <span class="right badge bg-warning">{{ $numco }}</span>
                  @endif
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.aprobados') }}" class="nav-link {{ request()->is('admin/aprobados*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/pedidosapro.svg') }}" alt="categorias" class="nav-icon">
              <p>
                  @if($nummsj = Carrito::where('estado','Procesando')->count())
                      <span class="right badge bg-info mr-4" >{{ $nummsj }}</span>
                  @endif
                  Pedidos Aprobados
                  @if($numco = Cotizacion::where('estado','Procesando')->count())
                      <span class="right badge bg-primary">{{ $numco }}</span>
                  @endif
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.rechazados') }}" class="nav-link {{ request()->is('admin/rechazados*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/marketnot.svg') }}" alt="categorias" class="nav-icon">
              <p>
                  @if($nummsj = Carrito::where('estado','Rechazado')->count())
                      <span class="right badge bg-info mr-4" >{{ $nummsj }}</span>
                  @endif
                  Pedidos rechazados
                  @if($numco = Cotizacion::where('estado','Rechazado')->count())
                      <span class="right badge bg-primary">{{ $numco }}</span>
                  @endif
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.ventas.index') }}" class="nav-link {{ request()->is('admin/ventas*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/ventas.svg') }}" alt="categorias" class="nav-icon">
              <p>
                  @if($nummsj = Carrito::where('estado','Finalizado')->count())
                      <span class="right badge bg-success mr-4" >{{ $nummsj }}</span>
                  @endif
                  Ventas
                  @if($numco = Cotizacion::where('estado','Finalizado')->count())
                      <span class="right badge bg-warning">{{ $numco }}</span>
                  @endif
              </p>
            </a>
          </li>
          @can('create', auth::user())
          <li class="nav-item">
            <a href="{{ route('admin.calendario.index') }}" class="nav-link {{ request()->is('admin/calendario/view') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/calendario.svg') }}" alt="categorias" class="nav-icon">
              <p>
                  Calendario
                  @php
                    $numca = Carrito::where('estado','Procesando')->count();
                    $numco = Cotizacion::where('estado','Procesando')->count();
                  @endphp
                  <span class="right badge bg-danger">{{ $numca+$numco }}</span>
              </p>
            </a>
          </li>
          @can('viewAny', auth::user())
          <li class="nav-item">
            <a href="{{ route('admin.reportes.index') }}" class="nav-link {{ request()->is('admin/reportes*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/reportes.svg') }}" alt="reportes" class="nav-icon">
              <p>
                  Reportes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.estadisticas.index') }}" class="nav-link {{ request()->is('admin/estadisticas*') ? 'active' : '' }}">
              <img src="{{ asset('img/sidebar/resultados.svg') }}" alt="reportes" class="nav-icon">
              <p>
                  Estadísticas
              </p>
            </a>
          </li>
          @endcan
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>