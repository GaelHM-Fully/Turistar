@extends('layouts.app')

@section('content')

<h2 class="mb-4">Modificar Usuario</h2>

@include('partials.alerts')

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $usuario->nombre) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Edad</label>
                    <input type="number" name="edad" class="form-control" value="{{ old('edad', $usuario->edad) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Correo</label>
                    <input type="email" name="correo" class="form-control" value="{{ old('correo', $usuario->correo) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $usuario->telefono) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Turno</label>
                    <select name="turno" class="form-select" required>
                        <option value="Matutino" {{ old('turno', $usuario->turno) == 'Matutino' ? 'selected' : '' }}>Matutino</option>
                        <option value="Vespertino" {{ old('turno', $usuario->turno) == 'Vespertino' ? 'selected' : '' }}>Vespertino</option>
                        <option value="Nocturno" {{ old('turno', $usuario->turno) == 'Nocturno' ? 'selected' : '' }}>Nocturno</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Puesto</label>
                    <input type="text" name="puesto" class="form-control" value="{{ old('puesto', $usuario->puesto) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="contrasena" class="form-control">
                    <small class="text-muted">Déjalo vacío si no deseas cambiar la contraseña.</small>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Rol</label>
                    <select name="rol" class="form-select" required>
                        <option value="personal" {{ old('rol', $usuario->rol) == 'personal' ? 'selected' : '' }}>Personal</option>
                        <option value="admin" {{ old('rol', $usuario->rol) == 'admin' ? 'selected' : '' }}>Administrador</option>
                    </select>
                </div>

            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    Actualizar
                </button>

                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                    Volver
                </a>
            </div>
        </form>
    </div>
</div>

@endsection