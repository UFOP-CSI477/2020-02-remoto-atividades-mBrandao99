@extends('principal')

@section('conteudo')

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <td>Id</td>
            <td>Nome</td>
            <td>Unidade de Medida</td>
        </tr>
    </thead>
    <tbody>
        @foreach($produtos as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->nome }}</td>
                <td>{{ $p->um }}</td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection
