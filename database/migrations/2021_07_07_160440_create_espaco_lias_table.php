<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspacoLiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espaco_lia', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->double('preco');
            $table->timestamps();
        });

        Schema::create('items_espaco', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('espaco_id');
            $table->string('descricao');
            $table->timestamps();
            $table->foreign('espaco_id')->references('id')->on('espaco_lia');
        });

        Schema::create('reservar_espaco', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user');
            $table->string('descricao');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->double('preco');
            $table->timestamps();
            $table->foreign('user')->references('id')->on('users');
        });

        Schema::create('espaco_reserva', function (Blueprint $table) {
            $table->unsignedBigInteger('espaco_id');
            $table->unsignedBigInteger('reserva_id');
            $table->foreign('espaco_id')->references('id')->on('espaco_lia');
            $table->foreign('reserva_id')->references('id')->on('reservar_espaco');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('espaco_lia');
        Schema::dropIfExists('items_espaco');
        Schema::dropIfExists('reservar_espaco');
        Schema::dropIfExists('espaco_reserva');
        Schema::dropIfExists('espaco_user');
    }
}
