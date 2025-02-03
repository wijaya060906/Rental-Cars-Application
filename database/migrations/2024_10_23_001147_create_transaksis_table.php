<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nik')->constrained('members')->onDelete('cascade');
            $table->string('nopol'); // Ubah ini menjadi string
            $table->foreign('nopol')->references('nopol')->on('mobils')->onDelete('cascade');
            $table->date('tgl_booking');
            $table->date('tgl_ambil');
            $table->date('tgl_kembali');
            $table->tinyInteger('supir');
            $table->decimal('total', 10, 2);
            $table->decimal('downpayment', 10, 2);
            $table->decimal('kekurangan', 10, 2);
            $table->enum('status', ['Booking', 'approve', 'ambil', 'kembali']);
            $table->timestamps();
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
