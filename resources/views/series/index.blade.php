<x-layout title="Lista de Séries">
  <div class="container py-4">

    {{-- Mensagem de sucesso --}}
    @if(session('mensagem.sucesso'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('mensagem.sucesso') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h3">📺 Lista de Séries</h1>
      @auth
      <a href="{{ route('series.create') }}" class="btn btn-success">
        + Adicionar nova Série
      </a>
      @endauth
    </div>

    @if($series->isEmpty())
    <div class="alert alert-info text-center">
      Nenhuma série cadastrada.
    </div>
    @else
    <ul class="list-group shadow-sm">
      @foreach ($series as $serie)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <span class="fw-medium">
          <a href="{{ route('seasons.index', $serie->id) }}">
            {{ $serie->nome }}
          </a>
        </span>
        @auth

        <div class="btn-group" role="group" aria-label="Ações">
          <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-outline-primary btn-sm">Editar</a>

          <form action="{{ route('series.destroy', $serie->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Tem certeza que deseja excluir esta série {{ $serie->nome }}?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger btn-sm">Excluir</button>
          </form>
        </div>
        @endauth
      </li>
      @endforeach
    </ul>
    @endif

  </div>
</x-layout>