<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libro Creado</title>
</head>
<body>
    <h1>¡Felicidades! Has creado un nuevo libro</h1>

    <p><strong>Título:</strong> {{ $libro->titulo }}</p>
    <p><strong>Autor:</strong> {{ $libro->autor }}</p>
    <p><strong>Editorial:</strong> {{ $libro->editorial }}</p>
    <p><strong>Precio:</strong> ${{ number_format($libro->precio, 2) }}</p>
    <p><strong>Año de Publicación:</strong> {{ $libro->anio_publicacion }}</p>
    <p><strong>ISBN:</strong> {{ $libro->isbn }}</p>
    <p><strong>Páginas:</strong> {{ $libro->paginas }}</p>
    <p><strong>Sinopsis:</strong> {{ $libro->sinopsis }}</p>

    <p>¡Gracias por usar nuestro sistema!</p>
</body>
</html>
