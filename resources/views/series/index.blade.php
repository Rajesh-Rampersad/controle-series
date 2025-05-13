<x-layout title="Lista de Séries">
  <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="mb-0">Lista de Séries</h2>
      <a href="{{ route('series.create') }}" class="btn btn-primary">Adicionar nova Série</a>
    </div>

    <ul class="list-group">
      @forelse ($series as $serie)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $serie->nome }}
        <form action="{{ route('series.destroy', $serie->id) }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
        </form>
      </li>
      @empty
      <li class="list-group-item text-muted">Nenhuma série cadastrada.</li>
      @endforelse
    </ul>
  </div>
</x-layout>