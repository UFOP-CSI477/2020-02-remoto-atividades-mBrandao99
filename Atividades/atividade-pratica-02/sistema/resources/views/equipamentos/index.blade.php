@extends('main')

@section('content')

<h2> Lista de equipamentos </h2>

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipamentos as $e)
            <tr>
                <td>{{ $e->id }}</td>
                <td>{{ $e->nome }}</td>
                <td><a href="{{ route('equipamentos.show', $e->id) }}">Exibir</a></td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection
