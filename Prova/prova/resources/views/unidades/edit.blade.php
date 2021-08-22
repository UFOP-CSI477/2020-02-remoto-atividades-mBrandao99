@extends('layouts.admin')

@section('title', 'Edição de unidade')

@section('content')

    <div class="text-center">
        <h2> Editar unidade </h2>
    </div>

    <div class="d-flex justify-content-center">
        <form action="{{ route('unidades.update', $unidade->id) }}" method="POST" style="width:50%;" class="mt-5">
            @csrf
            @method('PUT')

            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="nome">Nome: </label>
                <div class="col-sm-8">
                    <input class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" id="nome" required value="{{ $unidade->nome }}">
                    @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="nome">Cidade: </label>
                <div class="col-sm-8">
                    <input class="form-control @error('cidade') is-invalid @enderror" type="text" name="cidade" id="cidade" required value="{{ $unidade->cidade }}">
                    @error('cidade')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="bairro">Bairro: </label>
                <div class="col-sm-6">
                    <input class="form-control @error('bairro') is-invalid @enderror" type="text" name="bairro" id="bairro" required value="{{ $unidade->bairro }}">
                    @error('bairro')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <div class="d-flex justify-content-center flex-md-row flex-column mt-5">
                <div class="mr-2">
                    <input type="submit" value="Salvar" class="btn btn-primary">
                </div>
                <div class="mr-2">
                    <a class="btn btn-secondary" href="{{ route('unidades.show', $unidade->id) }}" role="button">Voltar</a>
                </div>
                <div class="mr-2">
                    <input type="reset" value="Limpar" class="btn btn-warning">
                </div>
            </div>

        </form>

    </div>

@endsection
