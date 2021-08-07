@extends('principal')

@section('conteudo')

<form action="{{ route('pessoas.store') }}" method="POST" style="width:50%;">
    @csrf
    <div class="form-group row mb-3" >
        <label class="col-sm-3 col-form-label" for="nome">Nome: </label>
        <div class="col-sm-5">
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome da pessoa">
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-sm-3 col-form-label" for="cidade_id">Cidade: </label>
        <div class="col-sm-5">
            <select class="form-control" name="cidade_id" id="cidade_id">
                @foreach ($cidades as $c)
                    <option value="{{ $c->id }}">{{ $c->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" value="Cadastrar" class="btn btn-primary">
        <input type="reset" value="Limpar" class="btn btn-warning">

    </div>

</form>

@endsection
