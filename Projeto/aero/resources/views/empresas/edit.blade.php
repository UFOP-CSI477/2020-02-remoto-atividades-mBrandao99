@extends('layouts.app')

@section('title')
   Edição de empresa
@endsection

@section('content')

    <div class="text-center">
        <h2> Editar empresa </h2>
    </div>

    <div class="d-flex justify-content-center">
        <form action="{{ route('empresas.update', $empresa->id) }}" method="POST" style="width:50%;" class="mt-5">

            @csrf
            @method('PUT')

            <div class="form-group row mb-3" >
                <label class="col-sm-3 col-form-label text-right" for="nome">Nome: </label>
                <div class="col-sm-8">
                    <input class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" id="nome" placeholder="Nome da empresa" value="{{ $empresa->nome }}">
                    @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-3" >
                <label class="col-sm-3 col-form-label text-right" for="cnpj">CNPJ: </label>
                <div class="col-sm-5">
                    <input class="form-control @error('cnpj') is-invalid @enderror" type="text" name="cnpj" id="cnpj" placeholder="XX.XXX.XXX/XXXX-XX" value="{{ $empresa->cnpj }}">
                    @error('cnpj')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-center flex-md-row flex-column mt-5">
                <div class="mr-2">
                    <input type="submit" value="Atualizar" class="btn btn-primary">
                </div>
                <div class="mr-2">
                    <a class="btn btn-secondary" href="{{ url()->previous() }}" role="button">Voltar</a>
                </div>
                <div class="mr-2">
                    <input type="reset" value="Limpar" class="btn btn-warning">
                </div>

            </div>

        </form>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript">
        window.onload = function () {
            $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
        }
    </script>
@endpush


