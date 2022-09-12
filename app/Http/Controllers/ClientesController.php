<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Elementos;
use App\Models\Lead;

class ClientesController extends Controller
{
    //
    public function consultar(){
        $clientes = Cliente::all();
        return view("painel.clientes.consultar", ["clientes" => $clientes]);
    }

    public function cadastro(){
        return view("painel.clientes.cadastro");
    }

    public function cadastrar(Request $request){
        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;
        $cliente->rua = $request->rua;
        $cliente->numero = $request->numero;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->estado = $request->estado;
        $cliente->cep = $request->cep;
        $cliente->url = $request->url;

        $cliente->nome_proprietario = $request->nome_proprietario;
        $cliente->telefone_proprietario = $request->telefone_proprietario;
        $cliente->email_proprietario = $request->email_proprietario;

        $cliente->ativo = $request->ativo;

        $cliente->whatsapp = $request->whatsapp;

        $cliente->login_google = $request->login_google;
        $cliente->senha_google = $request->senha_google;

        $cliente->facebook = $request->facebook;
        $cliente->login_facebook = $request->login_facebook;
        $cliente->senha_facebook = $request->senha_facebook;

        $cliente->linkedin = $request->linkedin;
        $cliente->login_linkedin = $request->login_linkedin;
        $cliente->senha_linkedin = $request->senha_linkedin;

        $cliente->instagram = $request->instagram;
        $cliente->login_instagram = $request->login_instagram;
        $cliente->senha_instagram = $request->senha_instagram;

        $cliente->pinterest = $request->pinterest;
        $cliente->login_pinterest = $request->login_pinterest;
        $cliente->senha_pinterest = $request->senha_pinterest;

        $cliente->youtube = $request->youtube;
        $cliente->login_youtube = $request->login_youtube;
        $cliente->senha_youtube = $request->senha_youtube;

        $cliente->twitter = $request->twitter;
        $cliente->login_twitter = $request->login_twitter;
        $cliente->senha_twitter = $request->senha_twitter;

        $cliente->google_negocio = $request->google_negocio;
        $cliente->login_google_negocio = $request->login_google_negocio;
        $cliente->senha_google_negocio = $request->senha_google_negocio;

        $cliente->tiktok = $request->tiktok;
        $cliente->login_tiktok = $request->login_tiktok;
        $cliente->senha_tiktok = $request->senha_tiktok;

        if($request->file("logo")){
            $cliente->logo = $request->file('logo')->store(
                'admin/images/logos/'.Str::slug($cliente->nome), 'local'
            );
        }

        $cliente->save();

        Log::channel('cadastros')->info('<b>CADASTRANDO CLIENTE #'.$cliente->id.'</b>: O usuario <b>' . session()->get("usuario")["usuario"] . '</b> cadastrou o cliente <b>' . $cliente->nome . '</b>.');

        toastr()->success("Cliente cadastrado com sucesso!");
        return redirect()->route("painel.clientes");
    }

    public function editar(Cliente $cliente){
        return view("painel.clientes.edicao", ["cliente" => $cliente]);
    }

