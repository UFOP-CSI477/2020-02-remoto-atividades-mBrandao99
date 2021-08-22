@extends('layouts.admin')

@section('title', "Dados da unidade {$unidade->nome}")

@section('content')

    <div class="text-center">
        <h2> Dados da unidade {{ $unidade->id }}</h2>
    </div>

    <div class="d-flex justify-content-center">
        <div class="form mt-5" style="width:50%;">
            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="nome">Nome: </label>
                <div class="col-sm-8">
                    <input class="form-control type="text" name="nome" id="nome" value="{{ $unidade->nome }}" disabled>

                </div>
            </div>

            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="nome">Cidade: </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" name="cidade" id="cidade" value="{{ $unidade->cidade }}" disabled>
                </div>
            </div>

            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="bairro">Bairro: </label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="bairro" id="bairro" value="{{ $unidade->bairro }}" disabled>
                </div>
            </div>

            <div class="d-flex justify-content-center flex-md-row flex-column mt-5">
                <div class="mr-2">
                    <a class="btn btn-primary" href="{{ route('unidades.edit', $unidade->id) }}" role="button">Editar</a>
                </div>
                <div class="mr-2">
                    <a class="btn btn-secondary" href="{{ route('unidades.index') }}" role="button">Voltar</a>
                </div>
                <div class="mr-2">
                    <form id="frmDelete" name="frmDelete" action="{{ route('unidades.destroy', $unidade->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <input class="btn btn-danger" type="button" value="Excluir" onclick="confirmarExclusao('frmDelete')">

                    </form>
                </div>

            </div>
        </div>

    </div>

@endsection
