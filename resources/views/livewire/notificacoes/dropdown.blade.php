<div class="dropdown d-inline-block" wire:poll.5000ms>
    @php
        use App\Classes\Notificacao as FuncoesNotificacao;
    @endphp
    <button type="button" class="btn header-item noti-icon waves-effect"
        id="page-header-notifications-dropdown" wire:click='toggleDropdownNotificacoes'>
        <i class="bx bx-bell bx-tada"></i>
        <span class="badge bg-danger rounded-pill">{{ $notificacoes_recebimento->where("visto", false)->count() }}</span>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 @if($dropdown) show @endif" aria-labelledby="page-header-notifications-dropdown">
        <div class="p-3">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="m-0" key="t-notifications"> Notificações </h6>
                </div>
                <div class="col-auto">
                    <a href="#!" class="small" key="t-view-all"> Ver Todas</a>
                </div>
            </div>
        </div>
        <div data-simplebar style="max-height: 230px; overflow-y: scroll;">
            @foreach($notificacoes_recebimento as $notificacao_recebimento)
                <a href="#" class="text-reset notification-item">
                    <div class="media">
                        <div class="media-body">
                            <h6 class="mt-0 mb-1" key="t-your-order">{{ FuncoesNotificacao::getNomeTipo($notificacao_recebimento->notificacao->tipo) }}</h6>
                            <div class="font-size-12 text-muted">
                                <p class="mb-1" key="t-grammer">
                                    {!! FuncoesNotificacao::getNotificacao($notificacao_recebimento->notificacao->usuario, $notificacao_recebimento->notificacao->demanda, $notificacao_recebimento->notificacao->tipo) !!}
                                </p>
                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
    
        </div>
    </div>
</div>


@push("scripts")
<script>
    window.addEventListener("novaNotificacao", event => {
        var audio = new Audio('/admin/audios/ringtong.mp3');
        audio.play();
    });
</script>
@endpush