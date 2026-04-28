<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Funcionário</title>
</head>
<body>
    <h1>Atualizar Funcionário</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('funcionario.update', $funcionario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h3>Dados do Funcionário</h3>

        <label>Nome:</label>
        <input type="text" name="nome" required
            value="{{ old('nome', $funcionario->nome) }}">
        <br><br>

        <label>Cargo:</label>
        <input type="text" name="cargo" required
            value="{{ old('cargo', $funcionario->cargo) }}">
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" required
            value="{{ old('email', $funcionario->email) }}">
        <br><br>

        <label>Data de Admissão:</label>
        <input type="date" name="data_admissao" required
            value="{{ old('data_admissao', $funcionario->data_admissao) }}">
        <br><br>

        <label>Salário:</label>
        <input type="number" step="0.01" name="salario"
            value="{{ old('salario', $funcionario->salario) }}">
        <br><br>

        
        <label>Departamento:</label>
        <select name="departamento_id" required>
            @foreach ($departamentos as $departamento)
                <option value="{{ $departamento->id }}"
                    {{ $funcionario->departamento_id == $departamento->id ? 'selected' : '' }}>
                    {{ $departamento->nome }} ({{ $departamento->sigla }})
                </option>
            @endforeach
        </select>

        <br><br>

        <h3>Dados Pessoais</h3>

        <label>CPF:</label>
        <input type="text" name="cpf" required
            value="{{ old('cpf', $funcionario->dadosPessoais->cpf ?? '') }}">
        <br><br>

        <label>RG:</label>
        <input type="text" name="rg" required
            value="{{ old('rg', $funcionario->dadosPessoais->rg ?? '') }}">
        <br><br>

        <label>Data de Nascimento:</label>
        <input type="date" name="data_nascimento"
            value="{{ old('data_nascimento', $funcionario->dadosPessoais->data_nascimento ?? '') }}">
        <br><br>

        <label>Sexo:</label>
        <select name="sexo">
            <option value="">Selecione</option>
            <option value="M" {{ (old('sexo', $funcionario->dadosPessoais->sexo ?? '') == 'M') ? 'selected' : '' }}>Masculino</option>
            <option value="F" {{ (old('sexo', $funcionario->dadosPessoais->sexo ?? '') == 'F') ? 'selected' : '' }}>Feminino</option>
        </select>

        <br><br>

        <button type="submit">Atualizar</button>
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>