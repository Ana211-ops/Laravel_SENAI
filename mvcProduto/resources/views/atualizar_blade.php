<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>atualizar produto</h1>


    @if(@session('succes'))
        <p style="color: chartreuse">{{ session('success')}}</p>
    @endif


    <form action="">
        @csrf
        @method('PUT')


        <input type="text" name="nome" value="{{ old ('nome', $produto->nome)}}" required>

        <input type="text" name="id" value="{{old ('id', $produto->id)}}" required>

        <button type="submit">atualizar</button>
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $errors}}</li> 
                @endforeach
            </ul>
</body>
</html>