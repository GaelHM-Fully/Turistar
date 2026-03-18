<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turistar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c24842f28a.js" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #f5f6f8;
        }

        .topbar {
            background: #ffffff;
            border-bottom: 1px solid #ddd;
        }

        .sidebar {
            min-height: calc(100vh - 56px);
            background: #ffffff;
            border-right: 1px solid #ddd;
        }

        .sidebar .nav-link {
            color: #333;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .sidebar .nav-link:hover {
            background: #f1f1f1;
        }

        .sidebar .nav-link.active {
            background: #0d6efd;
            color: white;
        }

        .content-area {
            padding: 25px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg topbar px-3">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">
            <i class="fa-solid fa-bus"></i> Turistar
        </span>

        <div class="d-flex align-items-center gap-2">
            @if(session('usuario_id'))
                <span class="badge bg-primary">
                    {{ session('usuario_nombre') }} ({{ session('usuario_rol') }})
                </span>

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        <i class="fa-solid fa-right-from-bracket"></i> Salir
                    </button>
                </form>
            @endif
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        @if(session('usuario_id'))
        <div class="col-md-3 col-lg-2 sidebar p-3">
            <div class="nav flex-column">

                <a href="{{ route('dashboard') }}"
                   class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-gauge"></i> Dashboard
                </a>

                <a href="{{ route('autobuses.index') }}"
                   class="nav-link {{ request()->routeIs('autobuses.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-bus-simple"></i> Autobuses
                </a>

                @if(session('usuario_rol') === 'admin')
                    <a href="{{ route('usuarios.index') }}"
                       class="nav-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-users"></i> Usuarios
                    </a>
                @endif

            </div>
        </div>
        @endif

        <div class="{{ session('usuario_id') ? 'col-md-9 col-lg-10' : 'col-12' }} content-area">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>