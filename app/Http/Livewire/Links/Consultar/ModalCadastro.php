<?php

namespace App\Http\Livewire\Links\Consultar;

use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Link;
use App\Models\Cliente;

class ModalCadastro extends Component
{

    public $cliente;
    public $link_id;
    public $descricao;
    public $codigo;
    public $link;

    protected $listeners = ["carregaModalCadastro", "carregaModalEdicao"];

    public function carregaModalCadastro(){
        \Log::debug("FOI");
        $this->resetar();
        $this->dispatchBrowserEvent("abreModalCadastroLink");
    }

    public function carregaModalEdicao(Link $link){
        $this->link_id = $link->id;
        $this->descricao = $link->descricao;
        $this->codigo = $link->codigo;
        $this->link = $link->link;
        $this->dispatchBrowserEvent("abreModalCadastroLink");
    }

    public function salvar(){
        if($this->link_id){
            $link = Link::find($this->link_id);
        }else{
            $link = new Link;
            $codigo = null;
            while(!$codigo || Link::where("codigo", $codigo)->first()){
                $codigo = Str::random(7);
            }
            $link->codigo = $codigo;
        }

        $link->cliente_id = $this->cliente->id;
        $link->descricao = $this->descricao;
        $link->slug = Str::slug($this->descricao);
        $link->link = $this->link;
        $link->save();
        $this->dispatchBrowserEvent("fechaModalCadastroLink");
        $this->emit("atualizaDatatable");
    }

    public function resetar(){
        $this->link_id = null;
        $this->descricao = null;
        $this->link = null;
        $this->codigo = null;
    }

    public function mount(Cliente $cliente){
        $this->cliente = $cliente;
    }

    public function render()
    {
        return view('livewire.links.consultar.modal-cadastro');
    }
}
