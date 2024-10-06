<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
</head>
<body>
    <h1>Libros</h1>
    <p>
        <a href="{{ route('libro.create') }}">Agregar Libro</a>
    </p>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Año de Publicación</th>
                <th>Género</th>
                <th>Precio</th>
                <th>Creación</th>
                <th>Edición</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
            <tr>
                <td>{{ $libro->id }}</td>
                <td>
                    <a href="{{ route('libro.show', $libro) }}">
                        {{ $libro->titulo }}
                    </a>
                </td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->anio_publicacion }}</td>
                <td>{{ $libro->genero }}</td>
                <td>{{ number_format($libro->precio, 2) }} MXN$</td>
                <td>{{ $libro->created_at }}</td>
                <td>{{ $libro->updated_at }}</td>
                <td>
                    <a href="{{ route('libro.edit', $libro) }}">Editar</a>
                    <form action="{{ route('libro.destroy', $libro) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este libro?');">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>