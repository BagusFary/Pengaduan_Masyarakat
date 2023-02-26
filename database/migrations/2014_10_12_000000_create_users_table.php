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
        Schema::create('users', function (Blueprint $table) {
            $table->char('id', '16')->unsignedBigInteger()->primary();
            $table->string('nama', 35);
            $table->string('username', '32');
            $table->string('password', 255);
            $table->string('telp', 13);
            $table->enum('level', ['masyarakat', 'petugas', 'admin']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
