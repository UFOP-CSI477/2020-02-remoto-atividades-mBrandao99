@extends('layouts.admin')

@section('title', 'Cadastro de vacinas')

@section('content')

    <div class="text-center">
        <h2> Cadastrar vacina </h2>
    </div>

    <div class="d-flex justify-content-center">
        <form action="{{ route('vacinas.store') }}" method="POST" style="width:50%;" class="mt-5">
            @csrf
            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="nome">Nome: </label>
                <div class="col-sm-6">
                    <input class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" id="nome" required placeholder="Nome da vacina">
                    @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="nome">Fabricante: </label>
                <div class="col-sm-8">
                    <input class="form-control @error('fabricante') is-invalid @enderror" type="text" name="fabricante" id="fabricante" required placeholder="Nome da fabricante">
                    @error('fabricante')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="doses">Doses: </label>
                <div class="col-sm-3">
                    <input class="form-control @error('doses') is-invalid @enderror" type="number" name="doses" id="doses" min="1" max="3" required>
                    @error('doses')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-center flex-md-row flex-column mt-5">
                <div class="mr-2">
                    <input type="submit" value="Cadastrar" class="btn btn-primary">
                </div>
                <div class="mr-2">
                    <a class="btn btn-secondary" href="{{ route('vacinas.index') }}" role="button">Voltar</a>
                </div>
                <div class="mr-2">
                    <input type="reset" value="Limpar" class="btn btn-warning">
                </div>
            </div>

        </form>

    </div>

@endsection
