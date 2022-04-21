@extends('painel.template.main')

@section('styles')
@endsection

@section('titulo')
    <a href="{{ route('painel.clientes') }}"> Clientes </a> / Links
@endsection

@section('botoes')
    <a name="" id="" class="btn btn-primary" onclick="Livewire.emit('carregaModalCadastro')" role="button">Adicionar</a>
@endsection

@section('conteudo')

    @livewire('links.consultar.datatable', ["cliente" => $cliente])

    @livewire('links.consultar.modal-cadastro', ["cliente" => $cliente])

@endsection
