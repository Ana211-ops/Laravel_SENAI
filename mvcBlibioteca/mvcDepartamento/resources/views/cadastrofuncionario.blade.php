<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
</head>
<body>
    <h1>Cadastro de Funcionário</h1>

    <br>
    <a href="{{ route('funcionario.listar') }}">Listar Funcionários</a>
    <br>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('funcionario.salvar') }}" method="POST">
        @csrf

        
        <h3>Dados do Funcionário</h3>

        <label>Nome:</label>
        <input type="text" name="nome" required value="{{ old('nome') }}">
        <br><br>

        <label>Cargo:</label>
        <input type="text" name="cargo" required value="{{ old('cargo') }}">
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" required value="{{ old('email') }}">
        <br><br>

        <label>Data de Admissão:</label>
        <input type="date" name="data_admissao" required value="{{ old('data_admissao') }}">
        <br><br>

        <label>Salário:</label>
        <input type="number" step="0.01" name="salario" value="{{ old('salario') }}">
        <br><br>

        <!-- ===== DEPARTAMENTO ===== -->
        <label>Departamento:</label>
        <select name="departamento_id" required>
            <option value="">Selecione</option>
            @foreach ($departamentos as $departamento)
                <option value="{{ $departamento->id }}">
                    {{ $departamento->nome }} ({{ $departamento->sigla }})
                </option>
            @endforeach
        </select>

        <br><br>

        <h3>Dados Pessoais</h3>

        <label>CPF:</label>
        <input type="text" name="cpf" required value="{{ old('cpf') }}">
        <br><br>

        <label>RG:</label>
        <input type="text" name="rg" required value="{{ old('rg') }}">
        <br><br>

        <label>Data de Nascimento:</label>
        <input type="date" name="data_nascimento" value="{{ old('data_nascimento') }}">
        <br><br>

        <label>Sexo:</label>
        <select name="sexo">
            <option value="">Selecione</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>

        <br><br>

        <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>