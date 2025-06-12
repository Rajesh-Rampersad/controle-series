<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">


    {{-- Laravel Vite Plugin (incluye Bootstrap desde SCSS y JS) --}}
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-light">

    {{-- Navbar de Bootstrap --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('series.index') }}">Lista de Séries</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.create') }}">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('series.index') }}">Séries</a>
                    </li>

                    <!--logout-->
                    <li class="nav-item">
                        <!--autenticacion -->
                        @auth
                        <a class="nav-link" href="{{ route('users.index') }}">Usuários</a>
                        @endauth
                    </li>
                    <li class="nav-item">
                        @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link">Sair</button>
                        </form>

                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Contenido principal --}}
    <div class="container mt-5 p-4 bg-white shadow rounded" style="max-width: 600px;">
        <h1 class="text-center mb-4">{{ $title }}</h1>

        {{ $slot }}

        <div class="footer text-center mt-5">
            <p class="mb-1">&copy; 2023 Lista de Séries. Todos os direitos reservados.</p>
            <p><a href="#" class="text-primary text-decoration-none">Voltar ao topo</a></p>
        </div>
    </div>

</body>

</html>