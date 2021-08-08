@extends('admin')

@section('content')

<h2> Dados da manutenção </h2>

<div class="col-sm-8 mt-5">
    <dl class="row">
        <dt class="col-sm-2">Id:</dt>
        <dd class="col-sm-10">{{ $registro->id }}</dd>

        <dt class="col-sm-2">Data limite:</dt>
        <dd class="col-sm-10">{{ \Carbon\Carbon::parse($registro->datalimite)->format('d/m/Y') }}</dd>

        <dt class="col-sm-2">Usuário:</dt>
        <dd class="col-sm-10">{{ $registro->user->name }}</dd>

        <dt class="col-sm-2">Equipamento:</dt>
        <dd class="col-sm-10">{{ $registro->equipamento->nome }}</dd>

        <dt class="col-sm-2">Tipo:</dt>
        <dd class="col-sm-10">{{ $registro->tipo }}</dd>

        <dt class="col-sm-2">Descrição:</dt>
        <dd class="col-sm-10">{{ $registro->descricao }}</dd>

    </dl>
</div>

<div class="d-flex flex-md-row flex-column">
    <div>
        <a class="btn btn-primary" href="{{ route('admin.registros.edit', $registro->id) }}" role="button">Editar</a>
    </div>
    <div class="mx-2">
        <a class="btn btn-secondary" href="{{ route('admin.registros.index') }}" role="button">Voltar</a>
    </div>
    <div>
    <form name="frmDelete" action="{{ route('admin.registros.destroy', $registro->id) }}" method="POST" onsubmit="return confirm('Confirmar exclusão da manutenção?')">
        @csrf
        @method('DELETE')

        <input class="btn btn-danger" type="submit" value="Excluir">

    </form>
    </div>
</div>
@endsection
