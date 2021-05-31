<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('user_type')->references('id')->on('user_types')->onDelete('cascade');
        });
        Schema::table('itens', function(Blueprint $table) {
            $table->foreign('categoria')->references('id')->on('categorias')->onDelete('cascade');
        });
        Schema::table('kits', function(Blueprint $table) {
            $table->foreign('categoria')->references('id')->on('categorias')->onDelete('cascade');
        });
        Schema::table('item_kits', function(Blueprint $table) {
            $table->foreign('id_item')->references('id')->on('itens')->onDelete('cascade');
            $table->foreign('id_kit')->references('id')->on('kits')->onDelete('cascade');
        });
        Schema::table('reservas', function(Blueprint $table) {
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('estado')->references('id')->on('estado_reservas')->onDelete('cascade');
        });
        Schema::table('reserva_items', function(Blueprint $table) {
            $table->foreign('id_item')->references('id')->on('itens')->onDelete('cascade');
            $table->foreign('id_reserva')->references('id')->on('reservas')->onDelete('cascade');
        });
        Schema::table('reserva_kits', function(Blueprint $table) {
            $table->foreign('id_kit')->references('id')->on('kits')->onDelete('cascade');
            $table->foreign('id_reserva')->references('id')->on('reservas')->onDelete('cascade');
        });
        Schema::table('user_centro_custos', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('centro_custos')->references('id')->on('centro_custos')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
