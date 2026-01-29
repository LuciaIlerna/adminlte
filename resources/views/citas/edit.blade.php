@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-4">Editar Cita</h3>
                <form action="{{ route('citas.update', $cita->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nombre_mascota">Nombre de la mascota</label>
                        <input type="text" class="form-control @error('nombre_mascota') is-invalid @enderror"
                               id="nombre_mascota" name="nombre_mascota" value="{{ old('nombre_mascota', $cita->nombre_mascota) }}" required>
                        @error('nombre_mascota') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="tipo_cita">Tipo de cita</label>
                        <select class="form-control @error('tipo_cita') is-invalid @enderror"
                                id="tipo_cita" name="tipo_cita" required>
                            <option value="">-- Selecciona tipo --</option>
                            <option value="Peluquería" {{ old('tipo_cita', $cita->tipo_cita) == 'Peluquería' ? 'selected' : '' }}>Peluquería</option>
                            <option value="Veterinaria" {{ old('tipo_cita', $cita->tipo_cita) == 'Veterinaria' ? 'selected' : '' }}>Veterinaria</option>
                        </select>
                        @error('tipo_cita') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="fecha_hora">Fecha y Hora</label>
                        <input type="datetime-local" class="form-control @error('fecha_hora') is-invalid @enderror"
                               id="fecha_hora" name="fecha_hora" value="{{ old('fecha_hora', $cita->fecha_hora->format('Y-m-d\TH:i')) }}" required>
                        @error('fecha_hora') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('citas.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection