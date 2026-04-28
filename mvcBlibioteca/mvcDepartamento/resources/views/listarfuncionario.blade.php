<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>
</head>
<body>
    <h1>Relatório de Funcionários</h1>

    <a href="{{ route('funcionario.cadastro') }}">Cadastrar Funcionário</a>
    <br>
    <a href="{{ route('departamento.cadastro') }}">Cadastrar Departamento</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
        
                <th>Nome</th>
                <th>Cargo</th>
                <th>Email</th>
                <th>Data Admissão</th>
                <th>Salário</th>

             
                <th>Departamento</th>

            
                <th>CPF</th>
                <th>RG</th>
                <th>Data Nascimento</th>
                <th>Sexo</th>

                <th>Atualizar</th>
                <th>Deletar</th>
            </tr>
        </thead>

        <tbody>
            @forelse($funcionarios as $funcionario)
                <tr>
               
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->cargo }}</td>
                    <td>{{ $funcionario->email }}</td>
                    <td>{{ $funcionario->data_admissao }}</td>
                    <td>{{ $funcionario->salario }}</td>

              
                    <td>{{ $funcionario->departamento?->nome }}</td>

                   
                    <td>{{ $funcionario->dadosPessoais?->cpf }}</td>
                    <td>{{ $funcionario->dadosPessoais?->rg }}</td>
                    <td>{{ $funcionario->dadosPessoais?->data_nascimento }}</td>
                    <td>{{ $funcionario->dadosPessoais?->sexo }}</td>

               
                    <td>
                        <a href="{{ route('funcionario.atualizar', $funcionario->id) }}">
                            Atualizar
                        </a>
                    </td>

                    <td>
                        <form action="{{ route('funcionario.deletar', $funcionario->id) }}" method="POST"
                              onsubmit="return confirm('Deseja realmente excluir?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="12">Nenhum funcionário encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>