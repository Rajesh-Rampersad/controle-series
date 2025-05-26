<x-layout title="Adicionar Episódio">

    <h1 class="h3 mb-4">Adicionar Episódio na Temporada {{ $season->number }}</h1>

    <form action="{{ route('episodes.store', $season->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="number" class="form-label">Número do Episódio</label>
            <input type="number" name="number" id="number" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('seasons.index', $season->serie_id) }}" class="btn btn-secondary">Cancelar</a>
    </form>

</x-layout>