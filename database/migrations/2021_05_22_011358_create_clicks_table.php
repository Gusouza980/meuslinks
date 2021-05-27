<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clicks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("visitante_id");
            $table->unsignedBigInteger("acesso_id");
            $table->unsignedBigInteger("elemento_id")->nullable();
            $table->boolean("elemento")->default(true);
            $table->boolean("rede")->default(false);
            /*
                0 => Site
                1 => Whatsapp
                2 => Facebook
                3 => Linkedin
                4 => Instagram
                5 => Pinterest
                6 => Twitter
                7 => Youtube
                8 => Tiktok
                9 => Email
            */
            $table->boolean("tipo_rede")->nullable();
            $table->foreign('visitante_id')->references('id')->on('visitantes')->onDelete('cascade');
            $table->foreign('acesso_id')->references('id')->on('acessos')->onDelete('cascade');
            $table->foreign('elemento_id')->references('id')->on('elementos')->onDelete('cascade');
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
        Schema::dropIfExists('clicks');
    }
}
