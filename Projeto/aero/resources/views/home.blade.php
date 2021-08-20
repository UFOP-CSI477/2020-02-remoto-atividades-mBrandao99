@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-center">
                <h3>Bem-vindo(a)</h3>
            </div>
            <div class="d-flex justify-content-center">
                <form action="{{ route('home.search') }}" method="POST" style="width:80%;" class="mt-5">
                    @csrf
                    <div class="form-row mb-n3">
                        <h4> Origem </h4>
                    </div>
                    <hr/>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="estado_saida_id">Estado: </label>
                            <select class="form-control" id="estado_saida_id" name="estado_saida_id">
                                <option value="-1">Selecione um estado</option>
                                @foreach ($estados as $key => $estado)
                                    <option value="{{ $key  }}" >{{ $estado['sigla'] }} - {{ $estado['nome'] }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="cidade_saida_id">Cidade: </label>
                            <select class="form-control" id="cidade_saida_id" name="cidade_saida_id">
                                <option value="-1">Selecione um estado antes</option>
                            </select>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="data_saida">Data </label>
                            <div class="input-group date" id="data_saida" data-target-input="nearest">
                                <div class="input-group-prepend" data-target="#data_saida" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <input id="data_saida" name="data_saida" type="text" class="form-control datetimepicker-input" data-target="#data_saida">

                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="horario_saida">Horário </label>
                            <div class="input-group date" id="horario_saida" data-target-input="nearest">
                                <div class="input-group-prepend" data-target="#horario_saida" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                </div>
                                <input id="horario_saida" name="horario_saida" type="text" class="form-control datetimepicker-input" data-target="#horario_saida">

                            </div>
                        </div>

                    </div>


                    <div class="form-row mb-n3">
                        <h4> Destino </h4>
                    </div>
                    <hr/>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="estado_chegada_id">Estado: </label>
                            <select class="form-control" id="estado_chegada_id" name="estado_chegada_id">
                                <option value="-1">Selecione um estado</option>
                                @foreach ($estados as $key => $estado)
                                    <option value="{{ $key  }}" >{{ $estado['sigla'] }} - {{ $estado['nome'] }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="cidade_chegada_id">Cidade: </label>
                            <select class="form-control" id="cidade_chegada_id" name="cidade_chegada_id">
                                <option value="-1">Selecione um estado antes</option>
                            </select>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="data_chegada">Data </label>
                            <div class="input-group date" id="data_chegada" data-target-input="nearest">
                                <div class="input-group-prepend" data-target="#data_chegada" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <input id="data_chegada" name="data_chegada" type="text" class="form-control datetimepicker-input" data-target="#data_chegada">

                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="horario_chegada">Horário </label>
                            <div class="input-group date" id="horario_chegada" data-target-input="nearest">
                                <div class="input-group-prepend" data-target="#horario_chegada" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                </div>
                                <input id="horario_chegada" name="horario_chegada" type="text" class="form-control datetimepicker-input" data-target="#horario_chegada">

                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <input type="submit" value="Pesquisar" class="btn btn-primary">
                    </div>
                </form>

            </div>

            <div class="text-center mt-5">
                <h3>Voos</h3>
            </div>
            <div>
                @if ($voos->count() == 0)
                <div class="card mb-12 ">

                    <div class="card-body text-center">
                        <div><h5 class="card-title"> Nenhum resultado encontrado </h5></div>
                        <div><i class="far fa-frown fa-5x"></i></div>
                    </div>

                </div>
                @endif
                @foreach ($voos as $v)

                    <div class="card mb-3">
                        <div class="row">
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title"> De: <b> {{ $v->aeroportoSaida->cidade }} - {{ $v->aeroportoSaida->estado }}</b>
                                                        &nbsp;&nbsp;&nbsp;
                                                        Para: <b> {{ $v->aeroportoChegada->cidade }} - {{ $v->aeroportoChegada->estado }}</b></h5>
                                <p class="card-text">   Saída: {{ $v->saida }}
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        Chegada: {{ $v->chegada }}</p>
                                <p class="card-text"><small class="text-muted">Fornecido pela empresa: {{ $v->empresa->nome }}</small></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-body">
                                <p class="card-text">Passagens a partir de: </p>
                                <p class="card-text"><h4>{{ numfmt_format_currency(numfmt_create( 'pt_BR', NumberFormatter::CURRENCY ), $v->economica, "BRL") }}</h4></p>
                                <a class="btn btn-success" href="{{ route('home.show', $v->id) }}" role="button">Ver mais detalhes</a>
                            </div>
                        </div>
                        </div>
                    </div>

                @endforeach




            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript">
        window.onload = function () {

            $('#data_saida').datetimepicker({
                locale: 'pt-br',
                format: 'L'
            });

            $('#horario_saida').datetimepicker({
                locale: 'pt-br',
                format: 'LT'
            });

            $('#data_chegada').datetimepicker({
                locale: 'pt-br',
                format: 'L'
            });

            $('#horario_chegada').datetimepicker({
                locale: 'pt-br',
                format: 'LT'
            });

            $('#estado_saida_id').change(function () {
                var id = $(this).val();
                console.log(id);
                $('#cidade_saida_id').find('option').not(':first').remove();

                $.ajax({
                    url: '{{ url('/cidades/') }}/'+id,
                    type: 'get',
                    dataType: 'json',
                    success:function (response) {
                        if(response.data != null) {
                            for (const [key, value] of Object.entries(response.data)) {
                                var id = key;
                                var nome = value.nome;
                                var option = "<option value='"+id+"'>"+nome+"</option>";
                                $("#cidade_saida_id").append(option);
                            }
                        }

                        // Object.keys(response.data).length

                    }
                })
            });

            $('#estado_chegada_id').change(function () {
                var id = $(this).val();
                console.log(id);
                $('#cidade_chegada_id').find('option').not(':first').remove();

                $.ajax({
                    url: '{{ url('/cidades/') }}/'+id,
                    type: 'get',
                    dataType: 'json',
                    success:function (response) {
                        if(response.data != null) {
                            for (const [key, value] of Object.entries(response.data)) {
                                var id = key;
                                var nome = value.nome;
                                var option = "<option value='"+id+"'>"+nome+"</option>";
                                $("#cidade_chegada_id").append(option);
                            }
                        }

                        // Object.keys(response.data).length

                    }
                })
            });




        };

    </script>
@endpush
