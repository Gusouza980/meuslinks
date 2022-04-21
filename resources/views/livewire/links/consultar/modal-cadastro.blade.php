<div class="modal fade" id="modalCadastroLink" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document" wire:ignore.self>
        <div class="modal-content" wire:ignore.self>
            <div class="modal-header" wire:ignore.self>
                <h5 class="modal-title">@if($this->codigo) Código: {{ $codigo }} @endif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" wire:ignore.self>
                <form class="row" wire:submit.prevent='salvar'>
                    <div class="mb-3 col-12">
                        <label for="" class="form-label">Descrição</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" maxlength="50" placeholder="" wire:model="descricao">
                    </div>
                    <div class="mb-3 col-12">
                        <label for="" class="form-label">Link</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" maxlength="300" placeholder="" wire:model="link">
                    </div>
                    <div class="mb-3 col-12">
                        <div class="d-grid gap-2">
                          <button type="submit" name="" id="" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push("scripts")
    <script>
        window.addEventListener('abreModalCadastroLink', event => {
            $("#modalCadastroLink").modal("show");
        });

        window.addEventListener('fechaModalCadastroLink', event => {
            $("#modalCadastroLink").modal("hide");
        });
    </script>
@endpush