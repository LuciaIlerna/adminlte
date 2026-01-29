@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark">
                <h3 class="card-title text-white">{{ $cita->nombre_mascota }}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label><strong>ID:</strong></label>
                    <p>{{ $cita->id }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Mascota:</strong></label>
                    <p>{{ $cita->nombre_mascota }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Tipo de Cita:</strong></label>
                    <p>{{ $cita->tipo_cita }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Fecha y Hora:</strong></label>
                    <p>{{ $cita->fecha_hora->format('d/m/Y H:i') }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Fecha de Creación:</strong></label>
                    <p>{{ $cita->created_at->format('d/m/Y H:i') }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Última Actualización:</strong></label>
                    <p>{{ $cita->updated_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-warning" title="Editar">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('¿Eliminar esta cita?')" title="Eliminar">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
                <a href="{{ route('citas.index') }}" class="btn btn-secondary" title="Volver">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection