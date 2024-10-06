<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar libro</title>
</head>
<body>
    <h1>Editar Libro</h1>
    <form action="{{ route('libro.update', $libro) }}" method="POST">
        @csrf
        @method('PATCH')
        
        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" id="titulo" value="{{ old('titulo') ?? $libro->titulo }}">
        @error('titulo')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="autor">Autor:</label><br>
        <input type="text" name="autor" id="autor" value="{{ old('autor') ?? $libro->autor }}">
        @error('autor')
            <div>{{ $message }}</div>
        @enderror
        <br>

        
        <label for="editorial">Editorial:</label><br>
        <input type="text" name="editorial" id="editorial" value="{{ old('editorial') ?? $libro->editorial }}">
        @error('editorial')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="precio">Precio:</label><br>
        <input type="number" step="0.01" name="precio" id="precio" value="{{ old('precio') ?? $libro->precio }}">
        @error('precio')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="anio_publicacion">Año de Publicación:</label><br>
        <input type="number" name="anio_publicacion" id="anio_publicacion" value="{{ old('anio_publicacion') ?? $libro->anio_publicacion }}">
        @error('anio_publicacion')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="isbn">ISBN:</label><br>
        <input type="text" name="isbn" id="isbn" value="{{ old('isbn') ?? $libro->isbn }}">
        @error('isbn')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="paginas">Páginas:</label><br>
        <input type="number" name="paginas" id="paginas" value="{{ old('paginas') ?? $libro->paginas }}">
        @error('paginas')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="genero">Género:</label>
        <select name="genero" id="genero">
            <option value="Ficción" @selected($libro->genero == 'Ficción')>Ficción</option>
            <option value="No Ficción" @selected($libro->genero == 'No Ficción')>No Ficción</option>
            <option value="Ciencia" @selected($libro->genero == 'Ciencia')>Ciencia</option>
            <option value="Fantasía" @selected($libro->genero == 'Fantasía')>Fantasía</option>
            <option value="Historia" @selected($libro->genero == 'Historia')>Historia</option>
            <option value="Otro" @selected($libro->genero == 'Otro')>Otro</option>
        </select>
        @error('genero')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="sinopsis">Sinopsis:</label><br>
        <textarea name="sinopsis" id="sinopsis" cols="30" rows="4">{{ old('sinopsis') ?? $libro->sinopsis }}</textarea>
        @error('sinopsis')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <input type="submit" value="Actualizar">
    </form>
</body>
</html>