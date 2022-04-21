<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body" style="overflow-x: scroll;">
                <table class="table table-bordered dt-responsive  nowrap w-100" style="vertical-align: middle;">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Código</th>
                            <th>Link</th>
                            <th>Link Encurtado</th>
                            <th>Acessos</th>
                            <th>Cadastro</th>
                            <th></th>
                        </tr>
                    </thead>


                    <tbody>

                        @foreach($links as $link)
                            <tr>
                                <td>{{$link->descricao}}</td>
                                <td>{{$link->codigo}}</td>
                                <td>{{$link->link}}</td>
                                <td>
                                    {{ url("/") . "/u/" . $link->codigo }}<br>
                                    {{ url("/") . "/u/" . $link->slug . "/" . $link->codigo }}
                                </td>
                                <td>{{ $link->acessos }}</td>
                                <td>{{date("d/m/Y H:i:s", strtotime($link->created_at))}}</td>
                                <td class="text-center">
                                    <i class="fas fa-edit fa-lg cpointer text-warning" onclick="Livewire.emit('carregaModalEdicao', {{ $link->id }})"></i>
                                    <i class="fas fa-times fa-lg ms-2 cpointer text-danger" wire:click="removerLink({{ $link->id }})"></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->