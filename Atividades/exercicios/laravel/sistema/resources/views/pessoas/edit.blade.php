@extends('principal')

@section('conteudo')

<h2> Editar pessoa </h2>

<form action="{{ route('pessoas.update', $pessoa->id) }}" method="POST" style="width:50%;" class="mt-5">

    @csrf
    @method('PUT')

    <div class="form-group row mb-3" >
        <label class="col-sm-3 col-form-label" for="nome">Nome: </label>
        <div class="col-sm-5">
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome da pessoa" value="{{ $pessoa->nome }}">
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-sm-3 col-form-label" for="cidade_id">Cidade: </label>
        <div class="col-sm-5">
            <select class="form-control" name="cidade_id" id="cidade_id">
                @foreach ($cidades as $c)
                    <option value="{{ $c->id }}"
                        @if ($pessoa->cidade_id == $c->id)
                            selected
                        @endif>
                        {{ $c->nome }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" value="Atualizar" class="btn btn-primary">
        <input type="reset" value="Limpar" class="btn btn-warning">

    </div>

</form>

@endsection
