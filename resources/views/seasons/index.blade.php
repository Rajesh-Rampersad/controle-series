<x-layout title="📚 Temporadas de  {{ $serie->nome }}">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Temporadas de {{ $serie->nome }}</h1>
        <a href="{{ route('seasons.create', $serie->id) }}" class="btn btn-success">
            + Adicionar Temporada
        </a>
    </div>

    @if($seasons->isEmpty())
    <div class="alert alert-info">
        Nenhuma temporada cadastrada para esta série.
    </div>
    @else
    <div class="accordion" id="accordionSeasons">
        @foreach($seasons as $season)
        <div class="accordion-item mb-3 shadow-sm">
            <h2 class="accordion-header" id="heading{{ $season->id }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $season->id }}" aria-expanded="false" aria-controls="collapse{{ $season->id }}">
                    Temporada {{ $season->number }}
                </button>
            </h2>

            <div id="collapse{{ $season->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $season->id }}" data-bs-parent="#accordionSeasons">
                <div class="accordion-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('episodes.create', $season->id) }}" class="btn btn-sm btn-success me-2">+ Episódio</a>
                        <a href="{{ route('seasons.edit', $season->id) }}" class="btn btn-sm btn-primary me-2">✏️ Editar</a>
                        <form action="{{ route('seasons.destroy', $season->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta temporada?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">🗑️ Excluir</button>
                        </form>
                    </div>

                    @if($season->episodes->isEmpty())
                    <p class="text-muted">Sem episódios.</p>
                    @else
                    <ul class="list-group">
                        @foreach($season->episodes as $episode)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Episódio {{ $episode->number }}
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('episodes.edit', $episode->id) }}" class="btn btn-outline-primary ms-2">✏️</a>
                                <form action="{{ route('episodes.destroy', $episode->id) }}" method="POST" onsubmit="return confirm('Excluir este episódio?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger ms-1">🗑️</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <div class="mt-4">
        <a href="{{ route('series.index') }}" class="btn btn-link">← Voltar para lista de séries</a>
    </div>

</x-layout>