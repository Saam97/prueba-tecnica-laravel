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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45)->nullable();
            $table->string('apellido', 45)->nullable();
            $table->string('email', 45)->uniqid();
            $table->bigInteger('telefono')->nullable();
            $table->string('pais', 45)->nullable();
            $table->string('password', 60)->nullable();
            $table->tinyInteger('confirmado')->default(0);
            $table->string('token', 60)->nullable();
            $table->tinyInteger('admin')->default(0);
            $table->string('imagen', 60)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
