@extends('adminlte::page')

@section('title', 'Crear Mascota')

@section('content_header')
    <h1>Crear Nueva Mascota</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('mascotas.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="nombre_mascota">Nombre de la mascota</label>
                            <input type="text" class="form-control @error('nombre_mascota') is-invalid @enderror"
                                   id="nombre_mascota" name="nombre_mascota" value="{{ old('nombre_mascota') }}" required>
                            @error('nombre_mascota')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nombre_dueno">Nombre del dueño</label>
                            <input type="text" class="form-control @error('nombre_dueno') is-invalid @enderror"
                                   id="nombre_dueno" name="nombre_dueno" value="{{ old('nombre_dueno') }}" required>
                            @error('nombre_dueno')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="raza">Raza</label>
                            <input type="text" class="form-control @error('raza') is-invalid @enderror"
                                   id="raza" name="raza" value="{{ old('raza') }}">
                            @error('raza')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="edad">Edad (años)</label>
                            <input type="number" min="0" class="form-control @error('edad') is-invalid @enderror"
                                   id="edad" name="edad" value="{{ old('edad') }}">
                            @error('edad')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tamano">Tamaño</label>
                            <input type="text" class="form-control @error('tamano') is-invalid @enderror"
                                   id="tamano" name="tamano" value="{{ old('tamano') }}">
                            @error('tamano')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="peso">Peso (kg)</label>
                            <input type="number" step="0.01" min="0" class="form-control @error('peso') is-invalid @enderror"
                                   id="peso" name="peso" value="{{ old('peso') }}">
                            @error('peso')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('mascotas.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop