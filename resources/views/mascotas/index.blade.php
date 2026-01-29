@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Mascotas</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('mascotas.create') }}" class="btn btn-primary float-right">
                <i class="fas fa-plus"></i> Nueva Mascota
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ $message }}
            </div>
        @endif

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Mascota</th>
                    <th>Dueño</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Tamaño</th>
                    <th>Peso (kg)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mascotas as $mascota)
                    <tr>
                        <td>{{ $mascota->id }}</td>
                        <td>{{ $mascota->nombre_mascota }}</td>
                        <td>{{ $mascota->nombre_dueno }}</td>
                        <td>{{ $mascota->raza }}</td>
                        <td>{{ $mascota->edad }}</td>
                        <td>{{ $mascota->tamano }}</td>
                        <td>{{ $mascota->peso }}</td>
                        <td>
                            <a href="{{ route('mascotas.show', $mascota->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('mascotas.edit', $mascota->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('mascotas.destroy', $mascota->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No hay mascotas registradas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection