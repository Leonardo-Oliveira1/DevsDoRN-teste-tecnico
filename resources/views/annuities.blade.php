@extends('layouts.core')

@section('head')
    @include('utils.datatable')
@endsection

@section('content')
    <a href="/" style="cursor: pointer;">
        < Voltar</a>
            <h1>Anuidades</h1>
            <a href="{{ route('registerAnnuity') }}">Cadastrar anuidade</a>

            @include('utils.flash-message')

            <table id="table" class="display" style="width:100%">
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
@endsection

@section('outBody')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@endsection


