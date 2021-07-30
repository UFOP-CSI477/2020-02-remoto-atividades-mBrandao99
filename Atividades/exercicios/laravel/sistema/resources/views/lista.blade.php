<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Lista</title>
</head>
<body>
    <div class="container">

        <ul class="list-group mt-5">
            @if (is_array($dados) || $dados instanceof Traversable)
                @foreach ($dados as $dado)

                <li class="list-group-item">
                    @foreach ($dado->getAttributes() as $key => $value)
                        {{ $key }}: {{ $value }},
                    @endforeach
                </li>

                @endforeach
            @else
                <li class="list-group-item">
                    @foreach ($dados->getAttributes() as $key => $value)
                        {{ $key }}: {{ $value }},
                    @endforeach
                </li>
            @endif
        </ul>

    </div>
</body>
</html>
