@extends('layouts.core')

@section('head')
<script src="{{ asset('jquery.maskMoney.js') }}" type="text/javascript"></script>
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

@include("utils.return")

<a onclick="window.history.back()" style="cursor: pointer;" id="return" class="mx-3 fs-2">
    < Voltar</a>

        <div class="d-flex align-items-center justify-content-center flex-column" id="page_apresentation">
            <h1>Alterar a anuidade de {{ $annuity->year }}</h1>
        </div>


        @include('utils.flash-message')


        <div class="h-100 d-flex align-items-center justify-content-center flex-column">
            <form method="POST" action="{{ route('saveEditAnnuity', $annuity->id) }}" enctype='multipart/form-data' style="background-color: #f6f7f9; padding: 30px; border: 1px solid #4444; border-radius: 15px; filter: drop-shadow(0px 0px 13px #4444)">
                @csrf
                <div class="form-group" style="width: 300px;">
                    <label>Ano</label><br>
                    <input type="number" class="form-control" value="{{ $annuity->year }}" disabled /> <br>

                    <label>Valor</label><br>
                    <input type="text"  class="form-control" id="price" name="price" data-thousands="," data-decimal="." value="R$ {{ $annuity->price }}" data-prefix="R$ " /></br>

                    <input type="submit" class="btn btn-primary" value="Alterar anuidade" style="width: 100%;">
                </div>
            </form>
        </div>
        @endsection
        @section('outBody')
        <script>
            $(function() {
                $('#price').maskMoney();
            })
        </script>
        @endsection
