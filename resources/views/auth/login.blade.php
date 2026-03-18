@extends('layouts.app')

@section('content')

<div class="container mt-5" style="max-width: 500px;">
    <div class="card shadow-sm">
        <div class="card-body p-4">

            <h2 class="text-center mb-4">Iniciar Sesión</h2>

            @include('partials.alerts')

            <form action="{{ route('login.authenticate') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Correo</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa-solid fa-at"></i>
                        </span>
                        <input type="email" name="correo" class="form-control" value="{{ old('correo') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" name="contrasena" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa-solid fa-right-to-bracket"></i> Entrar
                </button>
            </form>

        </div>
    </div>
</div>

@endsection