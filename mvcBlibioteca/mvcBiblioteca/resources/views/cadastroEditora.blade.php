<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro editora</title>
</head>
<body>
    <h1>Cadastro editora</h1>

    <br>
    <a href="{{route('livro.listar')}}">Listar livro</a>
    <br>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('editora.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome') }}"
        >
        <br><br>
        <label for="CNPJ">CNPJ: </label>
        <input type="number" name="CNPJ" id="CNPJ" placeholder="CNPJ..."
            required value="{{ old('CNPJ')}}"
        >
        <br><br>
        <label for="país">país: </label>
        <input type="number" name="país" id="país" placeholder="país..."
            required value="{{ old('país')}}"
        >
        <br><br>
        <label for="cidade">cidade: </label>
        <input type="number" name="cidade" id="cidade" placeholder="cidade..."
            required value="{{ old('cidade')}}"
        >

        <input type="submit" value="Cadastro">
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