@extends('main')

@section('content')

<h2> Dados da manutenção </h2>

<div class="col-sm-8 mt-5">
    <dl class="row">
        <dt class="col-sm-2">Id:</dt>
        <dd class="col-sm-10">{{ $registro->id }}</dd>

        <dt class="col-sm-2">Data limite:</dt>
        <dd class="col-sm-10">{{  \Carbon\Carbon::parse($registro->datalimite)->format('d/m/Y') }}</dd>

        <dt class="col-sm-2">Usuário:</dt>
        <dd class="col-sm-10">{{ $registro->user->name }}</dd>

        <dt class="col-sm-2">Equipamento:</dt>
        <dd class="col-sm-10">{{ $registro->equipamento->nome }}</dd>

        <dt class="col-sm-2">Tipo:</dt>
        <dd class="col-sm-10">{{ $registro->getTipo }}</dd>

        <dt class="col-sm-2">Descrição:</dt>
        <dd class="col-sm-10">{{ $registro->descricao }}</dd>

    </dl>
</div>

<div class="d-flex flex-md-row flex-column">
    <div class="mx-2">
        <a class="btn btn-secondary" href="{{ route('registros.index') }}" role="button">Voltar</a>
    </div>
</div>
@endsection