    public function salvar(Request $request, Cliente $cliente){
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;
        $cliente->rua = $request->rua;
        $cliente->numero = $request->numero;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->estado = $request->estado;
        $cliente->cep = $request->cep;
        $cliente->url = $request->url;

        $cliente->nome_proprietario = $request->nome_proprietario;
        $cliente->telefone_proprietario = $request->telefone_proprietario;
        $cliente->email_proprietario = $request->email_proprietario;

        $cliente->ativo = $request->ativo;

        $cliente->observacoes = $request->observacoes;

        $cliente->titulo = $request->titulo;
        $cliente->cor_titulo = $request->cor_titulo;
        $cliente->subtitulo = $request->subtitulo;
        $cliente->cor_subtitulo = $request->cor_subtitulo;
        $cliente->slug = $request->slug;
        $cliente->cor_fundo_cartao = $request->cor_fundo_cartao;
        $cliente->cor_fundo_cartao_hover = $request->cor_fundo_cartao_hover;
        $cliente->cor_letra_cartao = $request->cor_letra_cartao;
        $cliente->cor_letra_cartao_hover = $request->cor_letra_cartao_hover;

        $cliente->whatsapp = $request->whatsapp;

        $cliente->login_google = $request->login_google;
        $cliente->senha_google = $request->senha_google;

        $cliente->facebook = $request->facebook;
        $cliente->login_facebook = $request->login_facebook;
        $cliente->senha_facebook = $request->senha_facebook;

        $cliente->linkedin = $request->linkedin;
        $cliente->login_linkedin = $request->login_linkedin;
        $cliente->senha_linkedin = $request->senha_linkedin;

        $cliente->instagram = $request->instagram;
        $cliente->login_instagram = $request->login_instagram;
        $cliente->senha_instagram = $request->senha_instagram;

        $cliente->pinterest = $request->pinterest;
        $cliente->login_pinterest = $request->login_pinterest;
        $cliente->senha_pinterest = $request->senha_pinterest;

        $cliente->youtube = $request->youtube;
        $cliente->login_youtube = $request->login_youtube;
        $cliente->senha_youtube = $request->senha_youtube;

        $cliente->twitter = $request->twitter;
        $cliente->login_twitter = $request->login_twitter;
        $cliente->senha_twitter = $request->senha_twitter;

        $cliente->google_negocio = $request->google_negocio;
        $cliente->login_google_negocio = $request->login_google_negocio;
        $cliente->senha_google_negocio = $request->senha_google_negocio;

        $cliente->tiktok = $request->tiktok;
        $cliente->login_tiktok = $request->login_tiktok;
        $cliente->senha_tiktok = $request->senha_tiktok;

        $cliente->tag_facebook_pixel = $request->tag_facebook_pixel;

        if($request->file("logo")){
            Storage::delete($cliente->logo);
            $cliente->logo = $request->file('logo')->store(
                'admin/images/logos/'.Str::slug($cliente->nome), 'local'
            );
        }

        if($request->file("fundo")){
            Storage::delete($cliente->fundo);
            $cliente->fundo = $request->file('fundo')->store(
                'admin/images/rede/'.Str::slug($cliente->nome), 'local'
            );
        }

        if($request->file("fundo_mobile")){
            Storage::delete($cliente->fundo_mobile);
            $cliente->fundo_mobile = $request->file('fundo_mobile')->store(
                'admin/images/rede/'.Str::slug($cliente->nome), 'local'
            );
        }

        foreach($cliente->getChanges() as $campo => $valor){
            if(!in_array($campo, ["updated_at"])){
                Log::channel('cadastros')->info('<b>EDITANDO CLIENTE #' . $cliente->id . '</b>: O usuario <b>' . session()->get("usuario")["usuario"] . '</b> alterou o valor do campo <b>' . $campo . '</b> de <b>' . $old[$campo] . '</b> para <b>' . $valor . '</b>');
            }
        }

        $cliente->save();

        toastr()->success("Cadastro atualizado com sucesso!");
        return redirect()->route('painel.clientes');
    }

    public function rede(Request $request, Cliente $cliente){
        switch ($request->name) {
            case "facebook_ativo":
                if($cliente->facebook_ativo){
                    $cliente->facebook_ativo = false;
                    $msg = "O Facebook foi removido";
                }else{
                    $cliente->facebook_ativo = true;
                    $msg = "O Facebook foi adicionado";
                }
                
                break;
            case "linkedin_ativo":
                if($cliente->linkedin_ativo){
                    $cliente->linkedin_ativo = false;
                    $msg = "O Linkedin foi removido";
                }else{
                    $cliente->linkedin_ativo = true;
                    $msg = "O Linkedin foi adicionado";
                }
                break;
            case "instagram_ativo":
                if($cliente->instagram_ativo){
                    $cliente->instagram_ativo = false;
                    $msg = "O Instagram foi removido";
                }else{
                    $cliente->instagram_ativo = true;
                    $msg = "O Instagram foi adicionado";
                }
                break;
            case "pinterest_ativo":
                if($cliente->pinterest_ativo){
                    $cliente->pinterest_ativo = false;
                    $msg = "O Pinterest foi removido";
                }else{
                    $cliente->pinterest_ativo = true;
                    $msg = "O Pinterest foi adicionado";
                }
                break;
            case "twitter_ativo":
                if($cliente->twitter_ativo){
                    $cliente->twitter_ativo = false;
                    $msg = "O Twitter foi removido";
                }else{
                    $cliente->twitter_ativo = true;
                    $msg = "O Twitter foi adicionado";
                }
                break;
            case "youtube_ativo":
                if($cliente->youtube_ativo){
                    $cliente->youtube_ativo = false;
                    $msg = "O Youtube foi removido";
                }else{
                    $cliente->youtube_ativo = true;
                    $msg = "O Youtube foi adicionado";
                }
                break;
            case "google_negocio_ativo":
                if($cliente->google_negocio_ativo){
                    $cliente->google_negocio_ativo = false;
                    $msg = "O Google Meu Negócio foi removido";
                }else{
                    $cliente->google_negocio_ativo = true;
                    $msg = "O Google Meu Negócio foi adicionado";
                }
                break;
            case "tiktok_ativo":
                if($cliente->tiktok_ativo){
                    $cliente->tiktok_ativo = false;
                    $msg = "O Tiktok foi removido";
                }else{
                    $cliente->tiktok_ativo = true;
                    $msg = "O Tiktok foi adicionado";
                }
                break;
        }

        $cliente->save();

        // switch($request->name)
        return response()->json($msg, 200);
    }

