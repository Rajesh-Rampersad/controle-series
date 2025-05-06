<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    {{-- Vite (Laravel 9+) --}}
    @vite(['resources/css/app.scss', 'resources/js/app.js'])


    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            background-color: white;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #007bff;
            color: white;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        li:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>{{ $title }}</h1>

        {{ $slot }}

        <div class="footer">
            <p>&copy; 2023 Lista de Séries. Todos os direitos reservados.</p>
            <p><a href="#">Voltar ao topo</a></p>
        </div>
    </div>
</body>

</html>