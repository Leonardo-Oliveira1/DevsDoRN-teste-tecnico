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
            <h1>Associados</h1>
            <a href="{{ route('registerAssociate') }}" style="text-decoration: none;" class="fs-5" id="page_action">+ Cadastrar associados</a>
        </div>

        <div class="h-100 d-flex align-items-center justify-content-center flex-column">
            <p>*clique no nome do associado para saber mais</p>

            <table id="table" class="display" style="width:70vw;">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>CPF</th>
                        <th>Data de filiação</th>
                        <th>Situação</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($associates); $i++) <tr>
                        <td><a href="{{ route('associate', $associates[$i][0]->id) }}" style="text-decoration: none; color: blue;">{{ $associates[$i][0]->name }}</a></td>
                        <td>{{ $associates[$i][0]->email }}</td>
                        <td>{{ $associates[$i][0]->cpf }}</td>
                        <td>{{ date("d/m/Y", strtotime($associates[$i][0]->membership_date)) }}</td>

                        @if($associates[$i][1] > 0)
                        <td style="color: red;">Atrasado</td>
                        @else
                        <td style="color: blue;">Em dia</td>
                        @endif
                        </tr>
                        @endfor
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
