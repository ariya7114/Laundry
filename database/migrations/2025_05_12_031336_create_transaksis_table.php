<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('transaksis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kasir_id')->constrained('users'); // atau nullable kalau tidak langsung dihubungkan
        $table->string('jenis_jasa'); // cuci, gosok, dll
        $table->float('berat'); // dalam kg
        $table->decimal('total_harga', 12, 2);
        $table->enum('metode_pembayaran', ['cash', 'transfer']);
        $table->enum('status', ['proses', 'selesai'])->default('proses');
        $table->timestamps(); // created_at = tanggal transaksi
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
