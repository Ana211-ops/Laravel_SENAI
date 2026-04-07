<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Produtos</title>
</head>
<body>
    <h1>Cadastro Produtos</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    
    <form action="{{route('produto.salvar')}}" method="POST">
        @csrf
        <label for="nome">nome:</label>
        <input type="numer" name="nome" id="id" placeholder="nome..." require value="{{ old('nome')}}">
        <br></br>
        <label for="preço">preço:</label>
        <input type="numer" name="preço" id="preço" placeholder="preço..." require value="{{ old('preço')}}">
        <br></br>
        <label for="creatd_at">creatd_at:</label>
        <input type="numer" name="creatd_at" id="creatd_at" placeholder="creatd_at..." require value="{{ old('creatd_at')}}">
        <br></br>
        <label for="updated_at">updated_at:</label>
        <input type="numer" name="updated_at" id="updated_at" placeholder="updated_at..." require value="{{ old('updated_at')}}">
        <br></br>
        <label for="id">id:</label>
        <input type="number" name="id" id="id" placeholder="id..." require value="{{ old('id')}}">
        <input type="submit" value="Cadastrar">


    </form>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>

            @endif
</body>
</html>