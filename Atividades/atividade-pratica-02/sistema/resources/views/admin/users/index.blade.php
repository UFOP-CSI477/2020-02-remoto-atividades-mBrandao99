@extends('admin')

@section('content')

<h2> Lista de usuários </h2>

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td><a href="{{ route('admin.users.show', $u->id) }}">Exibir</a></td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection
