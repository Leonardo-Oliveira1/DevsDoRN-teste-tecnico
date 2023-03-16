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
            <h1>Anuidades</h1>
            <a href="{{ route('registerAnnuity') }}">Cadastrar anuidade</a>

            @include('utils.flash-message')

            <table id="table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Ano</th>
                        <th>Valor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($annuities as $annuity)
                    <tr>
                        <td>{{ $annuity->year }}</td>
                        <td>R$ {{ $annuity->price }}</td>
                        <td><a href="/alterarValorAnuidade/{{ $annuity->id }}">Alterar valor</a></td>
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
