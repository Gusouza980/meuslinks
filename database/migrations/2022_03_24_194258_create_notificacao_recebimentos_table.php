<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacaoRecebimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacao_recebimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("notificacao_id");
            $table->unsignedBigInteger("usuario_id");
            $table->boolean("visto")->default(false);
            $table->boolean("notificado")->default(false);
            $table->timestamps();
            $table->foreign('notificacao_id')->references('id')->on('notificacaos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notificacao_recebimentos');
    }
}
