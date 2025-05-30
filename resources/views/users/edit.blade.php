<x-layout title="Editar Usuário">
    <x-slot name="header">
        <h1 class="h4 mb-4">Editar Usuário</h1>
    </x-slot>

    <form method="POST" action="{{ route('users.update', $id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input
                type="text"
                name="name"
                id="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}"
                required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input
                type="email"
                name="email"
                id="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Salvar Alterações</button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('users.index') }}" class="link-secondary">
            <i class="bi bi-arrow-left"></i> Voltar para a lista de usuários
        </a>
    </div>
</x-layout>