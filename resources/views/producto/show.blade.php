@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark">
                <h3 class="card-title text-white">{{ $servicio->nombre }}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label><strong>Categoría:</strong></label>
                    <p>{{ $categoria->nombre }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Nombre:</strong></label>
                    <p>{{ $servicio->nombre }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Descripción:</strong></label>
                    <p>{{ $servicio->descripcion ?? '—' }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Precio:</strong></label>
                    <p>{{ $servicio->precio ? '€' . number_format($servicio->precio, 2) : '—' }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Horario:</strong></label>
                    <p>{{ $servicio->horario ?? '—' }}</p>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('servicios.servicio.edit', [$categoria->id, $servicio->id]) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <form action="{{ route('servicios.servicio.destroy', [$categoria->id, $servicio->id]) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('¿Eliminar?')">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </form>
                <a href="{{ route('servicios.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection