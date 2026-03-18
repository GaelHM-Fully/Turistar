@extends('layouts.app')

@section('content')

<h2 class="mb-4">Modificar Autobús</h2>

@include('partials.alerts')

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('autobuses.update', $autobus->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Modelo</label>
                    <input type="text" name="modelo" class="form-control" value="{{ old('modelo', $autobus->modelo) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Marca</label>
                    <input type="text" name="marca" class="form-control" value="{{ old('marca', $autobus->marca) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Año</label>
                    <input type="number" name="anio" class="form-control" value="{{ old('anio', $autobus->anio) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Capacidad de pasajeros</label>
                    <input type="number" name="capacidad_pasajeros" class="form-control" value="{{ old('capacidad_pasajeros', $autobus->capacidad_pasajeros) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tipo de autobús</label>
                    <select name="tipo_autobus" class="form-select" required>
                        <option value="Urbano" {{ old('tipo_autobus', $autobus->tipo_autobus) == 'Urbano' ? 'selected' : '' }}>Urbano</option>
                        <option value="Interurbano" {{ old('tipo_autobus', $autobus->tipo_autobus) == 'Interurbano' ? 'selected' : '' }}>Interurbano</option>
                        <option value="Articulado" {{ old('tipo_autobus', $autobus->tipo_autobus) == 'Articulado' ? 'selected' : '' }}>Articulado</option>
                    </select>
                </div>

            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    Actualizar
                </button>

                <a href="{{ route('autobuses.index') }}" class="btn btn-secondary">
                    Volver
                </a>
            </div>
        </form>
    </div>
</div>

@endsection