<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Auth\Events\Registered; // Contoh event yang akan didaftarkan
use App\Listeners\SendWelcomeEmail; // Contoh listener untuk event

class EventServiceProvider extends ServiceProvider
{
    /**
     * Daftar event dan listener yang terkait.
     *
     * @var array
     */
    protected $listen = [
        // Mendengarkan event Registered dan memanggil listener SendWelcomeEmail
        Registered::class => [
            SendWelcomeEmail::class,
        ],
    ];

    /**
     * Daftarkan event dan listener di sini.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
