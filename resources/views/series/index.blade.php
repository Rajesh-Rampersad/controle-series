<x-layout title="Lista de Séries">

  <div class="d-flex justify-content-end mb-3">
    <a href="/series/criar" class="btn btn-primary">Adiciona nova Série</a>
  </div>

  <ul>
    @foreach ($series as $serie)
    <li class="list-group-item">{{ $serie->nome }}</li>
    @endforeach
  </ul>


</x-layout>