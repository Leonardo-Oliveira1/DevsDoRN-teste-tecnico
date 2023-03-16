@extends('layouts.core')

@section('head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
@endsection

@section('content')
    <a onclick="window.history.back()" class="btn btn-label-secondary" style="cursor: pointer;">
        < Voltar</a>
            <h1>Cadastrar associado</h1>
            <form method="POST" action="{{ route('saveAssociate') }}" enctype='multipart/form-data'>
                @csrf
                <label>Nome</label><br>
                <input type="text" name="name" required><br>

                <label>Email</label><br>
                <input type="text" name="email" required><br>

                <label>CPF</label><br>
                <input type="text" name="cpf" id="cpf" class="cpf" required><br>

                <label>Data de filiação</label><br>
                <input type="date" name="date" required><br>


                <input type="submit" value="Cadastrar associado"></input>
            </form>
            @endsection

@section('outBody')
<script>
    $(document).ready(function() {
        $('.cpf').mask('000.000.000-00', {
            reverse: false
        });
    });
</script>
@endsection
