@extends('principal')

@section('conteudo')

<form action="{{ route('cidades.store') }}" method="POST" style="width:50%;">
    @csrf
    <div class="form-group row mb-3" >
        <label class="col-sm-3 col-form-label" for="nome">Nome: </label>
        <div class="col-sm-5">
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome da cidade">
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-sm-3 col-form-label" for="estado_id">Estado: </label>
        <div class="col-sm-5">
            <select class="form-control" name="estado_id" id="estado_id">
                @foreach ($estados as $e)
                    <option value="{{ $e->id }}">{{ $e->nome }}</option>
                @endforeach
            </select>
            {{-- <input class="form-control" type="text" name="estado_id" id="estado_id" placeholder=""> --}}
        </div>
    </div>

    <div class="form-group">
        <input type="submit" value="Cadastrar" class="btn btn-primary">
        <input type="reset" value="Limpar" class="btn btn-warning">

    </div>

</form>

@endsection
