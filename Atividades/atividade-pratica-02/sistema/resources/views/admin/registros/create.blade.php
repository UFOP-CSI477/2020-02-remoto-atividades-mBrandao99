@extends('admin')

@section('content')

<h2> Cadastrar manutenção </h2>

<form action="{{ route('admin.registros.store') }}" method="POST" style="width:50%;" class="mt-5">
    @csrf

    <div class="form-group row mb-3" >
        <label class="col-sm-3 col-form-label" for="datalimite">Data Limite: </label>
        <div class="col-sm-5">
            <input class="form-control @error('datalimite') is-invalid @enderror" type="date" name="datalimite" id="datalimite" placeholder="" required>
            @error('datalimite')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-sm-3 col-form-label" for="user_id">Usuário: </label>
        <div class="col-sm-5">
            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" required>
                @foreach ($users as $u)
                    <option value="{{ $u->id }}">
                        {{ $u->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-sm-3 col-form-label" for="equipamento_id">Equipamento: </label>
        <div class="col-sm-5">
            <select class="form-control @error('equipamento_id') is-invalid @enderror" name="equipamento_id" id="equipamento_id" required>
                @foreach ($equipamentos as $e)
                    <option value="{{ $e->id }}">
                        {{ $e->nome }}
                    </option>
                @endforeach
            </select>
            @error('equipamento_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-sm-3 col-form-label" for="tipo">Tipo: </label>
        <div class="col-sm-5">
            <select class="form-control @error('tipo') is-invalid @enderror" name="tipo" id="tipo" required>
                <option value="1">Preventiva</option>
                <option value="2">Corretiva</option>
                <option value="3">Urgente</option>
            </select>
            @error('tipo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-3" >
        <label class="col-sm-3 col-form-label" for="descricao">Descrição: </label>
        <div class="col-sm-9">
            ​<textarea class="form-control @error('descricao') is-invalid @enderror" name="descricao" id="descricao" rows="5" cols="70" placeholder="Detalhes sobre a manutenção" required></textarea>
            @error('descricao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <input type="submit" value="Cadastrar" class="btn btn-primary">
        <input type="reset" value="Limpar" class="btn btn-warning">

    </div>

</form>

@endsection
