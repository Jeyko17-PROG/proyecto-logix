<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proveedor</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Editar Proveedor</h1>

    <form action="{{ route('comercial.update', $proveedor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Nombre</label>
                <input type="text" name="nombre" value="{{ $proveedor->nombre }}" class="w-full border-gray-300 rounded-lg p-2" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Dirección</label>
                <input type="text" name="direccion" value="{{ $proveedor->direccion }}" class="w-full border-gray-300 rounded-lg p-2">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Correo</label>
                <input type="email" name="correo" value="{{ $proveedor->correo }}" class="w-full border-gray-300 rounded-lg p-2">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Teléfono</label>
                <input type="text" name="telefono" value="{{ $proveedor->telefono }}" class="w-full border-gray-300 rounded-lg p-2">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">NIT / Identificación</label>
                <input type="text" name="nit" value="{{ $proveedor->nit }}" class="w-full border-gray-300 rounded-lg p-2">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Contacto</label>
                <input type="text" name="contacto" value="{{ $proveedor->contacto }}" class="w-full border-gray-300 rounded-lg p-2">
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-gray-700 font-semibold mb-2">Observaciones</label>
            <textarea name="observaciones" class="w-full border-gray-300 rounded-lg p-2">{{ $proveedor->observaciones }}</textarea>
        </div>

        <div class="mt-6 flex justify-between">
            <a href="{{ route('comercial.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">Volver</a>
            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-6 rounded-lg hover:bg-blue-700 transition">
                Guardar Cambios
            </button>
        </div>
    </form>
</div>

</body>
</html>
