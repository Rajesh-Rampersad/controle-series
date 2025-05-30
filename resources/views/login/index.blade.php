<x-layout title="Login">
    <x-slot name="header">
        <h1 class="h4 mb-4">Acessar Conta</h1>
    </x-slot>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input
                type="email"
                name="email"
                id="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                required
                autofocus>
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

        <div class="mb-3 form-check">
            <input
                type="checkbox"
                name="remember"
                id="remember"
                class="form-check-input">
            <label class="form-check-label" for="remember">
                Lembrar-me
            </label>
        </div>

        <div class="d-flex justify-content-between mb-3">
            <a href="#" class="link-primary">Esqueceu sua senha?</a>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-box-arrow-in-right"></i> Entrar
        </button>

        <div class="text-center mt-3">
            <p>
                Não tem uma conta?
                <a href="{{ route('users.create') }}" class="link-primary">Cadastre-se</a>
            </p>
        </div>
    </form>
</x-layout>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('email').focus();
    });
</script>
@endsection