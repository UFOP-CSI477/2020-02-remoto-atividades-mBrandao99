@extends('layouts.app')

@section('title', Auth::user()->name)

@section('content')

<h2> Suas passagens </h2>


@if ($passagems->count() == 0)
    <div class="card mb-12 ">
        <div class="card-body text-center">
            <div><h5 class="card-title"> Ainda não comprou nenhuma </h5></div>
        <div><i class="far fa-frown fa-5x"></i></div>
    </div>
</div>
@else

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Data/Horário</th>
            <th>Saída</th>
            <th>Chegada</th>
            <th style="width: 1px; white-space: nowrap;">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($passagems as $p)
            <tr>
                <td>{{ $p->voo->saida }}</td>
                <td>{{ $p->voo->aeroportoSaida->nome }}</td>
                <td>{{ $p->voo->aeroportoChegada->nome }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-primary" href="{{ route('home.show', $p->voo_id) }}" role="button">Exibir</a>
                        <form name="frmDelete" id="frmDelete" action="{{ route('passagems.destroy', $p->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <input class="btn btn-danger" type="button" value="Excluir" onclick="confirmarExclusao('frmDelete')">

                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
@endif

@endsection
