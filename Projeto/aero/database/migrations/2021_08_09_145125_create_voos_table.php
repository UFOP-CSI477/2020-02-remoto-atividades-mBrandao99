<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('aeroporto_saida_id');
            $table->unsignedInteger('aeroporto_chegada_id');
            $table->unsignedInteger('empresa_id');
            $table->dateTime('saida');
            $table->dateTime('chegada');
            $table->double('primeira', 10, 2);
            $table->double('executiva', 10, 2);
            $table->double('economica', 10, 2);
            $table->foreign('aeroporto_saida_id')->references('id')->on('aeroportos');
            $table->foreign('aeroporto_chegada_id')->references('id')->on('aeroportos');
            $table->foreign('empresa_id')->references('id')->on('empresas');
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
        Schema::dropIfExists('voos');
    }
}
