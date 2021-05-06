<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApellidosToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('fecha_nacimiento')->nullable();
            $table->string('cedula',15)->nullable();
            $table->string('numero_telefono',7)->nullable();
            $table->string('numero_celular',11)->nullable();
            $table->string('genero')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('fecha_nacimiento');
            $table->dropColumn('cedula');
            $table->dropColumn('numero_telefono');
            $table->dropColumn('numero_celular');
            $table->dropColumn('genero');
        });
    }
}
