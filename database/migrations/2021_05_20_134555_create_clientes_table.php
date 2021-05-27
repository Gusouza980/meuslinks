<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 60)->nullable();
            $table->string("email", 50)->nullable();
            $table->string("telefone", 15)->nullable();
            $table->string("rua", 150)->nullable();
            $table->string("numero", 10)->nullable();
            $table->string("bairro", 50)->nullable();
            $table->string("cidade", 50)->nullable();
            $table->string("estado", 2)->nullable();
            $table->string("cep", 20)->nullable();
            $table->text("observacoes")->nullable();
            $table->string("nome_proprietario", 60)->nullable();
            $table->string("telefone_proprietario", 15)->nullable();
            $table->string("email_proprietario", 50)->nullable();
            $table->string("logo", 255)->nullable();
            $table->string("slug", 20)->nullable();
            $table->string("titulo", 100)->nullable();
            $table->string("cor_titulo", 7)->nullable();
            $table->string("subtitulo", 255)->nullable();
            $table->string("cor_subtitulo", 7)->nullable();
            $table->string("fundo", 255)->nullable();
            $table->string("cor_fundo_cartao", 7)->nullable();
            $table->string("cor_fundo_cartao_hover", 7)->nullable();
            $table->string("cor_letra_cartao", 7)->nullable();
            $table->string("cor_letra_cartao_hover", 7)->nullable();
            $table->boolean("facebook_ativo")->default(false);
            $table->boolean("linkedin_ativo")->default(false);
            $table->boolean("instagram_ativo")->default(false);
            $table->boolean("pinterest_ativo")->default(false);
            $table->boolean("twitter_ativo")->default(false);
            $table->boolean("youtube_ativo")->default(false);
            $table->boolean("google_negocio_ativo")->default(false);
            $table->boolean("tiktok_ativo")->default(false);
            $table->string("url", 255)->nullable();
            $table->string("tiktok", 255)->nullable();
            $table->string("login_tiktok", 50)->nullable();
            $table->string("senha_tiktok", 50)->nullable();
            $table->string("facebook", 255)->nullable();
            $table->string("login_facebook", 50)->nullable();
            $table->string("senha_facebook", 50)->nullable();
            $table->string("instagram", 255)->nullable();
            $table->string("login_instagram", 50)->nullable();
            $table->string("senha_instagram", 50)->nullable();
            $table->string("youtube", 255)->nullable();
            $table->string("login_youtube", 50)->nullable();
            $table->string("senha_youtube", 50)->nullable();
            $table->string("linkedin", 255)->nullable();
            $table->string("login_linkedin", 50)->nullable();
            $table->string("senha_linkedin", 50)->nullable();
            $table->string("pinterest", 255)->nullable();
            $table->string("login_pinterest", 50)->nullable();
            $table->string("senha_pinterest", 50)->nullable();
            $table->string("twitter", 255)->nullable();
            $table->string("login_twitter", 50)->nullable();
            $table->string("senha_twitter", 50)->nullable();
            $table->string("whatsapp", 255)->nullable();
            $table->string("google_negocio", 255)->nullable();
            $table->string("login_google_negocio", 50)->nullable();
            $table->string("senha_google_negocio", 50)->nullable();
            $table->string("login_google", 60)->nullable();
            $table->string("senha_google", 50)->nullable();
            $table->boolean("ativo")->default(true);
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
        Schema::dropIfExists('clientes');
    }
}
