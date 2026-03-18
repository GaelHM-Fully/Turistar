@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Autobuses</h2>

    <a href="{{ route('autobuses.create') }}" class="btn btn-success">
        <i class="fa-solid fa-plus"></i> Nuevo Autobús
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
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Año</th>
                        <th>Capacidad</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($autobuses as $autobus)
                        <tr>
                            <td>{{ $autobus->id }}</td>
                            <td>{{ $autobus->modelo }}</td>
                            <td>{{ $autobus->marca }}</td>
                            <td>{{ $autobus->anio }}</td>
                            <td>{{ $autobus->capacidad_pasajeros }}</td>
                            <td>{{ $autobus->tipo_autobus }}</td>
                            <td>
                                <a href="{{ route('autobuses.edit', $autobus->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <form action="{{ route('autobuses.destroy', $autobus->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Deseas eliminar este autobús?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No hay autobuses registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection