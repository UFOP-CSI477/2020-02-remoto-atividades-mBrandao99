@extends('layouts.app')

@section('title', "Voo {$voo->id}")

@section('content')

    <div class="text-center">
        <h2> Dados do voo <b>{{ $voo->id }}</b></h2>
    </div>

    <div class="d-flex justify-content-center">
        <div class="form mt-5" style="width:50%;">
            <div class="form-row mb-n3">
                <h4> Origem </h4>
            </div>
            <hr/>
            <div class="form-row">
                <div class="form-group col-md-7">
                    <label for="aeroporto_saida_id">Aeroporto </label>
                    <input id="aeroporto_saida_id" name="aeroporto_saida_id" type="text" class="form-control" value="{{ $voo->aeroportoSaida->nome }}"disabled>

                </div>
                <div class="form-group col-md-5">
                    <label for="saida">Data/Hora </label>
                    <div class="input-group date">
                        <div class="input-group-prepend" >
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <input id="saida" name="saida" type="text" class="form-control" value="{{ $voo->saida }}" disabled>
                    </div>
                </div>
            </div>

            <div class="form-row mb-n3 mt-3">
                <h4> Destino </h3>
            </div>
            <hr/>
            <div class="form-row">
                <div class="form-group col-md-7">
                    <label for="aeroporto_chegada_id">Aeroporto </label>
                    <input id="aeroporto_chegada_id" name="aeroporto_chegada_id" type="text" class="form-control" value="{{ $voo->aeroportoChegada->nome }}"disabled>

                </div>
                <div class="form-group col-md-5">
                    <label for="chegada">Data/Hora </label>
                    <div class="input-group date">
                        <div class="input-group-prepend" >
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <input id="chegada" name="chegada" type="text" class="form-control" value="{{ $voo->chegada }}" disabled>
                    </div>
                </div>
            </div>

            <hr/>
            <div class="form-group row mb-5">
                <label class="col-sm-2 col-form-label" for="empresa_id">Empresa </label>
                <div class="col-sm-6">
                    <input id="empresa_id" name="empresa_id" type="text" class="form-control" value="{{ $voo->empresa->nome }}" disabled>
                </div>
            </div>

            <div class="form-row mb-n3">
                <h4> Preços das classes </h3>
            </div>
            <hr/>
            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="primeira">Primeira</label>
                    <div class="input-group">
                        <div class="input-group-prepend" >
                            <div class="input-group-text">R$</div>
                        </div>
                        <input id="primeira" name="primeira" type="text" class="form-control" value="{{ $voo->primeira }}" disabled required>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="executiva">Executiva</label>
                    <div class="input-group">
                        <div class="input-group-prepend" >
                            <div class="input-group-text">R$</div>
                        </div>
                        <input id="executiva" name="executiva" type="text" class="form-control" value="{{ $voo->executiva }}" disabled required>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="economica">Economica</label>
                    <div class="input-group">
                        <div class="input-group-prepend" >
                            <div class="input-group-text">R$</div>
                        </div>
                        <input id="economica" name="economica" type="text" class="form-control" value="{{ $voo->economica }}" disabled required>
                    </div>
                </div>
            </div>


            <div class="d-flex justify-content-center flex-md-row flex-column mt-5">
                <div class="mr-2">
                    <a class="btn btn-primary" href="{{ route('voos.edit', $voo->id) }}" role="button">Editar</a>
                </div>
                <div class="mr-2">
                    <a class="btn btn-secondary" href="{{ route('voos.index') }}" role="button">Voltar</a>
                </div>
                <div class="mr-2">
                    <form name="frmDelete" id="frmDelete" action="{{ route('voos.destroy', $voo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <input class="btn btn-danger" type="button" value="Excluir" onclick="confirmarExclusao('frmDelete')">

                    </form>
                </div>

            </div>

        </div>

    </div>

@endsection
