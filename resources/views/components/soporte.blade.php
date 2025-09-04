<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Soporte</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <!-- Barra superior -->
    <nav class="bg-white border-b border-gray-200 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/dashboard" class="text-xl font-bold text-blue-600">
                        Mi Plataforma
                    </a>
                </div>

                <!-- Menú -->
                <div class="hidden sm:flex space-x-6">
                    <a href="/dashboard" class="text-gray-700 hover:text-blue-600">Inicio</a>
                    <a href="/comercial" class="text-gray-700 hover:text-blue-600">Comercial</a>
                    <a href="/inventario" class="text-gray-700 hover:text-blue-600">Inventario</a>
                    <a href="/crm" class="text-gray-700 hover:text-blue-600">CRM</a>
                    <a href="/rh" class="text-gray-700 hover:text-blue-600">Recursos Humanos</a>
                    <a href="/soporte" class="text-gray-700 font-bold border-b-2 border-blue-600">Soporte</a>
                </div>

                <!-- Usuario -->
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">
                        {{ Auth::user()->name }}
                    </span>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="max-w-7xl mx-auto py-10 px-6">
        <h1 class="text-3xl font-bold text-gray-800">Módulo de Soporte</h1>
        <p class="mt-4 text-gray-600">
            Bienvenido al módulo de soporte. Aquí podrás gestionar incidencias y solicitudes.
        </p>

        <!-- Tarjetas -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition">
                <h2 class="text-lg font-semibold text-gray-700">Tickets</h2>
                <p class="text-gray-500 mt-2">Consulta los tickets de soporte activos.</p>
            </div>
            <div class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition">
                <h2 class="text-lg font-semibold text-gray-700">Reportes</h2>
                <p class="text-gray-500 mt-2">Genera reportes de incidencias resueltas.</p>
            </div>
            <div class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition">
                <h2 class="text-lg font-semibold text-gray-700">FAQs</h2>
                <p class="text-gray-500 mt-2">Consulta preguntas frecuentes.</p>
            </div>
        </div>
    </main>

</body>
</html>
<!DOCTYPE html>
