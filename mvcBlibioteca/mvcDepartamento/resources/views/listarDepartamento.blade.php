<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos</title>
</head>
<body>
    <h1>Relatório de Departamentos</h1>

    <a href="{{ route('funcionario.cadastro') }}">Cadastrar Funcionário</a>
    <br>
    <a href="{{ route('departamento.cadastro') }}">Cadastrar Departamento</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>NOME</th>
                <th>SIGLA</th>
                <th>DATA DE CRIAÇÃO</th>
            </tr>
        </thead>
        <tbody>
            @forelse($departamentos as $departamento)
                <tr>
                    <td>{{ $departamento->nome }}</td>
                    <td>{{ $departamento->sigla }}</td>
                    <td>{{ $departamento->data_criacao }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum departamento encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>