<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

    <title>Laravel</title>
</head>

<body>
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
</body>

<script>
    $(document).ready(function() {
        $('.cpf').mask('000.000.000-00', {
            reverse: false
        });
    });
</script>

</html>
