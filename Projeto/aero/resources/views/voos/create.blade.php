@extends('layouts.app')

@section('title', 'Cadastro de voo')

@section('content')

    <div class="text-center">
        <h2> Cadastrar voo </h2>
    </div>

    <div class="d-flex justify-content-center">
        <form action="{{ route('voos.store') }}" method="POST" style="width:50%;" class="mt-5">
            @csrf

            <div class="form-row mb-n3">
                <h4> Origem </h4>
            </div>
            <hr/>
            <div class="form-row">
                <div class="form-group col-md-7">
                    <label for="aeroporto_saida_id">Aeroporto </label>
                    <select class="form-control @error('aeroporto_saida_id') is-invalid @enderror" id="aeroporto_saida_id" name="aeroporto_saida_id" required>
                        <option value="-1">Selecione um aeroporto</option>
                        @foreach ($aeroportos as $aeroporto)
                            <option value="{{ $aeroporto->id }}">{{ $aeroporto->nome }}</option>
                        @endforeach
                    </select>
                    @error('aeroporto_saida_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="saida">Data/Hora </label>
                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                        <div class="input-group-prepend" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <input id="saida" name="saida" type="text" class="form-control datetimepicker-input @error('saida') is-invalid @enderror" data-target="#datetimepicker1" required>
                        @error('saida')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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
                    <select class="form-control @error('aeroporto_chegada_id') is-invalid @enderror" id="aeroporto_chegada_id" name="aeroporto_chegada_id" required>
                        <option value="-1">Selecione um aeroporto</option>
                        @foreach ($aeroportos as $aeroporto)
                            <option value="{{ $aeroporto->id }}">{{ $aeroporto->nome }}</option>
                        @endforeach
                    </select>
                    @error('aeroporto_chegada_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="chegada">Data/Hora </label>
                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                        <div class="input-group-prepend" data-target="#datetimepicker2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <input id="chegada" name="chegada" type="text" class="form-control datetimepicker-input @error('chegada') is-invalid @enderror" data-target="#datetimepicker2" required>
                        @error('chegada')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <hr/>
            <div class="form-group row mb-5">
                <label class="col-sm-2 col-form-label" for="empresa_id">Empresa </label>
                <div class="col-sm-6">
                    <select class="form-control" id="empresa_id" name="empresa_id">
                        @foreach ($empresas as $empresa)
                            <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
                        @endforeach
                    </select>
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
                        <input id="primeira" name="primeira" type="number" step="0.01" class="form-control @error('primeira') is-invalid @enderror" required>
                        @error('primeira')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="executiva">Executiva</label>
                    <div class="input-group">
                        <div class="input-group-prepend" >
                            <div class="input-group-text">R$</div>
                        </div>
                        <input id="executiva" name="executiva" type="number" step="0.01" class="form-control @error('executiva') is-invalid @enderror" required>
                        @error('executiva')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="economica">Economica</label>
                    <div class="input-group">
                        <div class="input-group-prepend" >
                            <div class="input-group-text">R$</div>
                        </div>
                        <input id="economica" name="economica" type="number" step="0.01" class="form-control @error('economica') is-invalid @enderror" required>
                        @error('economica')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="d-flex justify-content-center flex-md-row flex-column mt-5">
                <div class="mr-2">
                    <input type="submit" value="Cadastrar" class="btn btn-primary">
                </div>
                <div class="mr-2">
                    <a class="btn btn-secondary" href="{{ route('voos.index') }}" role="button">Voltar</a>
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
            // $('#primeira').mask('#.##0,00', {
            //     reverse: true,
            //     removeMaskOnSubmit: true});
            // $('#executiva').mask('000.000.000.000.000,00', {
            //     reverse: true,
            //     removeMaskOnSubmit: true});
            // $('#economica').mask('000.000.000.000.000,00', {
            //     reverse: true,
            //     removeMaskOnSubmit: true});


            $('#datetimepicker1').datetimepicker({
                locale: 'pt-br'
            });

            $('#datetimepicker2').datetimepicker({
                locale: 'pt-br'
            });


        };

    </script>
@endpush
