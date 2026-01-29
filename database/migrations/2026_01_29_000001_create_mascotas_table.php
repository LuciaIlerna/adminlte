<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_mascota');
            $table->string('nombre_dueno');
            $table->string('raza')->nullable();
            $table->unsignedTinyInteger('edad')->nullable(); // años
            $table->string('tamano')->nullable(); // p.ej. pequeño/mediano/grande
            $table->decimal('peso', 6, 2)->nullable(); // kg
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
};