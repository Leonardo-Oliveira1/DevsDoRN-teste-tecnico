@extends('layouts.core')

@section('head')
@include('utils.datatable')
@endsection

@section('content')
<a onclick="window.history.back()" style="cursor: pointer;">
    < Voltar</a>
        <h1>{{ $associate->name}} ({{ $associate->cpf }})</h1>
        <h2>Valor total devido: R$ {{ $total_price}}</h2>
        <table id="table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Ano</th>
                    <th>Valor da anuidade</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->year }}</td>
                    <td>{{ $payment->price }}</td>
                    @if($payment->paid == 0)
                        <td>Não pago</td>
                        @else
                        <td>Pago</td>
                    @endif

                </tr>
                @endforeach
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
