<x-layout title="📚 Temporadas de  {{ $serie->nome }}">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Temporadas de {{ $serie->nome }}</h1>
        <a href="{{ route('seasons.create', $serie->id) }}" class="btn btn-success">
            + Adicionar Temporada
        </a>
    </div>

    @if(session('mensagem.sucesso'))
    <div class="alert alert-success">
        {{ session('mensagem.sucesso') }}
    </div>
    @endif

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
                        @auth
                        <a href="{{ route('episodes.create', $season->id) }}" class="btn btn-sm btn-success me-2">+ Episódio</a>
                        <a href="{{ route('seasons.edit', $season->id) }}" class="btn btn-sm btn-primary me-2">✏️ Editar</a>
                        <form action="{{ route('seasons.destroy', $season->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta temporada?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">🗑️ Excluir</button>
                        </form>
                        @endauth
                    </div>

                    @if($season->episodes->isEmpty())
                    <p class="text-muted">Sem episódios.</p>
                    @else
                    {{-- ESTE ES EL FORMULARIO PRINCIPAL QUE AHORA FUNCIONARÁ --}}
                    @auth
                    <form action="{{ route('episodes.markWatched', $season->id) }}" method="POST">
                        @csrf
                        <ul class="list-group">
                            @foreach($season->episodes as $episode)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Episódio {{ $episode->number }}
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="episodes[]"
                                        value="{{ $episode->id }}" id="episode{{ $episode->id }}"
                                        {{ $episode->watched ? 'checked' : '' }}>
                                    <label class="form-check-label" for="episode{{ $episode->id }}">
                                        {!! $episode->watched ? '<span class="text-success">✅ Visto</span>' : '<span class="text-muted">❌ Não visto</span>' !!}
                                    </label>
                                </div>
                                @auth
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('episodes.edit', $episode->id) }}" class="btn btn-outline-primary ms-2">✏️</a>

                                    {{-- ELIMINAR EL FORMULARIO ANIDADO AQUÍ --}}
                                    {{-- En su lugar, usa un botón normal que activará JavaScript --}}
                                    <button type="button"
                                        class="btn btn-outline-danger ms-1 delete-episode-btn"
                                        data-episode-id="{{ $episode->id }}"
                                        data-route="{{ route('episodes.destroy', $episode->id) }}">
                                        🗑️
                                    </button>
                                </div>
                                @endauth
                            </li>
                            @endforeach
                        </ul>
                        <button type="submit" class="btn btn-sm btn-primary mt-2">✅ Confirmar Episódios Vistos</button>
                    </form>
                    @endauth
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

    {{-- Script JavaScript para manejar la eliminación de episodios --}}
    @push('scripts') {{-- Asume que tu x-layout tiene una pila 'scripts' --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-episode-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const episodeId = this.dataset.episodeId;
                    const deleteRoute = this.dataset.route;

                    if (confirm('Excluir este episódio?')) {
                        fetch(deleteRoute, {
                                method: 'POST', // Laravel usa POST con _method para DELETE
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Token CSRF de Laravel
                                    'Content-Type': 'application/json',
                                    'X-HTTP-Method-Override': 'DELETE' // Le dice a Laravel que es un DELETE
                                },
                                body: JSON.stringify({}) // Cuerpo vacío para solicitud DELETE
                            })
                            .then(response => {
                                if (!response.ok) {
                                    return response.json().then(error => {
                                        throw new Error(error.message || 'Erro ao excluir o episódio.')
                                    });
                                }
                                return response.json();
                            })
                            .then(data => {
                                alert(data.message || 'Episódio excluído com sucesso!');
                                // Opcional: Eliminar visualmente el elemento de la lista o recargar la página
                                this.closest('li').remove();
                            })
                            .catch(error => {
                                alert('Erro: ' + error.message);
                                console.error('Error:', error);
                            });
                    }
                });
            });
        });
    </script>
    @endpush

</x-layout>