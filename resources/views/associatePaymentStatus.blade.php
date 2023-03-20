@extends('layouts.core')

@section('head')
@include('utils.datatable')
@endsection

@section('content')

<style>
    html,
    body {
        height: 100%
    }

    body {
        background-color: #f6f7f9;
        color: #23272f;
    }

    #page_apresentation {
        position: relative;
        top: 40px;
    }

    #page_action:hover {
        color: blue;
        transition: all 0.2s ease-in-out 0s;
    }
</style>


<script>
    function confirmPayment(id, year) {
        if (confirm(`Ao clicar em OK, você estará confirmando o pagamento da anuidade de ${year} deste cliente.`)) {
            window.location.replace(`/registrarPagamento/${id}/${year}`);
        }
    }
</script>

@include("utils.return")

<a onclick="window.history.back()" style="cursor: pointer;" id="return" class="mx-3 fs-2">
    < Voltar</a>

        <div class="d-flex align-items-center justify-content-center flex-column" id="page_apresentation">
            <h1>{{ $associate->name}} ({{ $associate->cpf }})</h1>
            @if($total_price > 0)
            <h2>Valor total devido: <span style="color: red;">R$ {{ $total_price}}</span></h2>
            @else
            <h2 style="color: blue;">Este associado está em dia.</h2>
            @endif
        </div>

        <div class="h-100 d-flex align-items-center justify-content-center flex-column">
            <table id="table" class="display" style="width:50vw">
                <thead>
                    <tr>
                        <th>Ano</th>
                        <th>Valor da anuidade</th>
                        <th>Status</th>
                        <th>Alterar status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->year }}</td>
                        <td>R$ {{ $payment->price }}</td>
                        @if($payment->paid == 0)
                        <td style="color: red;">Não pago</td>
                        <form method="POST" action="/registrarPagamento/{{ $associate->id }}/{{ $payment->year }}" enctype='multipart/form-data'>
                            @csrf
                            <td onclick="confirmPayment('{{ $associate->id}}','{{ $payment->year }}')"><button>Confirmar pagamento</button></td>
                        </form>
                        @else
                        <td style="color: blue;">Pago</td>
                        <td></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection

        @section('outBody')
        <script>
            $(document).ready(function() {
                $('#table').DataTable();
            });
        </script>
        @endsection
