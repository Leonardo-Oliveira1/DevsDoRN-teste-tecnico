<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('utils.datatable')
    <title>Document</title>
</head>

<body>
    <a onclick="window.history.back()" style="cursor: pointer;">
        < Voltar</a>
            <h1>Anuidades</h1>
            <a href="{{ route('annuities') }}">Cadastrar anuidade</a>


            <table id="table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Ano</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                    </tr>
                </tbody>
            </table>
</body>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>


</html>
