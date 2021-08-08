@extends('main')

@section('content')

<h2> Dados do equipamento </h2>

<div class="col-sm-8 mt-5">
    <dl class="row">
        <dt class="col-sm-2">Id:</dt>
        <dd class="col-sm-10">{{ $equipamento->id }}</dd>

        <dt class="col-sm-2">Nome:</dt>
        <dd class="col-sm-10">{{ $equipamento->nome }}</dd>

    </dl>
</div>

<div class="d-flex flex-md-row flex-column">

    <div class="mx-2">
        <a class="btn btn-secondary" href="{{ route('equipamentos.index') }}" role="button">Voltar</a>
    </div>

</div>
@endsection
