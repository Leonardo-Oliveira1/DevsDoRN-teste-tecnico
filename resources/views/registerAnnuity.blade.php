@extends('layouts.core')

@section('head')
<script src="{{ asset('jquery.maskMoney.js') }}" type="text/javascript"></script>
@endsection

@section('content')
    <a onclick="window.history.back()" style="cursor: pointer;"> < Voltar</a>
            <h1>Cadastrar anuidade</h1>
            <form method="POST" action="{{ route('saveAnnuity') }}" enctype='multipart/form-data'>
                @csrf
                <label>Ano</label><br>
                <input type="number" name="year" min="1900" max="{{ date('Y') }}" step="1" value="2023" required /> <br>

                <label>Valor</label><br>
                <input type="text" id="price" name="price" data-thousands="." data-decimal="," data-prefix="R$ " />

                <input type="submit" value="Cadastrar anuidade"></input>
            </form>
            @endsection

@section('outBody')
<script>
    $(function() {
        $('#price').maskMoney();
    })
</script>
@endsection
