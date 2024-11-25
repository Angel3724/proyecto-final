@extends('layouts.sneat')
@extends('layouts.navbar')

@section('contenido')
    <h1 class="fw-bold p-4">Libros Eliminados</h1>

    <a class="btn btn-primary btn-lg" type="button" href="{{ route('libro.index') }}">
        Volver a Listado de Libros
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
                    @foreach ($libros as $libro)
                        <tr>
                            <td><strong>{{ $libro->id }}</strong></td>
                            <td>{{ $libro->titulo }}</td>
                            <td>{{ $libro->autor }}</td>
                            <td><span class="badge bg-label-primary me-1">{{ number_format($libro->precio, 2) }} MXN$</span></td>
                            <td>{{ $libro->user->email }}</td>

                            <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">

                                    <!-- Restaurar libro -->
                                    @if($libro->trashed())
                                        <form action="{{ route('libro.restore', $libro->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <a class="dropdown-item" href="javascript:void(0);" 
                                            onclick="if (confirm('¿Estás seguro de que deseas restaurar este libro?')) { event.preventDefault(); this.closest('form').submit(); }">
                                                <i class="bx bx-refresh me-2"></i> Restaurar
                                            </a>
                                        </form>
                                    @endif

                                    <!-- Eliminar permanentemente -->
                                    <form action="{{ route('libro.forceDelete', $libro->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a class="dropdown-item" href="javascript:void(0);" 
                                        onclick="if (confirm('¿Estás seguro de eliminar este libro permanentemente?')) { event.preventDefault(); this.closest('form').submit(); }">
                                            <i class="bx bx-trash me-2"></i> Eliminar Permanentemente
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
