<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Plataforma</title>
    @vite('resources/css/app.css')
</head>
<body class="flex bg-gray-100">

    <!-- Sidebar -->
    @include('partials.sidebar', ['active' => $active ?? ''])

    <!-- Contenido principal -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</body>
</html>

