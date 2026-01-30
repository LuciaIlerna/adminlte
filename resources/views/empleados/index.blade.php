@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-sm-6">
            <h1 class="text-dark">
                <i class="fas fa-users-cog text-teal"></i> Empleados
            </h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ route('empleados.create') }}" class="btn btn-teal btn-lg elevation-2">
                <i class="fas fa-plus"></i> Nuevo Empleado
            </a>
        </div>
    </div>

    <!-- Alert Messages -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ $message }}
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        </div>
    @endif

    <!-- Table Card -->
    <div class="card card-outline elevation-3" style="border-top: 4px solid #16a085;">
        <div class="card-header" style="background-color: #16a085;">
            <h3 class="card-title text-white">
                <i class="fas fa-list"></i> Listado de Empleados
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            @if($empleados->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm">
                        <thead style="background-color: #16a085; color: white;">
                            <tr>
                                <th style="width: 8%">ID</th>
                                <th style="width: 15%">Nombre</th>
                                <th style="width: 15%">Apellido</th>
                                <th style="width: 18%">Puesto</th>
                                <th style="width: 18%">Email</th>
                                <th style="width: 14%">Teléfono</th>
                                <th style="width: 12%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empleados as $emp)
                                <tr>
                                    <td class="text-bold">{{ $emp->id }}</td>
                                    <td>{{ $emp->nombre ?? 'N/A' }}</td>
                                    <td>{{ $emp->apellido ?? 'N/A' }}</td>
                                    <td><span class="badge badge-success">{{ $emp->puesto ?? 'N/A' }}</span></td>
                                    <td>{{ $emp->email ?? 'N/A' }}</td>
                                    <td>{{ $emp->telefono ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('empleados.show', $emp->id) }}" class="btn btn-sm btn-info" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('empleados.edit', $emp->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('empleados.destroy', $emp->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este empleado?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-4 text-center">
                    <i class="fas fa-inbox text-muted" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                    <p class="text-muted mb-0">No hay empleados registrados. 
                        <a href="{{ route('empleados.create') }}" class="font-weight-bold" style="color: #16a085;">Registra uno ahora</a>
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection