@extends('layouts.app')

@section('title')
    Informações de {{ $empresa->nome }}
@endsection

@section('content')

    <div class="text-center">
        <h2> Dados da empresa </h2>
    </div>

    <div class="d-flex justify-content-center">
        <div class="form mt-5" style="width:50%;">
            <div class="form-group row mb-3">
                <label class="col-sm-3 col-form-label text-right" for="id">Id: </label>
                <div class="col-sm-3">
                    <input class="form-control" type="text" name="id" id="id" value="{{ $empresa->id }}" disabled>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-sm-3 col-form-label text-right" for="nome">Nome: </label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" name="nome" id="nome" value="{{ $empresa->nome }}" disabled>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-sm-3 col-form-label text-right" for="cnpj">CNPJ: </label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="cnpj" id="cnpj" value="{{ $empresa->cnpj }}" disabled>
                </div>
            </div>


            <div class="d-flex justify-content-center flex-md-row flex-column mt-5">
                <div class="mr-2">
                    <a class="btn btn-primary" href="{{ route('empresas.edit', $empresa->id) }}" role="button">Editar</a>
                </div>
                <div class="mr-2">
                    <a class="btn btn-secondary" href="{{ route('empresas.index') }}" role="button">Voltar</a>
                </div>
                <div class="mr-2">
                    <form name="frmDelete" id="frmDelete" action="{{ route('empresas.destroy', $empresa->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <input class="btn btn-danger" type="button" value="Excluir" onclick="confirmarExclusao('frmDelete')">

                    </form>
                </div>

            </div>

        </div>

    </div>

@endsection

{{-- @push('scripts')

    <script type="text/javascript">
        window.onload = function () {
            $('#btn-excluir').on('click',function(e){
                e.preventDefault();
                var form = $(this).parents('form');
                Swal.fire({
                    title: 'Tem certeza que deseja realizar a exclusão?',
                    text: 'Não será possível reverter esta ação!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sim, deletar',
                    cancelButtonText: 'Não, cancelar',
                    confirmButtonColor: '#dc3545',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(form).submit();
                    }
                });
            });
        }
    </script>

@endpush --}}
