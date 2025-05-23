<x-layout title="Temporadas de {{ $serie->nome }}">
    <div class="container py-4">
        <h1 class="h3 mb-4">Temporadas de {{ $serie->nome }}</h1>

        <ul class="list-group shadow-sm">
            @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>Temporada {{ $season->number }}</strong>

                <span class="bage-secondary text-black rounded-pill px-2">
                    {{ $season->episodes->count() }} episódios


                </span>
            </li>
            @endforeach
        </ul>
    </div>
</x-layout>