<nav class="navbar navbar-example navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbar-ex-2"
        aria-controls="navbar-ex-2"
        aria-expanded="false"
        aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-ex-2">
        <div class="navbar-nav me-auto">
        <a class="nav-item nav-link active" href="{{ route('libro.index') }}">Libros</a>
        @auth
        <a class="nav-item nav-link" href="{{ route('libro.create') }}">Agregar libro</a>
        @endauth
        </div>
    </div>
    </div>

    @guest
        <li class="nav-item d-flex align-items-center">
            <a href="{{ route('login') }}" class="nav-link text-body font-weight-bold px-0">
            <i class="fa fa-user me-sm-1"></i>
            <span class="d-sm-inline d-none">INGRESAR</span>
            </a>
        </li>
    @endguest

    <!-- User -->
     @auth
     <li class="nav-item navbar-dropdown dropdown-user dropdown" style="list-style: none; margin: 0; padding: 0;">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
                <div class="avatar-initials rounded-circle" 
                    style="background-color: #007bff; color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                    <i class="bx bx-user" style="font-size: 18px;"></i>
                </div>
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Salir</span>
                    </button>
                </form>
            </li>
        </ul>
    </li>
    @endauth
    <!--/ User -->    


    

</nav>