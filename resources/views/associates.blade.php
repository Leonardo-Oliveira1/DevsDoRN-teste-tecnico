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
    <a href="/" style="cursor: pointer;">
        < Voltar</a>
            <h1>Associados</h1>
            <a href="{{ route('registerAssociate') }}">Cadastrar associados</a>

            @include('utils.flash-message')

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
                    @foreach($associates as $associate)
                    <tr>
                        <td>{{ $associate->name }}</td>
                        <td>{{ $associate->email }}</td>
                        <td>{{ $associate->cpf }}</td>
                        <td>{{ $associate->membership_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</body>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>

</html>
