<x-layout title="Nova Série">
    <div class="container py-4">

        <h1 class="h3 mb-4">🎬 Adicionar Nova Série</h1>

        <div class="card p-4 shadow-sm">
            @include('components.series.form', [
            'action' => route('series.store'),
            'method' => null,
            'serie' => null
            ])
        </div>

        @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <h5 class="alert-heading">Erros encontrados:</h5>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    </div>
    <div class="mt-4">
        <a href="{{ route('series.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Voltar para lista de séries
        </a>
    </div>
</x-layout>