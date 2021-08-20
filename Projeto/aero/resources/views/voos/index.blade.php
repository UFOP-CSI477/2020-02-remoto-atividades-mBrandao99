@extends('layouts.app')

@section('title', 'Voos')

@section('content')

<h2> Lista de voos </h2>

<a href="{{ route('voos.create') }}"> Cadastrar </a>
<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Origem</th>
            <th>Destino</th>
            <th>Empresa</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($voos as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->aeroportoSaida->nome }} - {{ $v->saida }}</td>
                <td>{{ $v->aeroportoChegada->nome }} - {{ $v->chegada }}</td>
                <td>{{ $v->empresa->nome }}</td>
                <td><a href="{{ route('voos.show', $v->id) }}">Exibir</a></td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection
