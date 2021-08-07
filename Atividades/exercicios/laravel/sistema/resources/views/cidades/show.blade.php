@extends('principal')

@section('conteudo')

<h2> Dados da cidade </h2>

<div class="col-sm-8 mt-5">
    <dl class="row">
        <dt class="col-sm-2">Id:</dt>
        <dd class="col-sm-10">{{ $cidade->id }}</dd>

        <dt class="col-sm-2">Nome:</dt>
        <dd class="col-sm-10">{{ $cidade->nome }}</dd>

        <dt class="col-sm-2">Estado:</dt>
        <dd class="col-sm-10">{{ $cidade->estado->nome }}</dd>

    </dl>
</div>

<div class="d-flex flex-md-row flex-column">
    <div>
        <a class="btn btn-primary" href="{{ route('cidades.edit', $cidade->id) }}" role="button">Editar</a>
    </div>
    <div class="mx-2">
        <a class="btn btn-secondary" href="{{ route('cidades.index') }}" role="button">Voltar</a>
    </div>
    <div>
    <form name="frmDelete" action="{{ route('cidades.destroy', $cidade->id) }}" method="POST" onsubmit="return confirm('Confirmar exclusão da cidade?')">
        @csrf
        @method('DELETE')

        <input class="btn btn-danger" type="submit" value="Excluir">

    </form>
    </div>
</div>
@endsection
