<?php

namespace App\Http\Livewire\Demandas;

use Livewire\Component;
use App\Models\Demanda;
use App\Models\Notificacao;
use App\Models\NotificacaoRecebimento;

class ModalCadastro extends Component
{
    public $data;
    public $tipo;
    public $titulo;

    protected $listeners = ["carregaCadastro"];

    public function carregaCadastro($data, $tipo){
        $this->data = $data;
        $this->tipo = $tipo;
        $this->titulo = null;
        $this->dispatchBrowserEvent("abreModalCadastro");
    }

    public function salvar(){
        $demanda = new Demanda;
        $demanda->titulo = $this->titulo;
        $demanda->data = $this->data;
        $demanda->tipo = $this->tipo;
        $demanda->save();

        $notificacao = new Notificacao;
        $notificacao->usuario_id = session()->get("usuario")["id"];
        $notificacao->demanda_id = $demanda->id;
        $notificacao->area = $demanda->tipo;
        $notificacao->tipo = 0;
        $notificacao->save();

        foreach(\App\Models\Usuario::where("area", 0)->orWhere("area", $notificacao->area)->get() as $usuario){
            if($usuario->id != session()->get("usuario")["id"]){
                $notificacao_recebimento = new NotificacaoRecebimento;
                $notificacao_recebimento->notificacao_id = $notificacao->id;
                $notificacao_recebimento->usuario_id = $usuario->id;
                $notificacao_recebimento->save();
            }
        }

        \Log::channel('demandas')->info("[".config("globals.tipo_demandas")[$demanda->tipo]."] " . "O usuario <b>" . session()->get("usuario")["nome"] . "</b> cadastrou a demanda <b>$demanda->titulo</b> pro dia <b>" . date("d/m/Y", strtotime($demanda->data)) . "</b>");
        $this->emit("atualizaCalendario");
        $this->dispatchBrowserEvent("fechaModalCadastro");
    }

    public function render()
    {
        return view('livewire.demandas.modal-cadastro');
    }
}
