<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Séries</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
  body {
    background-color: #f8f9fa;
  }

  .container {
    margin-top: 50px;
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
    <h1>Lista de Séries</h1>
    <ul>
     

      @foreach ($series as $serie)
      <li>{{ $serie }}</li>
      @endforeach
  
     
    </ul>
  </div>
  <div class="footer">
    <p>&copy; 2023 Lista de Séries. Todos os direitos reservados.</p>
    <p><a href="#">Voltar ao topo</a></p>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
