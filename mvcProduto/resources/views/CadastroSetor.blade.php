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

    
    <form action="{{route('Setor.salvar')}}" method="POST">
        @csrf
        <label for="nome">nome:</label>
        <input type="numer" name="nome" id="id" placeholder="nome..." require value="{{ old('nome')}}">
        <br></br>
        <label for="n_corredor">n_corredor:</label>
        <input type="numer" name="n_corredor" id="n_corredor" placeholder="n_corredor..." require value="{{ old('n_corredor')}}">
        <br></br>
        <label for="created_at">created_at:</label>
        <input type="numer" name="created_at" id="created_at" placeholder="created_at..." require value="{{ old('created_at')}}">
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


</body>
</html>