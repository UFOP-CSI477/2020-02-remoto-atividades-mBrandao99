@extends('layouts.geral')

@section('content')

<div class="text-center">
    <h3 class="panel-title ml-2 mb-3">Total de aplicações por vacinas</h3>
</div>

<div class="d-flex justify-content-center">
    <table class="table table-bordered table-hover table-striped" style="width:50%;">
        <thead class="table-dark">
            <tr>
                <th>Vacina</th>
                <th>Quantidade</th>
                <th>Porcentagem</th>
            </tr>
        </thead>
        <tbody>
            @if($total_geral == 0)
            <tr>
                <td></td>
                <td> Nenhum registro encontrado </td>
                <td></td>
            </tr>
            @else
                @foreach($aplicacoes as $a)
                    <tr>
                        <td>{{ $a['nome'] }}</td>
                        <td>{{ $a['total'] }}</td>
                        <td>{{ round(($a['total'] * 100) / $total_geral, 2) }}%</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th>TOTAL GERAL</th>
                <th>{{ $total_geral }}</th>
                <th>100%</th>
            </tr>
        </tfoot>

    </table>
</div>

@endsection
