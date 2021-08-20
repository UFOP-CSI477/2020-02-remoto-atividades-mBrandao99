@extends('layouts.app')

@section('title', 'Cadastro de aeroporto')

@section('content')

    <div class="text-center">
        <h2> Cadastrar aeroporto </h2>
    </div>

    <div class="d-flex justify-content-center">
        <form action="{{ route('aeroportos.store') }}" method="POST" style="width:50%;" class="mt-5">
            @csrf
            <div class="form-group row mb-3">
                <label class="col-sm-3 col-form-label text-right" for="nome">Nome: </label>
                <div class="col-sm-8">
                    <input class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" id="nome" required placeholder="Nome do aeroporto">
                    @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-sm-3 col-form-label text-right" for="estado_id">Estado: </label>
                <div class="col-sm-5">
                    <select class="form-control" id="estado_id" name="estado_id">
                        <option value="-1">Selecione um estado</option>
                        @for ($i = 0; $i < count($estados); $i++)
                            <option value="{{ $i }}">{{ $estados[$i]['sigla'] }} - {{ $estados[$i]['nome']}}</option>
                        @endfor

                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-sm-3 col-form-label text-right" for="cidade_id">Cidade: </label>
                <div class="col-sm-8">
                    <select class="form-control @error('cidade_id') is-invalid @enderror" id="cidade_id" name="cidade_id" required>
                        <option value="-1">Selecione um estado antes</option>
                    </select>
                    @error('cidade_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-center flex-md-row flex-column mt-5">
                <div class="mr-2">
                    <input type="submit" value="Cadastrar" class="btn btn-primary">
                </div>
                <div class="mr-2">
                    <a class="btn btn-secondary" href="{{ route('aeroportos.index') }}" role="button">Voltar</a>
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
            $('#estado_id').change(function () {
                var id = $(this).val();

                $('#cidade_id').find('option').not(':first').remove();

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
                                $("#cidade_id").append(option);
                            }
                        }

                        // Object.keys(response.data).length

                    }
                })
            });
        };

    </script>
@endpush
