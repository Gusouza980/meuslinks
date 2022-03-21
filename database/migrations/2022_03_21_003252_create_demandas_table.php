<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandas', function (Blueprint $table) {
            $table->id();
            $table->string("titulo", 100);
            $table->date("data");
            $table->boolean("completo")->default(false);
            $table->unsignedBigInteger("completo_por")->nullable()->default(null);
            $table->tinyInteger("tipo")->default(0);
            $table->timestamps();
            $table->foreign('completo_por')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandas');
    }
}
