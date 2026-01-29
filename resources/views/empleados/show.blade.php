@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark">
                <h3 class="card-title text-white">{{ $empleado->nombre }} {{ $empleado->apellido }}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label><strong>ID:</strong></label>
                    <p>{{ $empleado->id }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Nombre:</strong></label>
                    <p>{{ $empleado->nombre }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Apellido:</strong></label>
                    <p>{{ $empleado->apellido }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Puesto:</strong></label>
                    <p>{{ $empleado->puesto }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Teléfono:</strong></label>
                    <p>{{ $empleado->telefono ?? '—' }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Email:</strong></label>
                    <p>{{ $empleado->email }}</p>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning" title="Editar">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('¿Eliminar este empleado?')" title="Eliminar">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
                <a href="{{ route('empleados.index') }}" class="btn btn-secondary" title="Volver">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection