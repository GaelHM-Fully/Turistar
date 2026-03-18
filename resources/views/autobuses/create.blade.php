@extends('layouts.app')

@section('content')

<h2 class="mb-4">Registrar Autobús</h2>

@include('partials.alerts')

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('autobuses.store') }}" method="POST">
            @csrf

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Modelo</label>
                    <input type="text" name="modelo" class="form-control" value="{{ old('modelo') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Marca</label>
                    <input type="text" name="marca" class="form-control" value="{{ old('marca') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Año</label>
                    <input type="number" name="anio" class="form-control" value="{{ old('anio') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Capacidad de pasajeros</label>
                    <input type="number" name="capacidad_pasajeros" class="form-control" value="{{ old('capacidad_pasajeros') }}" required>
                </div>

                @if(session('usuario_rol') === 'admin')
                    <div class="col-md-6">
                        <label class="form-label">Tipo de autobús</label>
                        <select name="tipo_autobus" class="form-select" required>
                            <option value="">Selecciona</option>
                            <option value="Urbano" {{ old('tipo_autobus') == 'Urbano' ? 'selected' : '' }}>Urbano</option>
                            <option value="Interurbano" {{ old('tipo_autobus') == 'Interurbano' ? 'selected' : '' }}>Interurbano</option>
                            <option value="Articulado" {{ old('tipo_autobus') == 'Articulado' ? 'selected' : '' }}>Articulado</option>
                        </select>
                    </div>
                @else
                    <div class="col-md-6">
                        <label class="form-label">Tipo de autobús</label>
                        <input type="text" class="form-control" value="Urbano (asignado por defecto)" disabled>
                    </div>
                @endif

            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success">
                    Guardar
                </button>

                <a href="{{ route('autobuses.index') }}" class="btn btn-secondary">
                    Volver
                </a>
            </div>
        </form>
    </div>
</div>

@endsection