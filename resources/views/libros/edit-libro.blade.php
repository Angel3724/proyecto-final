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
            <form action="{{ route('libro.update', $libro) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="titulo">Titulo</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('titulo') ?? $libro->titulo }}">
                @error('titulo')
                    <div class="form-text">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="autor">Autor</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="autor" id="autor" value="{{ old('autor') ?? $libro->autor }}">
                @error('autor')
                    <div class="form-text">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="editorial">Editorial</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="editorial" id="editorial" value="{{ old('editorial') ?? $libro->editorial }}">
                @error('editorial')
                    <div class="form-text">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="editorial">Precio</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="precio" id="precio" value="{{ old('precio') ?? $libro->precio }}">
                @error('precio')
                    <div class="form-text">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="anio_publicacion">Año de Publicación</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="anio_publicacion" id="anio_publicacion" value="{{ old('anio_publicacion') ?? $libro->anio_publicacion }}">
                @error('anio_publicacion')
                    <div class="form-text">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="isbn">ISBN</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="isbn" id="isbn" value="{{ old('isbn') ?? $libro->isbn }}">
                @error('isbn')
                    <div class="form-text">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="paginas">Número de Páginas</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="paginas" id="paginas" value="{{ old('paginas') ?? $libro->paginas }}">
                @error('paginas')
                    <div class="form-text">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="generos">Géneros</label>
                <div class="col-sm-10">
                    <div class="row">
                        @foreach ($generos as $genero)
                            <div class="col-md-4 col-lg-3 mb-2">
                                <div class="form-check">
                                    <input 
                                        type="checkbox" 
                                        name="generos[]" 
                                        value="{{ $genero->id }}" 
                                        id="genero_{{ $genero->id }}" 
                                        class="form-check-input"
                                        {{ in_array($genero->id, $libro->generos->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="genero_{{ $genero->id }}">
                                        {{ $genero->nombre }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @error('generos')
                        <div class="form-text">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="sinopsis">Sinopsis</label>
                <div class="col-sm-10">
                <textarea name="sinopsis" class="form-control" id="sinopsis" cols="30" rows="4">{{ old('sinopsis') ?? $libro->sinopsis }}</textarea>
                @error('sinopsis')
                    <div class="form-text">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-sm-10">
                    <input type="submit" value="Actualizar" class="btn btn-primary">
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
@endsection