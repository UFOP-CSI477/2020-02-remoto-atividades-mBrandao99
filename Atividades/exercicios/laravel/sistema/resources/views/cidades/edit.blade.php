@extends('principal')

@section('conteudo')

<h2> Editar cidade </h2>

<form action="{{ route('cidades.update', $cidade->id) }}" method="POST" style="width:50%;" class="mt-5">

    @csrf
    @method('PUT')

    <div class="form-group row mb-3" >
        <label class="col-sm-3 col-form-label" for="nome">Nome: </label>
        <div class="col-sm-5">
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome da cidade" value="{{ $cidade->nome }}">
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-sm-3 col-form-label" for="estado_id">Estado: </label>
        <div class="col-sm-5">
            <select class="form-control" name="estado_id" id="estado_id">
                @foreach ($estados as $e)
                    <option value="{{ $e->id }}"
                        @if ($cidade->estado_id == $e->id)
                            selected
                        @endif>
                        {{ $e->nome }}
                    </option>
                @endforeach
            </select>
            {{-- <input class="form-control" type="text" name="estado_id" id="estado_id" placeholder="UF" value="{{ $cidade->estado_id }}"> --}}
        </div>
    </div>

    <div class="form-group">
        <input type="submit" value="Atualizar" class="btn btn-primary">
        <input type="reset" value="Limpar" class="btn btn-warning">

    </div>

</form>

@endsection
