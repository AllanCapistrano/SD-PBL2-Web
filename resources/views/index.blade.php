<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página teste</title>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.css') }}">
</head>
<body>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-4">
                <h1>Olá teste</h1>
                <button class="btn btn-lg btn-success"><i class="fas fa-check-circle"></i> Clique</button>
                <button class="btn btn-lg btn-danger"><i class="bi bi-bug-fill"></i> Não clique</button>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></script>
</body>
</html>