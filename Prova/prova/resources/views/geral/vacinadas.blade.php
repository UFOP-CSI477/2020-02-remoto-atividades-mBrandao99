@extends('layouts.geral')

@section('content')

<h3 class="panel-title ml-2 mb-3"> Total geral vacinadas aplicadas</h3>

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Aplicação</th>
            <th>Quantidade</th>
        </tr>
    </thead>
    <tbody>
        {{-- @foreach() --}}
            <tr>
                <td></td>
                <td></td>
            </tr>
        {{-- @endforeach --}}
    </tbody>
    <tfoot>
        <tr>
            <th>TOTAL GERAL</th>
            <th></th>
        </tr>
    </tfoot>

</table>

@endsection
