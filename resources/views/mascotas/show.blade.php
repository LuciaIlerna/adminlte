@extends('adminlte::page')

@section('title', 'Ver Mascota')

@section('content_header')
    <h1>Detalle de la Mascota</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $mascota->nombre_mascota }}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label><strong>ID:</strong></label>
                    <p>{{ $mascota->id }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Mascota:</strong></label>
                    <p>{{ $mascota->nombre_mascota }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Dueño:</strong></label>
                    <p>{{ $mascota->nombre_dueno }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Raza:</strong></label>
                    <p>{{ $mascota->raza ?? '—' }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Edad:</strong></label>
                    <p>{{ $mascota->edad ?? '—' }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Tamaño:</strong></label>
                    <p>{{ $mascota->tamano ?? '—' }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Peso (kg):</strong></label>
                    <p>{{ $mascota->peso ?? '—' }}</p>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('mascotas.edit', $mascota->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <form action="{{ route('mascotas.destroy', $mascota->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('¿Eliminar esta mascota?')">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </form>
                <a href="{{ route('mascotas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>
@stop