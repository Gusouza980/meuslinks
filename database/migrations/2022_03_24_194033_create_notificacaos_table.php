<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacaos', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("tipo");
            $table->unsignedBigInteger("usuario_id")->nullable();
            $table->unsignedBigInteger("demanda_id")->nullable();
            $table->tinyInteger("area");
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('demanda_id')->references('id')->on('demandas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notificacaos');
    }
}
