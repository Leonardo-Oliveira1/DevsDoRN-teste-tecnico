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
            <h1>Associados</h1>
            <a href="{{ route('registerAssociate') }}">Cadastrar associados</a>

            <table id="table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>CPF</th>
                        <th>Data de filiação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Leonardo Oliveira</td>
                        <td>oleonardo78@gmail.com</td>
                        <td>711.695.544-58</td>
                        <td>20/03/2021</td>
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
