@extends('layouts.app')

@section('title', 'Aeroportos')

@section('content')

<h2> Lista de aeroportos </h2>

<a href="{{ route('aeroportos.create') }}"> Cadastrar </a>
<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($aeroportos as $a)
            <tr>
                <td>{{ $a->id }}</td>
                <td>{{ $a->nome }}</td>
                <td>{{ $a->cidade }}</td>
                <td>{{ $a->estado }}</td>
                <td><a href="{{ route('aeroportos.show', $a->id) }}">Exibir</a></td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection
