<nav class="navbar navbar-expand navbar-dark bg-primary" style="background-color: #7F948A !important">
    <a class="sidebar-toggle text-light mr-3"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="{{ route('home') }}">ContaNube <i class="fa fa-home"></i></a>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    <i class="fa fa-user"></i> {{\Illuminate\Support\Facades\Auth::user()->name}}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar Sesion') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
    @if (session('info'))
        <div class="alert alert-success text-white" style="background-color: rgb(18, 172, 87) ;position: absolute;top:8.55%;left:50%;padding: 0.5%;font-size: 1.3em;padding-right:1%;padding-left: 1%;">
            {{ session('info') }}
        </div>
    @endif

    @if (session('act'))
    <div class="alert alert-success text-white" style="background-color: rgb(18, 172, 87) ;position: absolute;top:8.55%;left:50%;padding: 0.5%;font-size: 1.3em;padding-right:1%;padding-left: 1%;">
            {{ session('act') }}
        </div>
    @endif

    @if (session('delete'))
        <div class="alert alert-danger text-white" style="background-color: rgb(214, 55, 34) ;position: absolute;top:8.55%;left:50%;padding: 0.5%;font-size: 1.3em;padding-right:1%;padding-left: 1%;">
            {{ session('delete') }}
        </div>
    @endif
