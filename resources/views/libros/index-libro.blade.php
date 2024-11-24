@extends('layouts.sneat')
@extends('layouts.navbar')
@section('contenido')
    <h1 class="fw-bold p-4">Listado de Libros</h1>

    <a class="btn btn-primary btn-lg" type="button"
        href="{{ route('libro.create') }}">
        Agregar Libro
    </a><br>


    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
            <thead>
                <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Precio</th>
                <th>Usuario</th>
                <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($libros as $libro)
                <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3" href="{{ route('libro.show', $libro) }}"></i> <strong>{{ $libro->id }}</strong></td>
                <td>
                    <a href="{{ route('libro.show', $libro) }}">
                            {{ $libro->titulo }}
                    </a>
                </td>
                <td>{{ $libro->autor }}</td>
                <td><span class="badge bg-label-primary me-1"> {{ number_format($libro->precio, 2) }} MXN$</span></td>
                <td> {{ $libro->user->email }} </td>
                <td>
                    <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('libro.edit', $libro) }}">
                            <i class="bx bx-edit-alt me-2"></i> Editar
                        </a>

                        <form action="{{ route('libro.destroy', $libro) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <a class="dropdown-item" href="javascript:void(0);" 
                            onclick="if (confirm('¿Estás seguro de que deseas eliminar este libro?')) { event.preventDefault(); this.closest('form').submit(); }">
                                <i class="bx bx-trash me-2"></i> Eliminar
                            </a>
                        </form>

                    </div>
                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
@endsection