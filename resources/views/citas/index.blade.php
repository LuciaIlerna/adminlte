@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Citas</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('citas.create') }}" class="btn btn-primary float-right">
                <i class="fas fa-plus"></i> Nueva Cita
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
                    <th>Tipo de Cita</th>
                    <th>Fecha y Hora</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($citas as $cita)
                    <tr>
                        <td>{{ $cita->id }}</td>
                        <td>{{ $cita->nombre_mascota }}</td>
                        <td>{{ $cita->tipo_cita }}</td>
                        <td>{{ $cita->fecha_hora->format('d/m/Y H:i') }}</td>
                        <td style="text-align: center; display:flex; justify-content:center; gap:5px;">
                            <a href="{{ route('citas.show', $cita->id) }}" class="btn btn-sm btn-info" title="Ver">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro?')" title="Borrar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No hay citas registradas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection