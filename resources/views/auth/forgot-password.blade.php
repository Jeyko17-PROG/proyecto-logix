<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvidé mi contraseña</title>
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">

        <!-- Título -->
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-2">¿Olvidaste tu contraseña?</h2>
        <p class="text-center text-gray-500 text-sm mb-6">
            Ingresa tu correo y te enviaremos un enlace para restablecerla
        </p>

        <!-- Mensaje de éxito si se envió -->
        <?php if (session('status')): ?>
            <div class="mb-4 text-green-600 text-sm text-center font-medium">
                <?php echo e(session('status')); ?>
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <form method="POST" action="<?php echo e(route('password.email')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Correo -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>" 
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-400" 
                       required autofocus>
            </div>

            <!-- Botón -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                Enviar enlace
            </button>
        </form>

        <!-- Enlace al login -->
        <p class="text-center text-sm text-gray-500 mt-4">
            <a href="<?php echo e(route('login')); ?>" class="text-blue-600 hover:underline">Volver al login</a>
        </p>
    </div>

</body>
</html>
