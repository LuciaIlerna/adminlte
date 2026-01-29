@extends('adminlte::page')

@section('title', 'Editar Mascota')

@section('content_header')
    <h1>Editar Mascota</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('mascotas.update', $mascota->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nombre_mascota">Nombre de la mascota</label>
                        <input type="text" id="nombre_mascota" name="nombre_mascota"
                               class="form-control @error('nombre_mascota') is-invalid @enderror"
                               value="{{ old('nombre_mascota', $mascota->nombre_mascota) }}" required>
                        @error('nombre_mascota') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="nombre_dueno">Nombre del dueño</label>
                        <input type="text" id="nombre_dueno" name="nombre_dueno"
                               class="form-control @error('nombre_dueno') is-invalid @enderror"
                               value="{{ old('nombre_dueno', $mascota->nombre_dueno) }}" required>
                        @error('nombre_dueno') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="raza">Raza</label>
                        <input type="text" id="raza" name="raza"
                               class="form-control @error('raza') is-invalid @enderror"
                               value="{{ old('raza', $mascota->raza) }}">
                        @error('raza') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="edad">Edad (años)</label>
                        <input type="number" id="edad" name="edad" min="0"
                               class="form-control @error('edad') is-invalid @enderror"
                               value="{{ old('edad', $mascota->edad) }}">
                        @error('edad') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="tamano">Tamaño</label>
                        <input type="text" id="tamano" name="tamano"
                               class="form-control @error('tamano') is-invalid @enderror"
                               value="{{ old('tamano', $mascota->tamano) }}">
                        @error('tamano') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="peso">Peso (kg)</label>
                        <input type="number" step="0.01" id="peso" name="peso" min="0"
                               class="form-control @error('peso') is-invalid @enderror"
                               value="{{ old('peso', $mascota->peso) }}">
                        @error('peso') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('mascotas.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop