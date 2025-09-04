<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use PragmaRX\Google2FA\Google2FA; // 👈 importa la librería
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class RegisteredUserController extends Controller
{


    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $google2fa = new Google2FA();

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->input('role'), // por defecto es operario
            'google2fa_secret' => $google2fa->generateSecretKey(), // inicialmente nulo
        ]);

        // Generar la URL para Google Authenticator (otpauth://)
        $qrUrl = $google2fa->getQRCodeUrl(
            'MiApp',               // Nombre de la aplicación
            $user->email,          // Identificador (email del user)
            $user->google2fa_secret
        );

        // Renderizar el QR como imagen SVG
        $renderer = new ImageRenderer(
            new RendererStyle(200),
            new SvgImageBackEnd()
        );
        $writer = new Writer($renderer);

        $qrImage = base64_encode($writer->writeString($qrUrl));

        session()->put('qrImage', $qrImage);
        session()->put('secret', $user->google2fa_secret);

        // Redirigir y enviar QR + secret a la vista de configuración 2FA
        return redirect()->route('2fa.setup')->with([
            'qrImage' => $qrImage,
            'secret' => $user->google2fa_secret,
        ]);
    }
};
