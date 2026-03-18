@extends('layouts.app')

@section('content')

<h2 class="mb-4">Registrar Usuario</h2>

@include('partials.alerts')

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Edad</label>
                    <input type="number" name="edad" class="form-control" value="{{ old('edad') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Correo</label>
                    <input type="email" name="correo" class="form-control" value="{{ old('correo') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Turno</label>
                    <select name="turno" class="form-select" required>
                        <option value="">Selecciona</option>
                        <option value="Matutino" {{ old('turno') == 'Matutino' ? 'selected' : '' }}>Matutino</option>
                        <option value="Vespertino" {{ old('turno') == 'Vespertino' ? 'selected' : '' }}>Vespertino</option>
                        <option value="Nocturno" {{ old('turno') == 'Nocturno' ? 'selected' : '' }}>Nocturno</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Puesto</label>
                    <input type="text" name="puesto" class="form-control" value="{{ old('puesto') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="contrasena" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Rol</label>
                    <select name="rol" class="form-select" required>
                        <option value="personal" {{ old('rol') == 'personal' ? 'selected' : '' }}>Personal</option>
                        <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Administrador</option>
                    </select>
                </div>

            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success">
                    Guardar
                </button>

                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                    Volver
                </a>
            </div>
        </form>
    </div>
</div>

@endsection