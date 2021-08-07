@extends('principal')

@section('conteudo')

<a href="{{ route('compras.create') }}"> Cadastrar </a>
<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Data</th>
            <th>Pessoa</th>
            <th>Produto</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($compras as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->data }}</td>
                <td>{{ $c->pessoa->nome }}</td>
                <td>{{ $c->produto->nome }}</td>
                <td><a href="{{ route('compras.show', $c->id) }}">Exibir</a></td>
            </tr>
        @endforeach
    </tbody>

</table>

<h3>Relatórios</h3>
<a class="btn btn-primary" href="{{ route('compras.relpessoa') }}" role="button">Por Pessoa</a>
<a class="btn btn-primary" href="{{ route('compras.relproduto') }}" role="button">Por Produto</a>
<a class="btn btn-primary" href="{{ route('compras.reldata') }}" role="button">Por Data</a>

@endsection
