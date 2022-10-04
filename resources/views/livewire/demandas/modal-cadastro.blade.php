<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form wire:submit.prevent='salvar' wire:keydown.escape='salvar'>
                <div class="mb-3">
                    <label for="" class="form-label">Data</label>
                    <input type="date" class="form-control" wire:model='data' readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Setor</label>
                    <select class="form-control" wire:model='tipo' readonly>
                        @foreach(config("globals.tipo_demandas") as $key => $tipo_demanda)
                            <option value="{{ $key }}">{{ $tipo_demanda }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Título</label>
                    <input type="text" class="form-control" wire:model='titulo' maxlength="100" required>
                    @error('titulo') <small style="color: red;">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <a name="" id="" class="btn btn-primary" role="button" wire:click="salvar">Salvar</a>
                </div>
            </form>
        </div>
    </div>
</div>