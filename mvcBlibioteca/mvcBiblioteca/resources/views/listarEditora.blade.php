<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editora</title>
</head>
<body>
    <h1>Relatório da editora</h1>
    <a href="{{route('livro.cadastro')}}">Cadastrar livro</a>
    <br>
    <a href="{{route('editora.cadastro')}}">Cadastrar editora</a>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>NOME</th>
                <th>CNPJ</th>
                <th>PAÍS</th>
                <th>CIDADE</th>
            </tr>
        </thead>
        <tbody>
            @forelse($editora as $editora)
                <tr>
                    <td>{{ $editora->nome }}</td>
                    <td>{{ $editora->CNPJ }}</td>
                    <td>{{ $editora->país }}</td>
                    <td>{{ $editora->cidade }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"> Nenhuma editora encontrada</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>