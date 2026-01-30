@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="text-dark">
                <i class="fas fa-user-plus text-success"></i> Nuevo Cliente
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card card-success card-outline elevation-3">
                <div class="card-header bg-success">
                    <h3 class="card-title">
                        <i class="fas fa-form"></i> Formulario de Registro
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('clientes.store') }}" method="POST" class="needs-validation">
                        @csrf

                        <!-- Nombre -->
                        <div class="form-group mb-3">
                            <label for="nombre" class="form-label font-weight-bold">
                                <i class="fas fa-id-badge text-success"></i> Nombre <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="nombre" name="nombre" placeholder="Ej: Juan"
                                   class="form-control form-control-lg @error('nombre') is-invalid @enderror"
                                   value="{{ old('nombre') }}" required>
                            @error('nombre') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <!-- Apellido -->
                        <div class="form-group mb-3">
                            <label for="apellido" class="form-label font-weight-bold">
                                <i class="fas fa-id-badge text-success"></i> Apellido <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="apellido" name="apellido" placeholder="Ej: Pérez"
                                   class="form-control form-control-lg @error('apellido') is-invalid @enderror"
                                   value="{{ old('apellido') }}" required>
                            @error('apellido') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label font-weight-bold">
                                <i class="fas fa-envelope text-success"></i> Email <span class="text-danger">*</span>
                            </label>
                            <input type="email" id="email" name="email" placeholder="Ej: juan@example.com"
                                   class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required>
                            @error('email') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="form-group mb-3">
                            <label for="telefono" class="form-label font-weight-bold">
                                <i class="fas fa-phone text-success"></i> Teléfono
                            </label>
                            <input type="tel" id="telefono" name="telefono" placeholder="Ej: +34 123 456 789"
                                   class="form-control form-control-lg @error('telefono') is-invalid @enderror"
                                   value="{{ old('telefono') }}">
                            @error('telefono') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <!-- Dirección -->
                        <div class="form-group mb-4">
                            <label for="direccion" class="form-label font-weight-bold">
                                <i class="fas fa-map-marker-alt text-success"></i> Dirección
                            </label>
                            <input type="text" id="direccion" name="direccion" placeholder="Ej: Calle Principal 123"
                                   class="form-control form-control-lg @error('direccion') is-invalid @enderror"
                                   value="{{ old('direccion') }}">
                            @error('direccion') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg elevation-2">
                                <i class="fas fa-save"></i> Guardar Cliente
                            </button>
                            <a href="{{ route('clientes.index') }}" class="btn btn-secondary btn-lg">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Info Card -->
        <div class="col-lg-4">
            <div class="card card-info card-outline">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        <i class="fas fa-lightbulb"></i> Información
                    </h3>
                </div>
                <div class="card-body">
                    <p><strong>Campos obligatorios:</strong></p>
                    <ul class="mb-3">
                        <li>Nombre</li>
                        <li>Apellido</li>
                        <li>Email</li>
                    </ul>
                    <p class="text-muted small mb-0">Los datos del cliente son importantes para mantener un registro actualizado y poder contactarlo cuando sea necesario.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection