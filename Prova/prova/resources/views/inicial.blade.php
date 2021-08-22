@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mt-5">
                <h3>Selecione a área</h3>
            </div>
            <hr>
            <div class="row justify-content-around mb-5">
                <div class="btn-group">
                    <a class="btn btn-primary btn-lg" role="button" href="{{ route('geral') }}">Área geral</a>
                    <button type="button" class="btn btn-primary btn-lg dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('vacinadas') }}">Total vacinadas</a>
                        <a class="dropdown-item" href="{{ route('aplicacoes') }}">Total aplicações</a>
                    </div>
                </div>
                <div class="btn-group">
                    <a class="btn btn-danger btn-lg" role="button" href="{{ route('admin') }}">Área administrativa</a>
                    <button type="button" class="btn btn-danger btn-lg dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('vacinas.index') }}">Vacinas</a>
                        <a class="dropdown-item" href="{{ route('pessoas.index') }}">Pessoas</a>
                        <a class="dropdown-item" href="{{ route('unidades.index') }}">Unidades</a>
                        <a class="dropdown-item" href="{{ route('registros.index') }}">Registros</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
