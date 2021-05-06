<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->text('pregunta')->nullable();
            $table->foreignId('id_tipo_pregunta')->constrained('tipo_pregunta')->nullable();
            $table->integer('id_pregunta_depende'); //selecciona la pregunta de la que dependen 
            $table->integer('id_respuesta_depende'); // selecciona las respuestas de las que depende
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
        Schema::dropIfExists('preguntas');
    }
}
