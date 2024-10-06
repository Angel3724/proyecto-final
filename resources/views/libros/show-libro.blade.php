<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libro</title>
</head>
<body>
<h1>{{ $libro->titulo }}</h1>
    <p>
        <strong>Autor:</strong> {{ $libro->autor }}<br>
        <strong>Sinopsis:</strong> {{ $libro->sinopsis }}
    </p>
    <p>
        <ul>
            <li>Editorial: {{ $libro->editorial }}</li>
            <li>Año de Publicación: {{ $libro->anio_publicacion }}</li>
            <li>Género: {{ $libro->genero }}</li>
            <li>Precio: {{ number_format($libro->precio, 2) }} MXN$</li>
            <li>Páginas: {{ $libro->paginas }}</li>
            <li>ISBN: {{ $libro->isbn }}</li>
        </ul>
    </p>
    <a href="{{ route('libro.edit', $libro) }}">Editar</a><br>
    <form action="{{ route('libro.destroy', $libro) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Borrar">
    </form>
</body>
</html>