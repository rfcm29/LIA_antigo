<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria');
            $table->unsignedBigInteger('estado_kit');
            $table->string('descricao');
            $table->string('observacoes')->nullable();
            $table->string('lia_code');
            $table->string('ref_ipvc')->nullable();
            $table->double('preco');
            $table->unsignedBigInteger('id_kit')->nullable();
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
        Schema::dropIfExists('kits');
    }
}
