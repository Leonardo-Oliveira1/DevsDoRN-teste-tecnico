@extends('layouts.core')

@section('head')
@include('utils.datatable')
@endsection

@section('content')
<a onclick="window.history.back()" style="cursor: pointer;">
    < Voltar</a>
        <h1>{{ $associate->name}} ({{ $associate->cpf }})</h1>
        <h2>Valor total devido: R$ {{ $total_price}},00</h2>
        <table id="table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Ano</th>
                    <th>Valor da anuidade</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($prices); $i++)
                <tr>
                    <td>{{ $year[$i] }}</td>
                    <td>{{ $prices[$i] }}</td>
                    <td>Não pago</td>
                </tr>
                @endfor
            </tbody>
        </table>
        @endsection

        @section('outBody')
        <script>
            $(document).ready(function() {
                $('#table').DataTable();
            });
        </script>
        @endsection
