@extends('principal')

@section('conteudo')

<form action="{{ route('estados.update', $estado->id) }}" method="POST" style="width:50%;">

    @csrf
    @method('PUT')

    <div class="form-group row mb-3" >
        <label class="col-sm-3 col-form-label" for="nome">Nome: </label>
        <div class="col-sm-5">
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome do estado" value="{{ $estado->nome }}">
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-sm-3 col-form-label" for="sigla">Sigla: </label>
        <div class="col-sm-2">
            <input class="form-control" type="text" name="sigla" id="sigla" placeholder="UF" value="{{ $estado->sigla }}">
        </div>
    </div>

    <div class="form-group">
        <input type="submit" value="Atualizar" class="btn btn-primary">
        <input type="reset" value="Limpar" class="btn btn-warning">

    </div>

</form>

@endsection
