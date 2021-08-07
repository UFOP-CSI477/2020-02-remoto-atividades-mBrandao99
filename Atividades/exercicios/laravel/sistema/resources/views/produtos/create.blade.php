@extends('principal')

@section('conteudo')

<form action="{{ route('produtos.store') }}" method="POST" style="width:50%;">
    @csrf
    <div class="form-group row mb-3" >
        <label class="col-sm-3 col-form-label" for="nome">Nome: </label>
        <div class="col-sm-5">
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome do produto">
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-sm-3 col-form-label" for="um">Unidade de medida: </label>
        <div class="col-sm-2">
            <input class="form-control" type="text" name="um" id="um" placeholder="kg, cm...">
        </div>
    </div>

    <div class="form-group">
        <input type="submit" value="Cadastrar" class="btn btn-primary">
        <input type="reset" value="Limpar" class="btn btn-warning">

    </div>

</form>

@endsection
