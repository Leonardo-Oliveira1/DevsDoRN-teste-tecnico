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

    #page_apresentation{
        position: relative;
        top: 40px;
    }

    #page_action:hover{
        color: blue;
        transition: all 0.2s ease-in-out 0s;
    }
</style>

@include("utils.return")


<a href="/" style="cursor: pointer;" id="return" class="mx-3 fs-2">
    < Voltar</a>
        <div class="d-flex align-items-center justify-content-center flex-column" id="page_apresentation">
            <h1>Anuidades</h1>

            <a href="{{ route('registerAnnuity') }}" style="text-decoration: none;" class="fs-5" id="page_action">+ Cadastrar anuidade</a>
        </div>

        <div class="h-100 d-flex align-items-center justify-content-center flex-column">
            <table id="table" class="display" style="width:50vw;">
                <thead>
                    <tr>
                        <th>Ano</th>
                        <th>Valor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($annuities as $annuity)
                    <tr>
                        <td>{{ $annuity->year }}</td>
                        <td>R$ {{ $annuity->price }}</td>
                        <td><a href="/alterarValorAnuidade/{{ $annuity->id }}">Alterar valor</a></td>
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


