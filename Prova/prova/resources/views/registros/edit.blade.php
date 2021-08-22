@extends('layouts.admin')

@section('title', 'Edição de registro')

@section('content')

    <div class="text-center">
        <h2> Editar registro </h2>
    </div>

    <div class="d-flex justify-content-center">
        <form action="{{ route('registros.update', $registro->id) }}" method="POST" style="width:50%;" class="mt-5">
            @csrf
            @method('PUT')

            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="data">Data: </label>
                <div class="col-sm-4">
                    <input class="form-control @error('data') is-invalid @enderror" type="text" name="data" id="data" required value="{{ $registro->data }}">
                    @error('data')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label text-right" for="pessoa_id">Pessoa: </label>
                <div class="col-sm-8">
                    <select class="form-control @error('pessoa_id') is-invalid @enderror" id="pessoa_id" name="pessoa_id" required>
                        <option value="-1">Selecione uma pessoa</option>
                        @foreach ($pessoas as $p)
                            <option value="{{ $p->id }}" @if ($p->id == $registro->pessoa_id) selected @endif>{{ $p->nome }}</option>
                        @endforeach
                    </select>
                    @error('pessoa_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label text-right" for="vacina_id">Vacina: </label>
                <div class="col-sm-6">
                    <select class="form-control @error('vacina_id') is-invalid @enderror" id="vacina_id" name="vacina_id" required>
                        <option value="-1">Selecione uma vacina</option>
                        @foreach ($vacinas as $v)
                            <option value="{{ $v->id }}" @if ($v->id == $registro->vacina_id) selected @endif>{{ $v->nome }}</option>
                        @endforeach
                    </select>
                    @error('vacina_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3" >
                <label class="col-sm-4 col-form-label text-right" for="dose">Dose: </label>
                <div class="col-sm-3">
                    <input class="form-control @error('dose') is-invalid @enderror" type="number" name="dose" id="dose" min="0" max="3" required value="{{ $registro->dose }}">
                    @error('dose')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label text-right" for="unidade_id">Unidade: </label>
                <div class="col-sm-8">
                    <select class="form-control @error('unidade_id') is-invalid @enderror" id="unidade_id" name="unidade_id" required>
                        <option value="-1">Selecione uma unidade</option>
                        @foreach ($unidades as $u)
                            <option value="{{ $u->id }}" @if ($u->id == $registro->unidade_id) selected @endif>{{ $u->nome }}</option>
                        @endforeach
                    </select>
                    @error('unidade_id')
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
                    <a class="btn btn-secondary" href="{{ route('registros.show', $registro->id) }}" role="button">Voltar</a>
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
            $('#data_nascimento').mask('00/00/0000');
        }
    </script>
@endpush
