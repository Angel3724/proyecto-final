@extends('layouts.sneat')
@section('contenido')
<!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Agregar Libro</h5>
            <small class="text-muted float-end"></small>
        </div>
        <div class="card-body">
            <form action="{{ route('libro.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="titulo">Titulo</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('titulo') }}" placeholder="Ingrese el título del libro.">
                @error('titulo')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="autor">Autor</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="autor" id="autor" value="{{ old('autor') }}" placeholder="Ingrese el nombre del autor.">
                @error('autor')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="editorial">Editorial</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="editorial" id="editorial" value="{{ old('editorial') }}" placeholder="Ingrese la editorial (opcional).">
                @error('editorial')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="editorial">Precio</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="precio" id="precio" value="{{ old('precio') }}" placeholder="Ingrese el precio (ej. 199.99).">
                @error('precio')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="anio_publicacion">Año de Publicación</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="anio_publicacion" id="anio_publicacion" value="{{ old('anio_publicacion') }}" placeholder="Ingrese el año de publicación (ej. 2023).">
                @error('anio_publicacion')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="isbn">ISBN</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="isbn" id="isbn" value="{{ old('isbn') }}" placeholder="Ingrese el ISBN único del libro.">
                @error('isbn')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="paginas">Número de Páginas</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="paginas" id="paginas" value="{{ old('paginas') }}" placeholder="Ingrese el número de páginas.">
                @error('paginas')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="genero">Género</label>
                <div class="col-sm-10">
                    <select name="genero" id="genero" class="form-control">
                        <option value="Ficción" {{ old('genero') == 'Ficción' ? 'selected' : '' }}>Ficción</option>
                        <option value="No Ficción" {{ old('genero') == 'No Ficción' ? 'selected' : '' }}>No Ficción</option>
                        <option value="Ciencia" {{ old('genero') == 'Ciencia' ? 'selected' : '' }}>Ciencia</option>
                        <option value="Fantasía" {{ old('genero') == 'Fantasía' ? 'selected' : '' }}>Fantasía</option>
                        <option value="Historia" {{ old('genero') == 'Historia' ? 'selected' : '' }}>Historia</option>
                        <option value="Otro" {{ old('genero') == 'Otro' ? 'selected' : '' }}>Otro</option>
                    </select>
                    @error('genero')
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="sinopsis">Sinopsis</label>
                <div class="col-sm-10">
                <textarea name="sinopsis" class="form-control" id="sinopsis" cols="30" rows="4" placeholder="Ingrese una breve sinopsis del libro (opcional).">{{ old('sinopsis') }}</textarea>
                @error('sinopsis')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-sm-10">
                    <input type="submit" value="Agregar" class="btn btn-primary">
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
@endsection