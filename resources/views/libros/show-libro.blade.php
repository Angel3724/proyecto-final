@extends('layouts.sneat')
@section('contenido')
<body>
    <div class="container mt-5">
        <!-- Card para mostrar detalles del libro -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">{{ $libro->titulo }}</h1>
            </div>
            <div class="card-body">
                <!-- Información del libro -->
                <p class="card-text">
                    <strong>Autor:</strong> {{ $libro->autor }}<br>
                    <strong>Sinopsis:</strong> {{ $libro->sinopsis }}
                </p>
                <!-- Lista de atributos del libro -->
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item"><strong>Editorial:</strong> {{ $libro->editorial }}</li>
                    <li class="list-group-item"><strong>Año de Publicación:</strong> {{ $libro->anio_publicacion }}</li>
                    <li class="list-group-item"><strong>Género:</strong> {{ $libro->genero }}</li>
                    <li class="list-group-item"><strong>Precio:</strong> {{ number_format($libro->precio, 2) }} MXN$</li>
                    <li class="list-group-item"><strong>Páginas:</strong> {{ $libro->paginas }}</li>
                    <li class="list-group-item"><strong>ISBN:</strong> {{ $libro->isbn }}</li>
                </ul>
                <!-- Botones de acción -->
                <a href="{{ route('libro.edit', $libro) }}" class="btn btn-warning me-2">Editar</a>
                <form action="{{ route('libro.destroy', $libro) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este libro?');">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection