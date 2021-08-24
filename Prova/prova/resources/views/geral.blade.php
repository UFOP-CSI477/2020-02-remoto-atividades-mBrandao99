@extends('layouts.geral')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bem-vindo(a)</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        Acesse as páginas pelo menu de navegação superior.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