    public function adicionar_rede(Request $request, Cliente $cliente){
        $elemento = new Elementos;
        $elemento->cliente_id = $cliente->id;
        if($request->file("imagem")){
            $elemento->imagem = $request->file('imagem')->store(
                'admin/images/rede/'.Str::slug($cliente->nome), 'local'
            );
        }

        $elemento->titulo = $request->titulo;
        $elemento->link = $request->link;
        $elemento->posicao = $request->posicao;
        $elemento->save();

        toastr()->success("Elemento adicionado ao links da(o) " . $cliente->nome);
        return redirect()->back()->with("meuslinks", "meuslinks");
    }

    public function salvar_rede(Request $request, Elementos $elemento){
        if($request->file("imagem")){
            Storage::delete($elemento->imagem);
            $elemento->imagem = $request->file('imagem')->store(
                'admin/images/rede/'.Str::slug($elemento->imagem), 'local'
            );
        }

        $elemento->titulo = $request->titulo;
        $elemento->link = $request->link;
        $elemento->posicao = $request->posicao;
        $elemento->save();

        toastr()->success("Elemento salvo com sucesso");
        return redirect()->back()->with("meuslinks", "meuslinks");
    }

    public function remover_rede(Elementos $elemento){
        Storage::delete($elemento->imagem);
        $elemento->delete();
        toastr()->success("Elemento removido com sucesso");
        return redirect()->back()->with("meuslinks", "meuslinks");
    }

    public function relatorio(Cliente $cliente){
        $dados = array();
        $dados["elementos"] = array();
        $dados["total_visitantes"] = 0;
        $dados["total_acessos"] = 0;
        $dados["total_clicks"] = 0;
        $dados["acessos_com_click"] = 0;
        $dados["clicks_elementos"] = 0;
        $dados["clicks_redes"] = 0;


        foreach($cliente->elementos as $elemento){
            $dados["elementos"][$elemento->id]["total_clicks"] = 0;
            $dados["elementos"][$elemento->id]["text"] = $elemento->titulo;
        }

        foreach(config("globals.redes") as $codigo => $texto){
            $dados["redes"][$codigo]["total_clicks"] = 0;
            $dados["redes"][$codigo]["text"] = $texto;
        }

        if($cliente->acessos){
            $visitantes = $cliente->acessos->groupBy("visitante_id");
            foreach($visitantes as $visitante => $acessos){
                $dados["visitantes"][$visitante]["total_acessos"] = 0;
                $dados["total_visitantes"] += 1;
                foreach($acessos as $acesso){
                    $dados["total_acessos"] += 1;
                    $dados["visitantes"][$visitante]["acessos"][] = $acesso; 
                    $dados["visitantes"][$visitante]["total_acessos"] += 1;
                    if($acesso->clicks->count() > 0){
                        $dados["acessos_com_click"] += 1;
                        foreach($acesso->clicks as $click){
                            if($click->elemento){
                                $dados["elementos"][$click->element->id]["total_clicks"] += 1;
                                $dados["clicks_elementos"] += 1;
                            }else{
                                $dados["redes"][$click->tipo_rede]["total_clicks"] += 1;
                                $dados["clicks_redes"] += 1;
                            }
                            $dados["total_clicks"] += 1;
                        }
                    }
                }
            }
        }

        return view("painel.clientes.relatorio", [
            "dados" => $dados,
            "cliente" => $cliente,
        ]);
    }

    public function leads(Cliente $cliente){
        return view("painel.leads.consultar", ["leads" => $cliente->leads]);
    }
}
