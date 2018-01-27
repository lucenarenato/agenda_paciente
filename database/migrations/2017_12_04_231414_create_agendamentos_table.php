<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_paciente')->unsigned()->nullable();
            $table->integer('id_medico')->unsigned()->nullable();
            $table->string('descricao');
            $table->datetime('datahora');
            $table->timestamps();
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_medico')->references('id')->on('medicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
}
