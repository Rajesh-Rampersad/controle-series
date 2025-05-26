<x-layout title="Editar Temporada">
    <form action="{{ route('seasons.update', $season->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="number" name="number" value="{{ $season->number }}" required>
        <button type="submit">Atualizar</button>
    </form>
</x-layout>