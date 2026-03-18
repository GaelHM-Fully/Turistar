@extends('layouts.app')

@section('content')

<h2 class="mb-4">Dashboard</h2>

@include('partials.alerts')

<div class="row g-3 mb-4">
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Total de autobuses</h5>
                <p class="fs-2 mb-0">{{ $totalAutobuses ?? 0 }}</p>
            </div>
        </div>
    </div>

    @if(session('usuario_rol') === 'admin')
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Total de usuarios</h5>
                <p class="fs-2 mb-0">{{ $totalUsuarios ?? 0 }}</p>
            </div>
        </div>
    </div>
    @endif
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <h4>Bienvenido al sistema Turistar</h4>
        <p class="mb-0">
            Desde este panel puedes administrar la información del sistema según tu tipo de usuario.
        </p>
    </div>
</div>

@endsection