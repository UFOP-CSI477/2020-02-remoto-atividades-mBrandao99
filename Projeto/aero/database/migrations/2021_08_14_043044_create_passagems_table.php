<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passagems', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('voo_id');
            $table->unsignedInteger('user_id');
            $table->integer('classe');
            $table->foreign('voo_id')->references('id')->on('voos');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('passagems');
    }
}
