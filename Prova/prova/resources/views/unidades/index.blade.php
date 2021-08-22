@extends('layouts.admin')

@section('content')

<h3 class="panel-title ml-2 mb-3"> Lista de unidades
    <a href="{{ route('unidades.create') }}" class="btn btn-primary float-right mr-2" role="button"> Cadastrar </a>
</h3>

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Bairro</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($unidades as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->nome }}</td>
                <td>{{ $u->cidade }}</td>
                <td>{{ $u->bairro }}</td>
                <td><a href="{{ route('unidades.show', $u->id) }}">Exibir</a></td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection
