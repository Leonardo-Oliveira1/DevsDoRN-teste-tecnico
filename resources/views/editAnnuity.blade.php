@extends('layouts.core')

@section('head')
<script src="{{ asset('jquery.maskMoney.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<a onclick="window.history.back()" style="cursor: pointer;">
    < Voltar</a>
        <h1>Alterar anuidade de {{ $annuity->year }}</h1>

        @include('utils.flash-message')


        <form method="POST" action="{{ route('saveEditAnnuity', $annuity->id) }}" enctype='multipart/form-data'>
            @csrf
            <label>Ano</label><br>
            <input type="number" value="{{ $annuity->year }}" disabled /> <br>

            <label>Valor</label><br>
            <input type="text" id="price" name="price" data-thousands="," data-decimal="." value="R$ {{ $annuity->price }}" data-prefix="R$ " />

            <input type="submit" value="Alterar anuidade"></input>
        </form>
@endsection

@section('outBody')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endsection
