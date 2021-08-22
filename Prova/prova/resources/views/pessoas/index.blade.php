@extends('layouts.admin')

@section('content')

<h3 class="panel-title ml-2 mb-3"> Lista de pessoas
    <a href="{{ route('pessoas.create') }}" class="btn btn-primary float-right mr-2" role="button"> Cadastrar </a>
</h3>

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Bairro</th>
            <th>Nascimento</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pessoas as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->nome }}</td>
                <td>{{ $p->cidade }}</td>
                <td>{{ $p->bairro }}</td>
                <td>{{ $p->data_nascimento }}</td>
                <td><a href="{{ route('pessoas.show', $p->id) }}">Exibir</a></td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection
