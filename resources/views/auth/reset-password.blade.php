<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer contraseña</title>
    <!-- Tailwind CSS desde CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
        
        <!-- Título -->
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-2">Restablecer contraseña</h2>
        <p class="text-center text-gray-500 text-sm mb-6">Ingresa tu nueva contraseña</p>

        <!-- Formulario -->
        <form method="POST" action="<?php echo e(route('password.store')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Token oculto -->
            <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">

            <!-- Correo -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input type="email" name="email" value="<?php echo e(old('email', $request->email)); ?>"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-400"
                    required autofocus>
            </div>

            <!-- Nueva contraseña -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nueva contraseña</label>
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

            <!-- Botón -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                Restablecer contraseña
            </button>
        </form>

        <!-- Enlace al login -->
        <p class="text-center text-sm text-gray-500 mt-4">
            ¿Ya la recordaste? 
            <a href="<?php echo e(route('login')); ?>" class="text-blue-600 hover:underline">Inicia sesión</a>
        </p>
    </div>

</body>
</html>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>