<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Plataforma</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome (íconos) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Mi Plataforma</h4>
        <a href="{{ url('/') }}"><i class="fas fa-home"></i> Inicio</a>
        <a href="{{ route('soporte.index') }}">Soporte</a>
        <a href="{{ route('inventario.index') }}">Inventario</a>
        <a href="{{ route('crm.index') }}">CRM</a>
        <a href="{{ route('rh.index') }}">Recursos Humanos</a>

        <hr>

        @auth
            <div class="px-3 text-white">
                Hola, {{ Auth::user()->name }}
            </div>
            <form action="{{ route('logout') }}" method="POST" class="px-3 mt-2">
                @csrf
                <button class="btn btn-danger w-100">Cerrar sesión</button>
            </form>
        @endauth
        @guest
            <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a>
        @endguest
    </div>

    <!-- Contenido -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
