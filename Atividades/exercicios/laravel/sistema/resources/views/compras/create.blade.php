@extends('principal')

@section('conteudo')

<h2> Cadastrar compra </h2>

<form action="{{ route('compras.store') }}" method="POST" style="width:50%;" class="mt-5">
    @csrf

    <div class="form-group row mb-3" >
        <label class="col-sm-3 col-form-label" for="data">Data/Hora: </label>
        <div class="col-sm-5">
            <input class="form-control" type="datetime-local" name="data" id="data" placeholder="">
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-sm-3 col-form-label" for="pessoa_id">Pessoa: </label>
        <div class="col-sm-5">
            <select class="form-control" name="pessoa_id" id="pessoa_id">
                @foreach ($pessoas as $p)
                    <option value="{{ $p->id }}">
                        {{ $p->nome }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-sm-3 col-form-label" for="produto_id">Produto: </label>
        <div class="col-sm-5">
            <select class="form-control" name="produto_id" id="produto_id">
                @foreach ($produtos as $p)
                    <option value="{{ $p->id }}">
                        {{ $p->nome }}
                    </option>
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
