<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class TwoFactorController extends Controller
{
    protected $google2fa;

    public function __construct()
    {
        $this->google2fa = new Google2FA();
    }

    public function showSetupForm()
    {
        $user = Auth::user();

        if ($user->google2fa_secret && $user->two_factor_setup_done) {
            return redirect()->route('2fa.verify');
        }

        if (!$user->google2fa_secret) {
            $secretKey = $this->google2fa->generateSecretKey();
            $user->google2fa_secret = $secretKey;
            $user->save();
        } else {
            $secretKey = $user->google2fa_secret;
        }

        $qrCodeUrl = $this->google2fa->getQRCodeUrl(
            config('app.name'),
            $user->email,
            $secretKey
        );

        $renderer = new ImageRenderer(
            new RendererStyle(300),
            new SvgImageBackEnd()
        );
        $writer = new Writer($renderer);
        $qrCodeSvg = $writer->writeString($qrCodeUrl);

        return view('auth.2fa-setup', [
            'QR_Image' => $qrCodeSvg,
            'secret' => $secretKey
        ]);
    }

    public function storeSecret(Request $request)
    {
        $user = Auth::user();
        $user->two_factor_setup_done = true;
        $user->save();

        return redirect()->route('2fa.verify');
    }

    public function showVerifyForm()
    {
        return view('auth.2fa-verify');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'one_time_password' => 'required|digits:6',
        ]);

        $user = Auth::user();

        $valid = $this->google2fa->verifyKey(
            $user->google2fa_secret,
            $request->input('one_time_password')
        );

        if ($valid) {
            session(['2fa_passed' => true]);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['one_time_password' => 'Kode OTP tidak valid.']);
    }
}
