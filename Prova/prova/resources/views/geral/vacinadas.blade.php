@extends('layouts.geral')

@section('content')

<div class="text-center">
    <h3 class="panel-title ml-2 mb-3">Total geral vacinadas aplicadas</h3>
</div>

<div class="d-flex justify-content-center">
    <table class="table table-bordered table-hover table-striped" style="width:50%;">
        <thead class="table-dark">
            <tr>
                <th>Aplicação</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
            @php($total_geral = 0)
            @foreach($vacinadas as $v)
                <tr>
                    <td>{{ $v['nome'] }}</td>
                    <td>{{ $v['total'] }}</td>
                </tr>
                @php($total_geral += $v['total'])
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>TOTAL GERAL</th>
                <th>{{ $total_geral }}</th>
            </tr>
        </tfoot>

    </table>
</div>
@endsection
