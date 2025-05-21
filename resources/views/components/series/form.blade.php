<form action="{{ $action }}" method="post">
    @csrf
    @if ($method)
    @method($method)
    @endif

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" id="nome" name="nome" class="form-control"
            @if (isset($serie)) value="{{ old('nome', $serie->nome) }}" @else value="{{ old('nome') }}" @endif>
    </div>

    <div class="mb-3">
        <label for="seasonsQty" class="form-label">Temporadas</label>
        <input type="number" id="seasonsQty" name="seasonsQty" class="form-control"
            value="{{ old('seasonsQty') }}">
    </div>

    <div class="mb-3">
        <label for="episodesPerSeason" class="form-label">Episódios por temporada</label>
        <input type="number" id="episodesPerSeason" name="episodesPerSeason" class="form-control"
            value="{{ old('episodesPerSeason') }}">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{ route('series.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
</form>