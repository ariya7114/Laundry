<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Ensure2FAIsVerified
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Jika belum login, arahkan ke halaman login
        if (!$user) {
            return redirect()->route('login');
        }

        // Jika user adalah pelanggan, lewati 2FA
        if ($user->hasRole('pelanggan')) {
            return $next($request);
        }

        // Jika belum setup QR Code (belum klik "Lanjut ke OTP"), arahkan ke setup
        if (!$user->google2fa_secret || !$user->two_factor_setup_done) {
            return redirect()->route('2fa.setup');
        }

        // Jika sudah setup tapi belum verifikasi OTP, arahkan ke halaman verifikasi
        if (!$request->session()->get('2fa_passed')) {
            return redirect()->route('2fa.verify');
        }

        // Lolos semua, lanjut ke halaman berikutnya
        return $next($request);
    }
}
