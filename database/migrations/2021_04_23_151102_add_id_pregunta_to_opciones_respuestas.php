<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdPreguntaToOpcionesRespuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opciones_respuestas', function (Blueprint $table) {
           $table->foreignId('id_pregunta')->constrained('preguntas')->nullable() ->after('Opcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opciones_respuestas', function (Blueprint $table) {
            $table->dropColumn('id_pregunta');
        });
    }
}
