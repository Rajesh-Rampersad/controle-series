<form action="{{ $action }}" method="POST">
    @csrf

    @if($method)
    @method($method)
    @endif

    <div class="mb-3">
        <label for="nome" class="form-label">Nome da Série</label>
        <input
            type="text"
            class="form-control @error('nome') is-invalid @enderror"
            id="nome"
            name="nome"
            value="{{ old('nome', $serie->nome ?? '') }}"
            required>
        @error('nome')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="seasonsQty" class="form-label">Quantidade de Temporadas</label>
        <input
            type="number"
            class="form-control @error('seasonsQty') is-invalid @enderror"
            id="seasonsQty"
            name="seasonsQty"
            min="1"
            value="{{ old('seasonsQty', 1) }}"
            required>
        @error('seasonsQty')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="episodesPerSeason" class="form-label">Episódios por Temporada</label>
        <input
            type="number"
            class="form-control @error('episodesPerSeason') is-invalid @enderror"
            id="episodesPerSeason"
            name="episodesPerSeason"
            min="1"
            value="{{ old('episodesPerSeason', 1) }}"
            required>
        @error('episodesPerSeason')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        {{ $method ? 'Atualizar' : 'Adicionar' }}
    </button>
</form>