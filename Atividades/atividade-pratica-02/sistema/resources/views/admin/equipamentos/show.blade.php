@extends('admin')

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
    <div>
        <a class="btn btn-primary" href="{{ route('admin.equipamentos.edit', $equipamento->id) }}" role="button">Editar</a>
    </div>
    <div class="mx-2">
        <a class="btn btn-secondary" href="{{ route('admin.equipamentos.index') }}" role="button">Voltar</a>
    </div>
    <div>
    <form name="frmDelete" action="{{ route('admin.equipamentos.destroy', $equipamento->id) }}" method="POST" onsubmit="return confirm('Confirmar exclusão do equipamento?')">
        @csrf
        @method('DELETE')

        <input class="btn btn-danger" type="submit" value="Excluir">

    </form>
    </div>
</div>

<h3 class="mt-5"> Registro de manutenções </h3>

<table class="table table-bordered table-hover table-striped mt-2">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Data Limite</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipamento->registros as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ \Carbon\Carbon::parse($r->datalimite)->format('d/m/Y') }}</td>
                <td><a href="{{ route('admin.registros.show', $r->id) }}">Exibir</a></td>
            </tr>
        @endforeach
    </tbody>
    <tfoot class="table-dark">
        <tr>
            <th colspan="2">Total</th>
            <th>{{ count($equipamento->registros) }}</th>
        </tr>
    </tfoot>

</table>





@endsection
