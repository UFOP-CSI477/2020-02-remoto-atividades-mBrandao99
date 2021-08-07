@extends('principal')

@section('conteudo')

<h2>Total de compras por data</h2>
<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Pessoa</th>
            <th>Quantidade</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dados as $d)
            <tr>
                <td>{{ $d->data }}</td>
                <td>{{ $d->total }}</td>
            </tr>
        @endforeach
    </tbody>

</table>
<a class="btn btn-secondary" href="{{ route('compras.index') }}" role="button">Voltar</a>

@endsection
