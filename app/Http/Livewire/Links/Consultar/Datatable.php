<?php

namespace App\Http\Livewire\Links\Consultar;

use Livewire\Component;
use App\Models\Link;
use App\Models\Cliente;

class Datatable extends Component
{

    public $cliente;

    protected $listeners = ["atualizaDatatable" => '$refresh'];

    public function removerLink(Link $link){
        $link->delete();
        $this->emit('$refresh');
    }

    public function mount(Cliente $cliente){
        $this->cliente = $cliente;
    }

    public function render()
    {
        $links = Link::where("cliente_id", $this->cliente->id)->orderBy("created_at", "DESC")->paginate(15);
        return view('livewire.links.consultar.datatable', ["links" => $links]);
    }
}
