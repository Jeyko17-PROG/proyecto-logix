<!DOCTYPE html>
<html>

<head>
    <title>Configurar 2FA</title>
</head>

<body>
    <h1>Hola Mundo desde la vista 2FA 🎉</h1>
    <div class="container text-center">
        <h2>Configura tu Autenticación de Dos Factores (2FA)</h2>
        <p>Escanea este código con Google Authenticator:</p>

        <img src="data:image/svg+xml;base64, {{ session('qrImage') }}" alt="QR Code">

        <p>O ingresa esta clave manualmente: <strong>{{ session('secret') }}</strong></p>

        <form method="POST" action="{{ route('2fa.verify') }}">
            @csrf
            <label for="otp">Código de verificación:</label>
            <input type="hidden" name="secret" value="{{ session('secret') }}">
            <input type="text" name="otp" required>
            <button type="submit">Verificar</button>
        </form>

        @error('otp')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

</body>

</html>