@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-sm-6">
            <h1 class="text-dark">
                <i class="fas fa-users text-success"></i> Clientes
            </h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ route('clientes.create') }}" class="btn btn-success btn-lg elevation-2">
                <i class="fas fa-plus"></i> Nuevo Cliente
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
    <div class="card card-success card-outline elevation-3">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-list"></i> Listado de Clientes
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            @if($clientes->count() > 0)
                <table class="table table-striped table-hover table-sm">
                    <thead class="bg-success text-white">
                        <tr>
                            <th style="width: 10%">ID</th>
                            <th style="width: 25%">Nombre</th>
                            <th style="width: 25%">Email</th>
                            <th style="width: 20%">Teléfono</th>
                            <th style="width: 20%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td class="text-bold">{{ $cliente->id }}</td>
                                <td>{{ $cliente->nombre ?? 'N/A' }}</td>
                                <td>{{ $cliente->email ?? 'N/A' }}</td>
                                <td>{{ $cliente->telefono ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-info" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="p-4 text-center">
                    <i class="fas fa-inbox text-muted" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                    <p class="text-muted mb-0">No hay clientes registrados. 
                        <a href="{{ route('clientes.create') }}" class="text-success font-weight-bold">Crea uno ahora</a>
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection