<x-layout title="Cadastrar novo usuário">
    <x-slot name="header">
        <h1 class="h4 mb-4">Cadastrar novo usuário</h1>
    </x-slot>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

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
            <div class="invalid-feedback">
                {{ $message }}
            </div>
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
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input
                type="password"
                name="password"
                id="password"
                class="form-control @error('password') is-invalid @enderror"
                required>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Senha</label>
            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                class="form-control"
                required>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-person-plus"></i> Cadastrar
        </button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ url('/') }}" class="link-secondary">
            <i class="bi bi-arrow-left"></i> Voltar para o início
        </a>
    </div>
</x-layout>