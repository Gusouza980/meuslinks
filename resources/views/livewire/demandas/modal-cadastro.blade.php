<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form action="">
                <div class="mb-3">
                    <label for="" class="form-label">Data</label>
                    <input type="date" class="form-control" wire:model='data' readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Setor</label>
                    <select class="form-control" wire:model='tipo' readonly>
                        <option value="0">Arte</option>
                        <option value="1">Postagem</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Título</label>
                    <input type="text" class="form-control" wire:model='titulo' maxlength="100">
                </div>
                <div class="mb-3">
                    <a name="" id="" class="btn btn-primary" role="button" wire:click="salvar">Salvar</a>
                </div>
            </form>
        </div>
    </div>
</div>