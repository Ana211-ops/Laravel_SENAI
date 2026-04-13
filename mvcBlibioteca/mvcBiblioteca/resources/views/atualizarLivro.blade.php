<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Livro</title>
</head>
<body>
    <h1>Atualizar Livro</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('livro.update', $livro->nome) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome', $livro->nome) }}"
        >
        <br><br>
        <label for="descrição">descrição: </label>
        <input type="number" name="descrição" id="descrição" placeholder="descrição..."
            required value="{{ old('descrição', $livro->descrição)}}"
        >
        <br><br>
        <label for="preço">preço: </label>
        <input type="number" name="preço" id="preço" placeholder="preço..."
            required value="{{ old('preço', $livro->preço)}}"
        >
        <br><br>
        <label for="autor">autor: </label>
        <input type="number" name="autor" id="autor" placeholder="autor..."
            required value="{{ old('autor', $livro->autor)}}"
        >

        <br><br>
        <label for="editora">editora: </label>
        <select name="editora_nome" id="editora_nome">
            @foreach ($editora as $editora)
                <option value="{{ $editora->nome }}"
                    {{ $livro->editota_nome== $editora->nome ? 'selected' : '' }}>
                    {{ $editora->nome }}
                </option>
            @endforeach
        </select>

        <br><br>
        <label for="descricao">Descricao: </label>
        <input type="text" name="descricao" id="descricao" placeholder="Descricao..."
            required value="{{ old('descricao', $livro->detalhesLivro->descricao)}}"
        >

        <br><br>
        <label for="nome">nome: </label>
        <input type="number" name="nome" id="nome" placeholder="nome..."
            required value="{{ old('nome', $livro->detalhesLivro->nome)}}"
        >

        <br><br>
        <label for="preço">preço: </label>
        <input type="number" name="preço" id="preço" placeholder="preço..."
            required value="{{ old('preço', $livro->detalhesLivro->preço)}}"
        >

        <br><br>
        <label for="autor">autor: </label>
        <input type="number" name="autor" id="autor" placeholder="autor..."
            required value="{{ old('autor', $livro->detalhesLivro->autor)}}"
        >


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