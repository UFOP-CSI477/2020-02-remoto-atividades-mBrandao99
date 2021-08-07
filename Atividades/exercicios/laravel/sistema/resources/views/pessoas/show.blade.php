@extends('principal')

@section('conteudo')

<h2> Dados da pessoa </h2>

<div class="col-sm-8 mt-5">
    <dl class="row">
        <dt class="col-sm-2">Id:</dt>
        <dd class="col-sm-10">{{ $pessoa->id }}</dd>

        <dt class="col-sm-2">Nome:</dt>
        <dd class="col-sm-10">{{ $pessoa->nome }}</dd>

        <dt class="col-sm-2">Cidade:</dt>
        <dd class="col-sm-10">{{ $pessoa->cidade->nome }}</dd>

    </dl>
</div>

<div class="d-flex flex-md-row flex-column">
    <div>
        <a class="btn btn-primary" href="{{ route('pessoas.edit', $pessoa->id) }}" role="button">Editar</a>
    </div>
    <div class="mx-2">
        <a class="btn btn-secondary" href="{{ route('pessoas.index') }}" role="button">Voltar</a>
    </div>
    <div>
    <form name="frmDelete" action="{{ route('pessoas.destroy', $pessoa->id) }}" method="POST" onsubmit="return confirm('Confirmar exclusão da pessoa?')">
        @csrf
        @method('DELETE')

        <input class="btn btn-danger" type="submit" value="Excluir">

    </form>
    </div>
</div>
@endsection
