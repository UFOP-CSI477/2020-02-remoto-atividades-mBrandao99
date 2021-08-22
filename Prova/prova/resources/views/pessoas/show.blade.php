@extends('layouts.admin')

@section('title', "Dados de {$pessoa->nome}")

@section('content')

    <div class="text-center">
        <h2> Dados da pessoa {{ $pessoa->id }}</h2>
    </div>

    <div class="d-flex justify-content-center">
        <div class="form mt-5" style="width:50%;">
            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="nome">Nome: </label>
                <div class="col-sm-8">
                    <input class="form-control type="text" name="nome" id="nome" value="{{ $pessoa->nome }}" disabled>

                </div>
            </div>

            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="nome">Cidade: </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" name="cidade" id="cidade" value="{{ $pessoa->cidade }}" disabled>
                </div>
            </div>

            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="bairro">Bairro: </label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="bairro" id="bairro" value="{{ $pessoa->bairro }}" disabled>
                </div>
            </div>

            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="data_nascimento">Data de nascimento: </label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" name="data_nascimento" id="data_nascimento" value="{{ $pessoa->data_nascimento }}" disabled>
                </div>
            </div>

            <div class="d-flex justify-content-center flex-md-row flex-column mt-5">
                <div class="mr-2">
                    <a class="btn btn-primary" href="{{ route('pessoas.edit', $pessoa->id) }}" role="button">Editar</a>
                </div>
                <div class="mr-2">
                    <a class="btn btn-secondary" href="{{ route('pessoas.index') }}" role="button">Voltar</a>
                </div>
                <div class="mr-2">
                    <form id="frmDelete" name="frmDelete" action="{{ route('pessoas.destroy', $pessoa->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <input class="btn btn-danger" type="button" value="Excluir" onclick="confirmarExclusao('frmDelete')">

                    </form>
                </div>

            </div>
        </div>

    </div>

@endsection
