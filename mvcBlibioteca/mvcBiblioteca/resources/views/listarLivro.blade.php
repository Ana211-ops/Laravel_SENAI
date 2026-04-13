<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Relatório do livro</h1>
    <a href="{{route('livro.cadastro')}}">Cadastrar livro</a>
    <br>
    <a href="{{route('editora.cadastro')}}">Cadastrar editora</a>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>NOME</th>
                <th>DESCRIÇÃO</th>
                <th>N_PAGINAS</th>
                <th>DATA_PUBLICAÇÃO</th>
                <th>NOME_EDITORA</th>
                <th>CUSTO</th>
                <th>PREÇO</th>
                <th>IMPOSTO</th>
                <th>Atualizar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
           
            @forelse($livro as $livro)
                <tr>
                    <td>{{ $livro->nome }}</td>
                    <td>{{ $livro->descriçao }}</td>
                    <td>{{ $livro->n_paginas }}</td>
                    <td>{{ $livro->data_publicação }}</td>
                    <td>{{ $livro->nome_editora }}</td>
                    <td>{{ $livro->custo }}</td>
                    <td>{{ $livro->preço }}</td>
                    <td>{{ $livro->imposto }}</td>





                    <td>{{ $livro->editora?->nome}}</td>
                    <td>{{ $livro->detalheLivro-?->descricao}}</td>
                    <td>{{ $livro->detalheLivro?->nome}}</td>
                    <td>{{ $livro->detalheLivro?->preço}}</td>
                    <td>{{ $livro->detalheLivro?->autor}}</td>
                    <td>
                        <a href="{{route('livro.atualizar', $livro->nome)}}">Atualizar</a>
                    </td>
                    <td>
                        <form action="{{ route('livro.deletar', $livro->nome)}}" method="POST"
                            onsubmit="return confirm('Deseja realmente excluir');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"> Nenhum Produto encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>