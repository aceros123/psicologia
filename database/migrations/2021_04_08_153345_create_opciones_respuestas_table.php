<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpcionesRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opciones_respuestas', function (Blueprint $table) {
            $table->id();
            $table->String('Opcion');
         // $table->foreignId('id_pregunta')->constrained('preguntas')->nullable(); ingresado en la migracion add_pregunta_opciones
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opciones_respuestas');
    }
}
