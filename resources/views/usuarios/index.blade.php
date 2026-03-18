@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Usuarios</h2>

    <a href="{{ route('usuarios.create') }}" class="btn btn-success">
        <i class="fa-solid fa-user-plus"></i> Nuevo Usuario
    </a>
</div>

@include('partials.alerts')

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Turno</th>
                        <th>Puesto</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->edad }}</td>
                            <td>{{ $usuario->correo }}</td>
                            <td>{{ $usuario->telefono }}</td>
                            <td>{{ $usuario->turno }}</td>
                            <td>{{ $usuario->puesto }}</td>
                            <td>
                                <span class="badge {{ $usuario->rol == 'admin' ? 'bg-danger' : 'bg-secondary' }}">
                                    {{ $usuario->rol }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Deseas eliminar este usuario?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No hay usuarios registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection