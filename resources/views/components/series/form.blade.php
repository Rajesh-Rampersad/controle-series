<form action="{{ $action }}" method="POST">
    @csrf
    @if ($method === 'PUT')
    @method('PUT')
    @endif

    <div class="mb-3">
        <label for="nome" class="form-label fw-semibold">Nome da Série</label>
        <input
            type="text"
            class="form-control @error('nome') is-invalid @enderror"
            id="nome"
            name="nome"
            value="{{ old('nome', $serie?->nome) }}"
            placeholder="Digite o nome da série">
        @error('nome')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('series.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
</form>