@extends('main')

@section('content')

<h2> Lista de manutenções </h2>

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Data Limite</th>
            <th>Usuário</th>
            <th>Equipamento</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($registros as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ \Carbon\Carbon::parse($r->datalimite)->format('d/m/Y') }}</td>
                <td>{{ $r->user->name }}</td>
                <td>{{ $r->equipamento->nome }}</td>
                <td><a href="{{ route('registros.show', $r->id) }}">Exibir</a></td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection
