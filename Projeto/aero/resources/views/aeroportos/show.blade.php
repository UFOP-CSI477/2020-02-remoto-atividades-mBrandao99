@extends('layouts.app')

@section('title', "Aeroporto {$aeroporto->nome}")

@section('content')

    <div class="text-center">
        <h2> Dados do aeroporto </h2>
    </div>

    <div class="d-flex justify-content-center">
        <div class="form mt-5" style="width:50%;">
            <div class="form-group row mb-3">
                <label class="col-sm-3 col-form-label text-right" for="id">Id: </label>
                <div class="col-sm-3">
                    <input class="form-control" type="text" name="id" id="id" value="{{ $aeroporto->id }}" disabled>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-sm-3 col-form-label text-right" for="nome">Nome: </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" name="nome" id="nome" value="{{ $aeroporto->nome }}" disabled>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-sm-3 col-form-label text-right" for="cidade">Cidade: </label>
                <div class="col-sm-9">
                    <input class="form-control" type="text" name="cidade" id="cidade" value="{{ $aeroporto->cidade }} - {{ $aeroporto->estado }}" disabled>
                </div>
            </div>


            <div class="d-flex justify-content-center flex-md-row flex-column mt-5">
                <div class="mr-2">
                    <a class="btn btn-primary" href="{{ route('aeroportos.edit', $aeroporto->id) }}" role="button">Editar</a>
                </div>
                <div class="mr-2">
                    <a class="btn btn-secondary" href="{{ route('aeroportos.index') }}" role="button">Voltar</a>
                </div>
                <div class="mr-2">
                    <form id="frmDelete" name="frmDelete" action="{{ route('aeroportos.destroy', $aeroporto->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <input class="btn btn-danger" type="button" value="Excluir" onclick="confirmarExclusao('frmDelete')">

                    </form>
                </div>

            </div>

        </div>

    </div>

@endsection
