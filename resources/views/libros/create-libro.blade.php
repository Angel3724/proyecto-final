<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
</head>
<body>
<h1>Crear Libro</h1>
    <form action="{{ route('libro.store') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}">
        @error('titulo')
            <div>{{ $message }}</div>
        @enderror
        <br>
        
        <label for="autor">Autor:</label><br>
        <input type="text" name="autor" id="autor" value="{{ old('autor') }}">
        @error('autor')
            <div>{{ $message }}</div>
        @enderror
        <br>

        
        <label for="editorial">Editorial:</label><br>
        <input type="text" name="editorial" id="editorial" value="{{ old('editorial') }}">
        @error('editorial')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="precio">Precio:</label><br>
        <input type="text" name="precio" value="{{ old('precio') }}">
        @error('precio')
            <div>{{ $message }}</div>
        @enderror
        <br>
        
        <label for="anio_publicacion">Año de Publicación:</label><br>
        <input type="number" name="anio_publicacion" id="anio_publicacion" value="{{ old('anio_publicacion') }}">
        @error('anio_publicacion')
            <div>{{ $message }}</div>
        @enderror
        <br>
        
        <label for="isbn">ISBN:</label><br>
        <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}">
        @error('isbn')
            <div>{{ $message }}</div>
        @enderror
        <br>
        
        <label for="paginas">Número de Páginas:</label><br>
        <input type="number" name="paginas" id="paginas" value="{{ old('paginas') }}">
        @error('paginas')
            <div>{{ $message }}</div>
        @enderror
        <br>
        
        <label for="genero">Género:</label>
        <select name="genero" id="genero">
            <option value="Ficción">Ficción</option>
            <option value="No Ficción">No Ficción</option>
            <option value="Ciencia">Ciencia</option>
            <option value="Fantasía">Fantasía</option>
            <option value="Historia">Historia</option>
            <option value="Otro">Otro</option>
        </select>
        @error('genero')
            <div>{{ $message }}</div>
        @enderror
        <br>
        
        <label for="sinopsis">Sinopsis:</label><br>
        <textarea name="sinopsis" id="sinopsis" cols="30" rows="4">{{ old('sinopsis') }}</textarea>
        @error('sinopsis')
            <div>{{ $message }}</div>
        @enderror
        <br>
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>