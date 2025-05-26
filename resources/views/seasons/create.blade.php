<x-layout title="Adicionar Temporada">
    <form action="{{ route('seasons.store', $serie->id) }}" method="POST">
        @csrf
        <input type="number" name="number" placeholder="Número da Temporada" required>
        <button type="submit">Salvar</button>
    </form>
</x-layout>