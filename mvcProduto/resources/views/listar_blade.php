<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Produtos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>QUANTIDADE</th>
                <th>NOME</th>
                <th>PREÇO</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produto as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->quantidade }}</td>
                    <td>{{ $produto->preço }}</td>
                </tr>

            @empty
                <tr>
                    <td colspan= "3"> nenhum Produto encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>