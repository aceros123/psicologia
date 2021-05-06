<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdUsuarioToInforme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informe', function (Blueprint $table) {
            $table->foreignId('id_usuarios')->constrained('users')->nullable()->after('id_tipo_informe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informe', function (Blueprint $table) {
            $table->dropColumn('id_usuarios');
        });
    }
}
