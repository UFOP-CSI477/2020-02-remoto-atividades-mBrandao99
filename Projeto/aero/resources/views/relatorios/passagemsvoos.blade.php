@extends('layouts.app')

@section('title', 'Relatório')

@section('content')

<h2> Quantidade de passagens por voos </h2>

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Saída</th>
            <th>Chegada</th>
            <th>Qtd</th>
        </tr>
    </thead>
    <tbody>
        @php($total=0)
        @foreach($voos as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->aeroportoSaida->nome }}</td>
                <td>{{ $v->aeroportoChegada->nome }}</td>
                <td>{{ $v->passagems->count() }}
                    @php($total += $v->passagems->count())
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total:</th>
            <th>{{ $total }}</th>
        </tr>
    </tfoot>

</table>

@endsection
