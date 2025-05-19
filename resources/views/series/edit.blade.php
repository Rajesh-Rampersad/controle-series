<x-layout title="Editar Série">
    <div class="container py-4">

        <h1 class="h3 mb-4">✏️ Editar Série</h1>

        <div class="card p-4 shadow-sm">
            @if ($serie && $serie->exists)
            @include('components.series.form', [
            'action' => route('series.update', ['serie' => $serie?->id]),
            'method' => 'PUT',
            'serie' => $serie
            ])
            @else
            <p class="text-danger">Erro: série não encontrada.</p>
            @endif
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
</x-layout>