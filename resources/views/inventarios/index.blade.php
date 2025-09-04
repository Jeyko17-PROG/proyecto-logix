<!DOCTYPE html>

<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Módulo de Inventario</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>
.hover-scale:hover {
transform: scale(1.02);
}
</style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<!-- Barra de navegación -->
<nav class="bg-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/dashboard" class="text-xl font-bold text-gray-800">Logix</a>
        <div class="space-x-4">
            <a href="/comercial" class="text-gray-600 hover:text-blue-500">Comercial</a>
            <a href="/inventario" class="text-blue-500 font-bold border-b-2 border-blue-500">Inventario</a>
            <a href="/crm" class="text-gray-600 hover:text-blue-500">CRM</a>
            <a href="/rh" class="text-gray-600 hover:text-blue-500">Recursos Humanos</a>
            <a href="/soporte" class="text-gray-600 hover:text-blue-500">Soporte</a>
        </div>
        <form method="POST" action="/logout" class="inline">
            @csrf
            <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Cerrar sesión</button>
        </form>
    </div>
</nav>

<div class="container mx-auto mt-10 p-4">
    <h1 class="text-4xl font-extrabold text-gray-800 mb-6">Inventario</h1>

    <!-- Sección de Añadir Nuevo Equipo -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8 hover-scale transition duration-300">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Añadir Nuevo Equipo</h2>
        <form action="{{ route('inventario.store') }}" method="POST">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="equipo" class="block text-gray-700 font-semibold mb-2">Equipo</label>
                    <input type="text" name="equipo" id="equipo" class="w-full border-gray-300 rounded-lg shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label for="marca" class="block text-gray-700 font-semibold mb-2">Marca</label>
                    <input type="text" name="marca" id="marca" class="w-full border-gray-300 rounded-lg shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label for="serial" class="block text-gray-700 font-semibold mb-2">Serial</label>
                    <input type="text" name="serial" id="serial" class="w-full border-gray-300 rounded-lg shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label for="cantidad" class="block text-gray-700 font-semibold mb-2">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" class="w-full border-gray-300 rounded-lg shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-6 rounded-lg shadow-lg hover:bg-blue-700 transition duration-300">
                    Añadir Equipo
                </button>
            </div>
        </form>
    </div>

    <!-- Tabla de Inventario -->
    <div class="bg-white rounded-lg shadow-md p-6 overflow-x-auto">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Inventario Actual</h2>
        <table class="min-w-full bg-white border-collapse">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Equipo</th>
                    <th class="py-3 px-6 text-left">Marca</th>
                    <th class="py-3 px-6 text-left">Serial</th>
                    <th class="py-3 px-6 text-left">Cantidad</th>
                    <th class="py-3 px-6 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($inventarios as $equipo)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $equipo->equipo }}</td>
                    <td class="py-3 px-6 text-left">{{ $equipo->marca }}</td>
                    <td class="py-3 px-6 text-left">{{ $equipo->serial }}</td>
                    <td class="py-3 px-6 text-left">
                        <form action="{{ route('inventario.update', $equipo) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" name="cantidad" value="{{ $equipo->cantidad }}" class="w-24 border-gray-300 rounded-lg shadow-sm p-1 focus:ring-blue-500 focus:border-blue-500">
                            <button type="submit" class="bg-yellow-500 text-white p-1 rounded-lg ml-2 hover:bg-yellow-600 transition duration-300">Actualizar</button>
                        </form>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <form action="{{ route('inventario.destroy', $equipo) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este equipo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 transition duration-300">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>