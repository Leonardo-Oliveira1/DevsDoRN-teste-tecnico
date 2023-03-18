@extends('layouts.core')

@section('head')
@include('utils.datatable')
@endsection

@section('content')
<a href="/" style="cursor: pointer;">
    < Voltar</a>
        <h1>Associados</h1>
        <p>*clique no nome para saber mais</p>
        <a href="{{ route('registerAssociate') }}">Cadastrar associados</a>

        @include('utils.flash-message')

        <table id="table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>Data de filiação</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($associates); $i++)
                <tr>
                    <td><a href="{{ route('associate', $associates[$i][0]->id) }}">{{ $associates[$i][0]->name }}</a></td>
                    <td>{{ $associates[$i][0]->email }}</td>
                    <td>{{ $associates[$i][0]->cpf }}</td>
                    <td>{{ $associates[$i][0]->membership_date }}</td>

                    @if($associates[$i][1] > 0)
                        <td>Atrasado</td>
                        @else
                        <td>Em dia</td>
                        @endif
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
