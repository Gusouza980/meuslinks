@extends('painel.template.main')

@section('conteudo')
    @livewire('calendario')

    <!-- Modal -->
    <div class="modal fade" id="modalDemandas" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    @livewire('demandas.modal-cadastro')
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    <script>
        window.addEventListener("abreModalCadastro", (event) => {
            $("#modalDemandas").modal("show");
        });
        window.addEventListener("fechaModalCadastro", (event) => {
            $("#modalDemandas").modal("hide");
        });
    </script>
@endsection