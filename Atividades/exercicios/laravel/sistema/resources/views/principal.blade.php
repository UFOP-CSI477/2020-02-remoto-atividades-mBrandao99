<!DOCTYPE html>
<html lang="br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Principal</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

        <style>
            html {
                font-family: 'Roboto', Arial, Helvetica, sans-serif;
            }
        </style>
    </head>

    <body>

        <div class="container-fluid">
            <header>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('principal') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('estados.index') }}">Estados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cidades.index') }}">Cidades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produtos.index') }}">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pessoas.index') }}">Pessoas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('compras.index') }}">Compras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Relatório</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Registrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Sair</a>
                    </li>
                </ul>
            </header>
        </div>

        <div class="container mt-5">
            @if (session('mensagem'))

                <div class="alert alert-success">
                    {{ session('mensagem') }}
                </div>

            @endif

            @yield('conteudo')
        </div>



    </body>
</html>
