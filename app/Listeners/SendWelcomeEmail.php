<?php

namespace App\Listeners;

use App\Events\Registered;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        // Mengirim email selamat datang setelah pengguna terdaftar
        Mail::to($event->user->email)->send(new WelcomeEmail($event->user));
    }
}

