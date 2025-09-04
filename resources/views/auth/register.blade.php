<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Tailwind CSS desde CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
        
        <!-- Título -->
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-2">Crea tu cuenta</h2>
        <p class="text-center text-gray-500 text-sm mb-6">Únete y empieza ahora</p>
        
        @if ($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

        <!-- Formulario -->
        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Nombre -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nombre completo</label>
                <input type="text" name="name" 
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-400" 
                    required>
            </div>

            <!-- Correo -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input type="email" name="email" 
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-400" 
                    required>
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="password" 
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-400" 
                    required>
            </div>

            <!-- Confirmar contraseña -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" 
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-400" 
                    required>
                    </div>

            <!-- Cargo -->
            <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">Cargo</label>
            <select name="role" 
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-400" 
                required>
                <option value="">-- Selecciona tu cargo --</option>
                <option value="administrativo">Administrativo</option>
                <option value="operario">Operario</option>
                <option value="tecnico">Técnico</option>
            </select>
             </div>

            <!-- Botón -->
            <button type="submit" 
                class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                Registrarme
            </button>
        </form>

        <!-- Enlace de login -->
        <p class="text-center text-sm text-gray-500 mt-4">
            ¿Ya tienes cuenta? 
            <a href="<?php echo e(route('login')); ?>" class="text-blue-600 hover:underline">Inicia sesión</a>
        </p>
    </div>

</body>
</html>
