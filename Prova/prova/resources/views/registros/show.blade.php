@extends('layouts.admin')

@section('title', "Dados do registro")

@section('content')

    <div class="text-center">
        <h2> Dados do registro {{ $registro->id }}</h2>
    </div>

    <div class="d-flex justify-content-center">
        <div class="form mt-5" style="width:50%;">
            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="data">Data: </label>
                <div class="col-sm-4">
                    <input class="form-control type="text" name="data" id="data" value="{{ $registro->data }}" disabled>

                </div>
            </div>

            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="pessoa_id">Pessoa: </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" name="pessoa_id" id="pessoa_id" value="{{ $registro->pessoa->nome }}" disabled>
                </div>
            </div>

            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="vacina">Vacina: </label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="vacina" id="vacina" value="{{ $registro->vacina->nome }}" disabled>
                </div>
            </div>

            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="dose">Dose: </label>
                <div class="col-sm-3">
                    <input class="form-control" type="number" name="dose" id="dose" value="{{ $registro->dose }}" disabled>
                </div>
            </div>

            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="unidade_id">Unidade: </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" name="unidade_id" id="unidade_id" value="{{ $registro->unidade->nome }}" disabled>
                </div>
            </div>

            <div class="d-flex justify-content-center flex-md-row flex-column mt-5">
                <div class="mr-2">
                    <a class="btn btn-primary" href="{{ route('registros.edit', $registro->id) }}" role="button">Editar</a>
                </div>
                <div class="mr-2">
                    <a class="btn btn-secondary" href="{{ route('registros.index') }}" role="button">Voltar</a>
                </div>
                <div class="mr-2">
                    <form id="frmDelete" name="frmDelete" action="{{ route('registros.destroy', $registro->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <input class="btn btn-danger" type="button" value="Excluir" onclick="confirmarExclusao('frmDelete')">

                    </form>
                </div>

            </div>
        </div>

    </div>

@endsection
