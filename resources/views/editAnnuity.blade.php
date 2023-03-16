<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('jquery.maskMoney.js') }}" type="text/javascript"></script>
    <title>Laravel</title>
</head>

<body>
    <a onclick="window.history.back()" style="cursor: pointer;"> < Voltar</a>
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
</body>

<script>
    $(function() {
        $('#price').maskMoney();
    })
</script>

</html>
