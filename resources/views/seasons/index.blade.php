<x-layout title="📚 Temporadas de {{ $serie->nome }}">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold text-primary-emphasis">Temporadas de {{ $serie->nome }}</h1>
        @auth
        <a href="{{ route('seasons.create', $serie->id) }}" class="btn btn-success">
            <i class="fas fa-plus me-1"></i> Adicionar Temporada
        </a>
        @endauth
    </div>

    @if(session('mensagem.sucesso'))
    <div class="alert alert-success">{{ session('mensagem.sucesso') }}</div>
    @endif

    @if($seasons->isEmpty())
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i> Nenhuma temporada cadastrada.
    </div>
    @else
    <div class="row g-4">
        @foreach($seasons as $season)
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-light text-dark fw-semibold d-flex justify-content-between align-items-center">
                    Temporada {{ $season->number }}
                    @auth
                    <a href="{{ route('episodes.create', $season->id) }}" class="btn btn-sm btn-outline-success">
                        <i class="fas fa-plus"></i>
                    </a>
                    @endauth
                </div>
                <div class="card-body">
                    @if($season->episodes->isEmpty())
                    <p class="text-muted text-center">Nenhum episódio cadastrado.</p>
                    @else
                    <ul class="list-group list-group-flush">
                        @foreach($season->episodes as $episode)
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div class="d-flex align-items-center">
                                <span class="me-2 fw-semibold">Ep {{ $episode->number }}</span>
                                <span class="{{ $episode->watched ? 'text-success' : 'text-muted' }}">
                                    {!! $episode->watched ? '<i class="fas fa-check-circle me-1"></i>Visto' : '<i class="fas fa-times-circle me-1"></i>Não visto' !!}
                                </span>
                            </div>
                            @auth
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('episodes.edit', $episode->id) }}" class="btn btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('episodes.destroy', $episode->id) }}" method="POST" onsubmit="return confirm('Deseja excluir este episódio?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                            @endauth
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @auth
                <div class="card-footer bg-white border-top d-flex justify-content-between">
                    <a href="{{ route('seasons.edit', $season->id) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-edit me-1"></i> Editar
                    </a>
                    <form action="{{ route('seasons.destroy', $season->id) }}" method="POST" onsubmit="return confirm('Deseja excluir esta temporada?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash-alt me-1"></i> Excluir
                        </button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <div class="mt-4">
        <a href="{{ route('series.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Voltar
        </a>
    </div>

</x-layout>