@extends('principal')

@section('conteudo')

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <td>Id</td>
            <td>Nome</td>
            <td>Sigla</td>
        </tr>
    </thead>
    <tbody>
        @foreach($estados as $e)
            <tr>
                <td>{{ $e->id }}</td>
                <td>{{ $e->nome }}</td>
                <td>{{ $e->sigla }}</td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection
