@extends('layouts.core')

@section('head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
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
            <h1>Cadastrar associado</h1>
        </div>

        <div class="h-100 d-flex align-items-center justify-content-center flex-column">
            <form method="POST" action="{{ route('saveAssociate') }}" enctype='multipart/form-data' style="background-color: #f6f7f9; padding: 30px; border: 1px solid #4444; border-radius: 15px; filter: drop-shadow(0px 0px 13px #4444)">
                @csrf


                <div class="form-group" style="width: 300px;">

                    @include('utils.flash-message')

                    <label for="exampleInputEmail1">Nome do associado</label>
                    <input type="text" class="form-control" name="name" placeholder="" required><br>

                    <label>Email</label><br>
                    <input type="email" class="form-control" name="email" required><br>

                    <label>CPF</label><br>
                    <input type="text" class="form-control" name="cpf" id="cpf" required><br>

                    <label>Data de filiação</label><br>
                    <input type="date" class="form-control" name="date" required><br>

                    <input type="submit" class="btn btn-primary" value="Cadastrar associado" style="width: 100%;">
                </div>






            </form>
            @endsection

@section('outBody')
<script>
    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00', {
            reverse: false
        });
    });
</script>
@endsection
