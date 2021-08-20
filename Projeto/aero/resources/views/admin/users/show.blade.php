@extends('admin')

@section('content')

<h2> Dados do usuário </h2>

<div class="col-sm-8 mt-5">
    <dl class="row">
        <dt class="col-sm-2">Id:</dt>
        <dd class="col-sm-10">{{ $user->id }}</dd>

        <dt class="col-sm-2">Nome:</dt>
        <dd class="col-sm-10">{{ $user->name }}</dd>

        <dt class="col-sm-2">Email:</dt>
        <dd class="col-sm-10">{{ $user->email }}</dd>

    </dl>
</div>

<div class="d-flex flex-md-row flex-column">
    <div class="mx-2">
        <a class="btn btn-secondary" href="{{ route('admin.users.index') }}" role="button">Voltar</a>
    </div>
</div>
@endsection
