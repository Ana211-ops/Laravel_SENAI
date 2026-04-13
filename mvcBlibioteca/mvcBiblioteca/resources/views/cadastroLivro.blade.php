<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro livro</title>
</head>
<body>
    <h1>Cadastro livro</h1>

    <br>
    <a href="{{route('livro.listar')}}">Listar livro</a>
    <br>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('livro.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome') }}"
        >
        <br><br>
        <label for="autor">autor: </label>
        <input type="number" name="autor" id="autor" placeholder="autor..."
            required value="{{ old('autor')}}"
        >
        <br><br>
        <label for="descriçao">descrição: </label>
        <input type="number" name="descrição" id="descrição" placeholder="descrição..."
            required value="{{ old('descrição')}}"
        >
        <br><br>
        <label for="n_paginas">n_paginas: </label>
        <input type="number" name="n_paginas" id="n_paginas" placeholder="n_paginas..."
            required value="{{ old('n_paginas')}}"
        >
        <br><br>
        <label for="data_publicação">data_publicação: </label>
        <input type="number" name="data_publicação" id="data_publicação" placeholder="data_publicação..."
            required value="{{ old('data_publicação')}}"
        >
        <br><br>
        <label for="editora">editora: </label>
        <input type="number" name="editora" id="editora" placeholder="editora..."
            required value="{{ old('editora')}}"
        >
        <br><br>
        <label for="custo">custo: </label>
        <input type="number" name="custo" id="custo" placeholder="custo..."
            required value="{{ old('custo')}}"
        >
        <br><br>
        <label for="preço">preço: </label>
        <input type="number" name="preço" id="preço" placeholder="preço..."
            required value="{{ old('peço')}}"
        >
        <br><br>
        <label for="imposto">imposto: </label>
        <input type="number" name="imposto" id="imposto" placeholder="imposto..."
            required value="{{ old('imposto')}}"
        >

        <br><br>
        <label for="editora_nome">editora: </label>
        <select name="editora_nome" id="editora_nome">
            @foreach ($editora as $editora)
                <option value="{{$editora->nome}}">{{$editora->nome}}</option>
            @endforeach
        </select>

        <br><br>
        <label for="descricao">Descricao: </label>
        <input type="text" name="descricao" id="descricao" placeholder="Descricao..."
            required value="{{ old('descricao')}}"
        >

        <br><br>
        <label for="nome">nome: </label>
        <input type="number" name="nome" id="nome" placeholder="nome..."
            required value="{{ old('nome')}}"
        >

        <br><br>
        <label for="preço">preço: </label>
        <input type="number" name="preço" id="preço" placeholder="preço..."
            required value="{{ old('preço')}}"
        >

        <br><br>
        <label for="autor">autor: </label>
        <input type="number" name="autor" id="autor" placeholder="autor..."
            required value="{{ old('autor')}}"
        >

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