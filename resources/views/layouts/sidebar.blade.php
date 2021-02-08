<nav class="sidebar bg-dark" style="background: #000 !important">
    <ul class="list-unstyled">
        @if (Auth::check())
            @canany(['usuario.index','roles.index'])
                <li>
                    <a href="#submenu1" data-toggle="collapse"><i class="fas fa-user-cog"></i> Administración Empresa</a>
                    <ul id="submenu1" class="list-unstyled collapse">
                        @can('usuario.index')
                            <li><a href="{{ route('usuario.index') }}" ><i class="far fa-circle"></i> Usuarios</a></li>
                        @endcan
                        @can('roles.index')
                            <li><a href="{{ route('roles.index') }}"><i class="far fa-circle"></i> Roles</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
        @endif
        @canany(['facturaventa.index','pedidoventa.index','cliente.index','pagoventa.index'])
            <li>
                <a href="#submenu2" data-toggle="collapse"><i class="fas fa-chart-line"></i> Administración Ventas</a>
                <ul id="submenu2" class="list-unstyled collapse">
                    @can('facturaventa.index')
                        <li><a href="{{ route('facturaventa.index') }}"><i class="far fa-circle"></i> Factura Venta</a></li>
                    @endcan
                    @can('pedidoventa.index')
                        <li><a href="{{ route('pedidoventa.index') }}"><i class="far fa-circle"></i> Pedido Venta</a></li>
                    @endcan

                    @can('cliente.index')
                        <li><a href="{{ route('cliente.index') }}"><i class="far fa-circle"></i> Cliente</a></li>
                    @endcan

                    @can('pagoventa.index')
                        <li><a href="{{ route('pagoventa.index') }}"><i class="far fa-circle"></i> Pago Venta</a></li>
                    @endcan
                </ul>
            </li>
        @endcan

        @canany(['facturacompra.index','pedidoCompras.index','proveedor.index','pagocompra.index'])
            <li>
                <a href="#submenu3" data-toggle="collapse"><i class="fas fa-shopping-cart"></i> Administración Compras</a>
                <ul id="submenu3" class="list-unstyled collapse">
                    @can('facturacompra.index')
                        <li><a href="{{ route('facturacompra.index') }}"><i class="far fa-circle"></i>  Factura Compra</a></li>
                    @endcan
                    @can('pagocompra.index')
                        <li><a href="{{ route('pagocompra.index') }}"><i class="far fa-circle"></i> Pago Compra</a></li>
                    @endcan
                    @can('proveedor.index')
                        <li><a href="{{ route('proveedor.index') }}"><i class="far fa-circle"></i> Proveedores</a></li>
                    @endcan
                    @can('pedidoCompras.index')
                        <li><a href="{{ route('pedidoCompras.index') }}"><i class="far fa-circle"></i> Pedido Compras</a></li>
                    @endcan
                </ul>
            </li>
        @endcan

        @if (Auth::check())
            @canany(['asiento.index','librodiario.index','libromayor.index'])
                <li>
                    <a href="#submenu4" data-toggle="collapse"><i class="fa fa-file-alt"></i> Administración Informe</a>
                    <ul id="submenu4" class="list-unstyled collapse">
                        @can('asiento.index')
                            <li><a href="{{ route('asiento.index') }}"><i class="far fa-circle"></i> Gestionar Asiento </a></li>
                        @endcan

                        @can('librodiario.index')
                            <li><a href="{{ route('librodiario.index') }}"><i class="far fa-circle"></i> Libro Diario</a></li>
                        @endcan

                        @can('libromayor.index')
                            <li><a href="{{ route('libromayor.index') }}"><i class="far fa-circle"></i> Libro Mayor</a></li>
                        @endcan

                    </ul>
                </li>
            @endcan
        @endif

    </ul>
</nav>
