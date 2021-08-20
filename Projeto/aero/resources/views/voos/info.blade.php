@extends('layouts.app')

@section('title', "Voo {$voo->id}")

@section('content')

    <div class="text-center">
        <h2> Detalhes do voo <b>{{ $voo->id }}</b></h2>
    </div>

    <div class="d-flex justify-content-center">
        <div class="form mt-5" style="width:100%;">
            <div class="form-row mb-n3">
                <h4> Origem </h4>
            </div>
            <hr/>
            <div class="form-row">
                <div class="form-group col-md-7">
                    <label for="aeroporto_saida_id">Aeroporto </label>
                    <input id="aeroporto_saida_id" name="aeroporto_saida_id" type="text" class="form-control" value="{{ $voo->aeroportoSaida->nome }}" disabled>

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
                    <input id="aeroporto_chegada_id" name="aeroporto_chegada_id" type="text" class="form-control" value="{{ $voo->aeroportoChegada->nome }}" disabled>

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
                        <input id="primeira" name="primeira" type="text" class="form-control" value="{{ number_format($voo->primeira, 2) }}" disabled>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="executiva">Executiva</label>
                    <div class="input-group">
                        <div class="input-group-prepend" >
                            <div class="input-group-text">R$</div>
                        </div>
                        <input id="executiva" name="executiva" type="text" class="form-control" value="{{ number_format($voo->executiva, 2) }}" disabled>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="economica">Economica</label>
                    <div class="input-group">
                        <div class="input-group-prepend" >
                            <div class="input-group-text">R$</div>
                        </div>
                        <input id="economica" name="economica" type="text" class="form-control" value="{{ number_format($voo->economica, 2) }}" disabled>
                    </div>
                </div>
            </div>

        </div>

        <div class="form mt-5 ml-5" style="width:40%;">

            <div class="form-row">
                <div class="form-group">
                    <label for="primeira">Tempo estimado</label>
                    <input id="tempo_estimado" name="tempo_estimado" type="text" class="form-control" value="{{ $tempo_estimado }}" disabled>
                </div>
            </div>
            @if ($comprada)
            <div class="card mb-12 ">
                <div class="card-body text-center">
                    <div><h5 class="card-title"> Você adquiriu essa passagem! </h5></div>
                    <div><i class="far fa-smile-beam fa-5x"></i></div>
                </div>

            </div>
            @else
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title">Escolha sua classe</h5>
                        <form action="{{ route('passagems.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <select class="form-control @error('classe') is-invalid @enderror" id="classe" name="classe" required>
                                    <option value="-1">Selecione</option>
                                    <option value="1">Primeira - {{  numfmt_format_currency(numfmt_create( 'pt_BR', NumberFormatter::CURRENCY ), $voo->primeira, "BRL") }}</option>
                                    <option value="2">Executiva - {{  numfmt_format_currency(numfmt_create( 'pt_BR', NumberFormatter::CURRENCY ), $voo->executiva, "BRL") }}</option>
                                    <option value="3">Economica - {{  numfmt_format_currency(numfmt_create( 'pt_BR', NumberFormatter::CURRENCY ), $voo->economica, "BRL") }}</option>
                                </select>
                                @error('classe')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="voo_id" name="voo_id" value="{{ $voo->id }}" required>
                                @error('voo_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Algo deu errado.</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Comprar" class="btn btn-success">
                            </div>
                        </form>

                    </div>
                </div>
              @endif

        </div>

    </div>

@endsection
