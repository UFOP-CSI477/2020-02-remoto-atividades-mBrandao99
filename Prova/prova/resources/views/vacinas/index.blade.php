@extends('layouts.admin')

@section('content')

<h3 class="panel-title ml-2 mb-3"> Lista de vacinas
    <a href="{{ route('vacinas.create') }}" class="btn btn-primary float-right mr-2" role="button"> Cadastrar </a>
</h3>

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Fabricante</th>
            <th>Doses</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vacinas as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->nome }}</td>
                <td>{{ $v->fabricante }}</td>
                <td>{{ $v->doses }}</td>
                <td><a href="{{ route('vacinas.show', $v->id) }}">Exibir</a></td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection
