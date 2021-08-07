@extends('principal')

@section('conteudo')

<h2> Dados da compra </h2>

<div class="col-sm-8 mt-5">
    <dl class="row">
        <dt class="col-sm-2">Id:</dt>
        <dd class="col-sm-10">{{ $compra->id }}</dd>

        <dt class="col-sm-2">Data:</dt>
        <dd class="col-sm-10">{{ $compra->data }}</dd>

        <dt class="col-sm-2">Pessoa:</dt>
        <dd class="col-sm-10">{{ $compra->pessoa->nome }}</dd>

        <dt class="col-sm-2">Produto:</dt>
        <dd class="col-sm-10">{{ $compra->produto->nome }}</dd>

    </dl>
</div>

<div class="d-flex flex-md-row flex-column">
    <div>
        <a class="btn btn-primary" href="{{ route('compras.edit', $compra->id) }}" role="button">Editar</a>
    </div>
    <div class="mx-2">
        <a class="btn btn-secondary" href="{{ route('compras.index') }}" role="button">Voltar</a>
    </div>
    <div>
    <form name="frmDelete" action="{{ route('compras.destroy', $compra->id) }}" method="POST" onsubmit="return confirm('Confirmar exclusão da compra?')">
        @csrf
        @method('DELETE')

        <input class="btn btn-danger" type="submit" value="Excluir">

    </form>
    </div>
</div>
@endsection
