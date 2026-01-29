@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Empleados</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('empleados.create') }}" class="btn btn-primary float-right">
                <i class="fas fa-plus"></i> Nuevo Empleado
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
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Puesto</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($empleados as $emp)
                    <tr>
                        <td>{{ $emp->id }}</td>
                        <td>{{ $emp->nombre }}</td>
                        <td>{{ $emp->apellido }}</td>
                        <td>{{ $emp->puesto }}</td>
                        <td>{{ $emp->telefono }}</td>
                        <td>{{ $emp->email }}</td>
                        <td style="text-align: center; display:flex; justify-content:center; gap:5px;">
                            <a href="{{ route('empleados.show', $emp->id) }}" class="btn btn-sm btn-info" title="Ver">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('empleados.edit', $emp->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('empleados.destroy', $emp->id) }}" method="POST" class="d-inline">
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
                        <td colspan="7" class="text-center">No hay empleados registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection