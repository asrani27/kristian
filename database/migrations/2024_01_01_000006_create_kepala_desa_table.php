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
        Schema::create('kepala_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('status')->default('aktif');
            $table->date('tanggal_menjabat');
            $table->date('tanggal_demisioner')->nullable();
            $table->text('alamat')->nullable();
            $table->string('foto')->nullable();
            $table->foreignId('desa_id')->constrained('desa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepala_desa');
    }
};
