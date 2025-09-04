<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FAQRCode\Google2FA; // si usas este paquete
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TwoFactorController extends Controller
{
    public function setup(Request $request)
    {
        return view('2fa.setup');
    }

    public function verify(Request $request)
    {
        $request->validate(['secret' => 'required', 'otp' => 'required']);

        if ((new Google2FA())->verifyKey($request->input('secret'), $request->input('otp'))) {
            $user = User::where('google2fa_secret', $request->input('secret'))->first();

            // new Event()
            Auth::login($user);

            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->withErrors(['otp' => 'El código OTP es incorrecto.']);
        }
    }

    public function disable(Request $request)
    {
        // Aquí quitamos el 2FA de la cuenta
    }
}
