<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsigUsuariosFormulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asig_usuarios_formularios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_formulario')->constrained('formularios')->nullable();
            $table->foreignId('id_usuarios')->constrained('users')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asig_usuarios_formularios');
    }
}
