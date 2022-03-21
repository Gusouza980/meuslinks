<?php

namespace App\Http\Livewire\Demandas;

use Livewire\Component;
use App\Models\Demanda;

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
        \Log::channel('demandas')->info("[".config("globals.tipo_demandas")[$demanda->tipo]."] " . "O usuario <b>" . session()->get("usuario")["nome"] . "</b> cadastrou a demanda <b>$demanda->titulo</b> pro dia <b>" . date("d/m/Y", strtotime($demanda->data)) . "</b>");
        $this->emit("atualizaCalendario");
        $this->dispatchBrowserEvent("fechaModalCadastro");
    }

    public function render()
    {
        return view('livewire.demandas.modal-cadastro');
    }
}
