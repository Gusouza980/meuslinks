<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Demanda;

class Calendario extends Component
{

    public $mes;
    public $ano;
    public $dias;
    public $tipo = 0;

    protected $listeners = ["atualizaCalendario" => '$refresh', "checkDemanda"];

    public function voltar(){
        $data = date("Y-m-d", strtotime($this->ano . "-" . $this->mes . "-01 - 1 months"));
        $this->mes = intval(date("m", strtotime($data)));
        $this->ano = intval(date("Y", strtotime($data)));
        $this->dias = intval(date("t", strtotime($data)));
        $this->emit("atualizaCalendario");
    }

    public function avancar(){
        $data = date("Y-m-d", strtotime($this->ano . "-" . $this->mes . "-01 + 1 months"));
        $this->mes = intval(date("m", strtotime($data)));
        $this->ano = intval(date("Y", strtotime($data)));
        $this->dias = intval(date("t", strtotime($data)));
        $this->emit("atualizaCalendario");
    }

    public function mount(){
        $this->dias = intval(date("t"));
        $this->mes = intval(date("m"));
        $this->ano = intval(date("Y"));
    }

    public function checkDemanda(Demanda $demanda){
        if($demanda->completo){
            $demanda->completo = false;
            $demanda->completo_por = null;
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Demanda marcada como incompleta.']);
        }else{
            $demanda->completo = true;
            $demanda->completo_por = session()->get("usuario")["id"];
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Demanda completada com sucesso.']);
        }
        $demanda->save();
        \Log::channel('demandas')->info("[".config("globals.tipo_demandas")[$demanda->tipo]."] " . "O usuario <b>" . session()->get("usuario")["nome"] . "</b> marcou como completa a demanda <b>$demanda->titulo</b> do dia <b>" . date("d/m/Y", strtotime($demanda->data)) . "</b>");
        $this->emit("atualizaCalendario");
    }

    public function removerDemanda(Demanda $demanda){
        \Log::channel('demandas')->info("[".config("globals.tipo_demandas")[$demanda->tipo]."] " . "O usuario <b>" . session()->get("usuario")["nome"] . "</b> removeu a demanda <b>$demanda->titulo</b> do dia <b>" . date("d/m/Y", strtotime($demanda->data)) . "</b>");
        $demanda->delete();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Demanda removida com sucesso.']);
        $this->emit("atualizaCalendario");
    }

    public function trocaTipo($tipo){
        $this->tipo = $tipo;
        $this->emit("atualizaCalendario");
    }
    
    public function render()
    {   
        $data = date("Y-m-d", strtotime($this->ano . "-" . $this->mes . "-01"));
        $demandas = Demanda::where([["tipo", "=", $this->tipo], ["data", ">=", date("Y-m", strtotime($data)) . "-01"], ["data", "<=", date("Y-m", strtotime($data)) . "-" . date("t", strtotime($data))]])->get();
        return view('livewire.calendario', ["data" => $data, "dias" => date("t", strtotime($data)), "demandas" => $demandas]);
    }
}
