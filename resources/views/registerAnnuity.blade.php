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
    <a onclick="window.history.back()" class="btn btn-label-secondary" style="cursor: pointer;">
        < Voltar</a>
            <h1>Cadastrar anuidade</h1>
            <form method="POST" action="{{ route('saveAnnuity') }}" enctype='multipart/form-data'>
                @csrf
                <label>Ano</label><br>
                <input type="number" name="year" min="1900" max="{{ date('Y') }}" step="1" value="2023" required /> <br>

                <label>Valor</label><br>
                <input type="text" id="price" name="price" data-thousands="." data-decimal="," data-prefix="R$ " />

                <input type="submit" value="Cadastrar anuidade"></input>
            </form>
</body>

<script>
    $(function() {
        $('#price').maskMoney();
    })
</script>

</html>
