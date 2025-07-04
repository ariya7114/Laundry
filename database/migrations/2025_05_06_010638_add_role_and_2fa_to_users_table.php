<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleAnd2faToUsersTable extends Migration
{
    /**
     * Jalankan migrasi untuk menambah kolom role dan 2FA ke tabel users.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom 'role' untuk menyimpan peran pengguna
            $table->string('role')->default('pelanggan'); // Default role adalah pelanggan
            // Menambahkan kolom 'google2fa_secret' untuk menyimpan secret key 2FA
            $table->string('google2fa_secret')->nullable();
            // Menambahkan kolom 'google2fa_verified' untuk memverifikasi status 2FA
            $table->boolean('google2fa_verified')->default(false);
        });
    }

    /**
     * Balikkan perubahan yang dilakukan oleh migrasi ini.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus kolom 'role', 'google2fa_secret', dan 'google2fa_verified' jika migrasi dibatalkan
            $table->dropColumn(['role', 'google2fa_secret', 'google2fa_verified']);
        });
    }
}
