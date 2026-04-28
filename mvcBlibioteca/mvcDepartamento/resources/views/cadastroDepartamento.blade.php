<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Departamento</title>
</head>
<body>
    <h1>Cadastro de Departamento</h1>

    <br>
    <a href="{{ route('departamento.listar') }}">Listar Departamentos</a>
    <br>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('departamento.salvar') }}" method="POST">
        @csrf

        <label for="nome">Nome do Departamento:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            required value="{{ old('nome') }}">
        <br><br>

        <label for="sigla">Sigla:</label>
        <input type="text" name="sigla" id="sigla" placeholder="Ex: RH, TI"
            required value="{{ old('sigla') }}">
        <br><br>

        <label for="data_criacao">Data de Criação:</label>
        <input type="date" name="data_criacao" id="data_criacao"
            required value="{{ old('data_criacao') }}">
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