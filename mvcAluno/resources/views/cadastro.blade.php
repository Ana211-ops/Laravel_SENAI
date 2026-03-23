<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuarios</title>
</head>
<body>
    <h1>Cadastro Usuarios</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    
    <form action="{{route('aluno.update', $aluno->id)}}" method="POST">
        @csrf
        <label for="nome">nome:</label>
        <input type="text" name="nome" id="nome" placeholder="nome..." require value="{{ old('nome')}}">
        <br></br>
        <label for="email">email:</label>
        <input type="text" name="email" id="email" placeholder="email..." require value="{{ old('email')}}">
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