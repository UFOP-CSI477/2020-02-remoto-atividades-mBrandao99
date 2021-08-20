@extends('layouts.app')

@section('title')
    Empresas
@endsection

@section('content')

<h2> Lista de empresas </h2>

<a href="{{ route('empresas.create') }}"> Cadastrar </a>
<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>CNPJ</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empresas as $e)
            <tr>
                <td>{{ $e->id }}</td>
                <td>{{ $e->nome }}</td>
                <td>{{ $e->cnpj }}</td>
                <td><a href="{{ route('empresas.show', $e->id) }}">Exibir</a></td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection
