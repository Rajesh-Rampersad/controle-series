<x-layout title="Nova Série">


    <form action="/series/salvar" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da série</label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</x-layout>