<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$noticia->titulo}}}</title>
</head>
<body>
    <a href="{{route("admin.noticias.index")}}">Volver a noticias</a>
    @if($noticia != NULL)          
    
        <h1>{{ $noticia->titulo}}</h1>
        <p>{{ $noticia->fecha}}</p>
        <h4>{{ $noticia->autor}}</h4>
        @if($noticia->foto != NULL)
            <img src=" {{$noticia->foto}}" <style width="450px" height="auto"></style>
        @endif
            <p>{{ $noticia->cuerpo}}</p>   
        @else
            <h1>Lo sentimos, no se encontro la noticia que buscas</h1>
    
    @endif
</body>
</html>