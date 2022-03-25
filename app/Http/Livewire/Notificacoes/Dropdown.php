<?php

namespace App\Http\Livewire\Notificacoes;

use Livewire\Component;
use App\Models\Notificacao;
use App\Models\NotificacaoRecebimento;

class Dropdown extends Component
{

    public $dropdown = false;

    protected $listeners = ['refreshDropdown' => '$refresh'];

    public function toggleDropdownNotificacoes(){
        if($this->dropdown == false){
            NotificacaoRecebimento::where("usuario_id", session()->get("usuario")["id"])->where("visto", false)->update(["visto" => true]);
            $this->emit("refreshDropdown");
        }
        $this->dropdown = !$this->dropdown;
    }

    public function render()
    {
        $notificacoes_recebimento = NotificacaoRecebimento::where("usuario_id", session()->get("usuario")["id"])->take(10)->get();
        if($notificacoes_recebimento->where("notificado", false)->count() > 0){
            $this->dispatchBrowserEvent("novaNotificacao");
        }
        if($notificacoes_recebimento->count() > 0){
            $notificacoes_recebimento->toQuery()->update(["notificado" => true]);
            $notificacoes_recebimento->fresh();
        }
        return view('livewire.notificacoes.dropdown', ["notificacoes_recebimento" => $notificacoes_recebimento]);
    }
}
