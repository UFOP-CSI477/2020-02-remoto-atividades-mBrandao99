@extends('admin')

@section('content')

<h2> Cadastrar equipamento </h2>

<form action="{{ route('admin.equipamentos.store') }}" method="POST" style="width:50%;" class="mt-5">
    @csrf
    <div class="form-group row mb-3" >
        <label class="col-sm-3 col-form-label" for="nome">Nome: </label>
        <div class="col-sm-8">
            <input class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" id="nome" required placeholder="Nome do equipamento">
            @error('nome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <input type="submit" value="Cadastrar" class="btn btn-primary">
        <input type="reset" value="Limpar" class="btn btn-warning">

    </div>

</form>


@endsection
