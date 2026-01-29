@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-4">Editar Servicio</h3>
                <form action="{{ route('servicios.servicio.update', [$categoria->id, $servicio->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nombre">Nombre del servicio</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                               id="nombre" name="nombre" value="{{ old('nombre', $servicio->nombre) }}" required>
                        @error('nombre') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                  id="descripcion" name="descripcion" rows="4">{{ old('descripcion', $servicio->descripcion) }}</textarea>
                        @error('descripcion') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio (€)</label>
                        <input type="number" step="0.01" min="0" class="form-control @error('precio') is-invalid @enderror"
                               id="precio" name="precio" value="{{ old('precio', $servicio->precio) }}">
                        @error('precio') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="horario">Horario</label>
                        <input type="text" class="form-control @error('horario') is-invalid @enderror"
                               id="horario" name="horario" placeholder="Ej: Lunes a Viernes 09:00 - 18:00"
                               value="{{ old('horario', $servicio->horario) }}">
                        @error('horario') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection