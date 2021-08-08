<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cliente_id");
            $table->string("formulario", 50)->nullable();
            $table->string("email", 150)->nullable();
            $table->string("nome", 100)->nullable();
            $table->string("celular", 60)->nullable();
            $table->string("celular_uf", 50)->nullable();
            $table->string("ip", 150)->nullable();
            $table->string("ip_movel", 20)->nullable();
            $table->string("ip_uf", 20)->nullable();
            $table->string("ip_cidade", 50)->nullable();
            $table->string("browser", 50)->nullable();
            $table->string("browser_version", 20)->nullable();
            $table->string("os", 50)->nullable();
            $table->string("os_version", 20)->nullable();
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
