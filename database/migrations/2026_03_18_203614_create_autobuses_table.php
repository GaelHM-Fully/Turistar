<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('autobuses', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->string('marca');
            $table->year('anio');
            $table->integer('capacidad_pasajeros');
            $table->enum('tipo_autobus', ['Urbano', 'Interurbano', 'Articulado'])
                  ->default('Urbano');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('autobuses');
    }
};