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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_trabajo');
            $table->string('region_trabajo');
            $table->string('empresa');
            $table->string('tipo_trabajo');
            $table->boolean('vacante')->default(true);
            $table->string('experiencia');
            $table->string('salario')->nullable();
            $table->string('genero')->nullable();
            $table->text('responsabilidades');
            $table->text('descripcion_trabajo');
            $table->text('educacion_experiencia');
            $table->text('otrosbeneficios')->nullable();
            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('categoria');
            $table->foreign('categoria')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
