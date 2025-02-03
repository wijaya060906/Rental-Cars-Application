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
        Schema::create('mobils', function (Blueprint $table) {
            $table->string('nopol')->primary();
            $table->string('brand');
            $table->string('type');
            $table->date('tahun');
            $table->decimal('harga', 10, 2);
            $table->string('foto');
            $table->enum('status', ['Tersedia', 'Tidak']);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
