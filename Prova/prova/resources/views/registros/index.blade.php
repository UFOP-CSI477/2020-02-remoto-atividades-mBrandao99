@extends('layouts.admin')

@section('content')

<h3 class="panel-title ml-2 mb-3"> Lista de registros
    <a href="{{ route('registros.create') }}" class="btn btn-primary float-right mr-2" role="button"> Cadastrar </a>
</h3>

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Pessoa</th>
            <th>Unidade</th>
            <th>Vacina</th>
            <th>Dose</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($registros as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->pessoa->nome }}</td>
                <td>{{ $r->unidade->nome }}</td>
                <td>{{ $r->vacina->nome }}</td>
                <td>{{ $r->dose }}</td>
                <td>{{ $r->data }}</td>
                <td><a href="{{ route('registros.show', $r->id) }}">Exibir</a></td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection
