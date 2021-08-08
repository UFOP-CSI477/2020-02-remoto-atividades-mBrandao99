@extends('admin')

@section('content')

<h2> Lista de manutenções </h2>

<a href="{{ route('admin.registros.create') }}"> Cadastrar </a>
<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Data Limite</th>
            <th>Usuário</th>
            <th>Equipamento</th>
            <th>Tipo</th>
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
                <td>{{ $r->tipo }}</td>
                <td><a href="{{ route('admin.registros.show', $r->id) }}">Exibir</a></td>
            </tr>
        @endforeach
    </tbody>

</table>

{{-- <h3>Relatórios</h3>
<a class="btn btn-primary" href="{{ route('registros.relpessoa') }}" role="button">Por Pessoa</a>
<a class="btn btn-primary" href="{{ route('registros.relproduto') }}" role="button">Por Produto</a>
<a class="btn btn-primary" href="{{ route('registros.reldata') }}" role="button">Por Data</a> --}}

@endsection
