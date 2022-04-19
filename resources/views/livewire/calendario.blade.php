<div class="container-fluid" wire:poll.5000ms>
    <div class="d-flex flex-row justify-content-between align-items-center mb-4">
        <div class="">
            <a name="" id="" class="btn @if($tipo === 0) btn-primary @else btn-light @endif" role="button" wire:click="trocaTipo(0)">Artes</a>
            <a name="" id="" class="btn @if($tipo === 1) btn-primary @else btn-light @endif ml-3" role="button" wire:click="trocaTipo(1)">Postagens</a>
            <a name="" id="" class="btn @if($tipo === 2) btn-primary @else btn-light @endif ml-3" role="button" wire:click="trocaTipo(2)">Administrativo</a>
        </div>
        <div class="d-flex flex-row justify-content-end">
            <div wire:click='voltar'>
                <i class="fa fa-arrow-circle-left fa-2x cpointer" aria-hidden="true"></i>
            </div>
            <div class="px-5 mt-2">
                <h4>{{ date("m/Y", strtotime($data)) }}</h4>
            </div>
            <div wire:click='avancar'>
                <i class="fa fa-arrow-circle-right fa-2x cpointer" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-dark table-bordered">
                <thead>
                    <tr>
                        <th>Dom</th>
                        <th>Seg</th>
                        <th>Ter</th>
                        <th>Qua</th>
                        <th>Qui</th>
                        <th>Sex</th>
                        <th>Sab</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    @for($salto = 0; $salto < date("w", strtotime($ano . "-" . $mes . "-01")); $salto++)
                        <td></td>
                    @endfor
                    @php
                        $dia = 1;
                    @endphp
                    @for($i = $salto; $i < $dias + $salto; $i++)
                        <td class="" style="">
                            <div class="d-flex flex-row justify-content-between">
                                <button class="botao-dia" style="background-color: white; border: 0px; border-radius: 5px;">{{ $dia }}</button>
                                <button class="botao-adicionar" onclick="Livewire.emit('carregaCadastro', '{{ date('Y-m-d', strtotime(date('Y-m', strtotime($data)) . '-' . $dia)) }}', {{ $this->tipo }})"><i class="fa fa-plus" aria-hidden="true"></i></button>    
                            </div>
                            @foreach($demandas->where("data", date('Y-m-d', strtotime(date('Y-m', strtotime($data)) . '-' . $dia))) as $demanda)
                                <div class="row px-2 mt-2" style="position: relative;">
                                    <div class="card-demanda d-flex flex-row align-items-center">
                                        <div class="form-check form-check-inline" style="width: 100%">
                                            <input type="checkbox" class="form-check-input" onclick="check_demanda({{ $demanda->id }})" name="" id="" @if($demanda->completo) checked @endif>
                                            <label class="form-check-label @if($demanda->completo) demanda-completa-text @endif" for="">
                                                <span>{{ $demanda->titulo }}</span>
                                                @if($demanda->completo)
                                                    {{-- <br> --}}
                                                    <small>- Completo por {{ $demanda->usuario->nome }}</small>
                                                @endif
                                            </label>
                                        </div>
                                        <i class="fa fa-times fa-lg cpointer" style="color:red;" aria-hidden="true" wire:click="removerDemanda({{ $demanda->id }})"></i>
                                    </div>
                                </div>
                            @endforeach
                        </td>
                        @if(($i + 1) % 7 == 0)
                            </tr>
                            <tr>
                        @endif
                        @php
                            $dia++;
                        @endphp
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>

@push("styles")

<style>
    th{
        height: 60px;
        vertical-align: middle;
        font-weight: bold;
        width: 14.2%;
        max-width: 14.2%;
    }

    .card-demanda{
        padding: 5px 5px;
        background-color:#ffdc00;
        max-width: 100%;
        border-radius: 5px;
        color: black;
    }

    .botao-dia{
        font-size: 11px;
        margin-bottom: 5px;
        width: 20px;
        height: 20px;
    }

    .botao-adicionar{
        color: white;
        background-color:forestgreen;
        width: 20px;
        height: 20px;
        font-size: 11px;
        text-align: center;
        border: 0px;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-check-input:checked{
        background-color: black;
        border-color: black;
    }

    .cpointer{
        cursor: pointer;
    }

    .demanda-completa-text > span{
        text-decoration: line-through;
    }
</style>

@endpush

@push("scripts")

    <script>
        function check_demanda(id){
            Livewire.emit("checkDemanda", id);
        }
    </script>

@endpush