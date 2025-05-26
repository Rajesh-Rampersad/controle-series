<x-layout title="Editar Episódio">

    <h1 class="h3 mb-4">Editar Episódio {{ $episode->number }}</h1>

    <form action="{{ route('episodes.update', $episode->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="number" class="form-label">Número do Episódio</label>
            <input type="number" name="number" id="number" class="form-control" value="{{ $episode->number }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('seasons.index', $episode->season->serie_id) }}" class="btn btn-secondary">Cancelar</a>
    </form>

</x-layout>