<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <!-- Tailwind CSS desde CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" bg-purple-900 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
        
        <!-- Título -->
        <h2 class="text-center text-2xl font-bold text-gray-2000 mb-2">Bienvenido</h2>
        <p class="text-center text-gray-500 text-sm mb-6">Regístra tu cuenta</p>
        
        @if ($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><
        @endif
        <!-- Formulario -->
        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Correo -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input type="email" name="email" 
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-400" 
                    required autofocus>
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="password" 
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-400" 
                    required>
            </div>

            <!-- Recordarme -->
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2">
                    <span class="text-sm text-gray-600">Recordarme</span>
                </label>
                <a href="<?php echo e(route('password.request')); ?>" class="text-sm text-blue-600 hover:underline">
                    ¿Olvidaste tu contraseña?
                </a>
            </div>

            <!-- Botón -->
            <button type="submit" 
                class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                Iniciar sesión
            </button>
        </form>

        <!-- Enlace de registro -->
        <p class="text-center text-sm text-gray-500 mt-4">
            ¿No tienes cuenta? 
            <a href="<?php echo e(route('register')); ?>" class="text-blue-600 hover:underline">Regístrate</a>
        </p>
    </div>

</body>
</html>

