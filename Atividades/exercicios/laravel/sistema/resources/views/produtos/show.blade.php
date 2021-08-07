@extends('principal')

@section('conteudo')

<h2> Dados do produto </h2>

<div class="col-sm-8 mt-5">
    <dl class="row">
        <dt class="col-sm-2">Id:</dt>
        <dd class="col-sm-10">{{ $produto->id }}</dd>

        <dt class="col-sm-2">Nome:</dt>
        <dd class="col-sm-10">{{ $produto->nome }}</dd>

        <dt class="col-sm-2">Medida:</dt>
        <dd class="col-sm-10">{{ $produto->um }}</dd>

    </dl>
</div>

<div class="d-flex flex-md-row flex-column">
    <div>
        <a class="btn btn-primary" href="{{ route('produtos.edit', $produto->id) }}" role="button">Editar</a>
    </div>
    <div class="mx-2">
        <a class="btn btn-secondary" href="{{ route('produtos.index') }}" role="button">Voltar</a>
    </div>
    <div>
    <form name="frmDelete" action="{{ route('produtos.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Confirmar exclusão do produto?')">
        @csrf
        @method('DELETE')

        <input class="btn btn-danger" type="submit" value="Excluir">

    </form>
    </div>
</div>
@endsection
