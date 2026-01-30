@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-sm-6">
            <h1 class="text-dark">
                <i class="fas fa-box text-purple"></i> Productos
            </h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ route('producto.create') }}" class="btn btn-primary btn-lg elevation-2">
                <i class="fas fa-plus"></i> Nuevo Producto
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
    <div class="card card-primary card-outline elevation-3">
        <div class="card-header bg-primary">
            <h3 class="card-title">
                <i class="fas fa-list"></i> Listado de Productos
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            @if($producto->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th style="width: 10%">ID</th>
                                <th style="width: 30%">Nombre</th>
                                <th style="width: 18%">Precio</th>
                                <th style="width: 15%">Stock</th>
                                <th style="width: 12%">Categoría</th>
                                <th style="width: 15%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($producto as $prod)
                                <tr>
                                    <td class="text-bold">{{ $prod->id }}</td>
                                    <td>{{ $prod->nombre ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge badge-success">
                                            €{{ number_format($prod->precio ?? 0, 2) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($prod->stock > 10)
                                            <span class="badge badge-success">{{ $prod->stock }}</span>
                                        @elseif($prod->stock > 0)
                                            <span class="badge badge-warning">{{ $prod->stock }}</span>
                                        @else
                                            <span class="badge badge-danger">Agotado</span>
                                        @endif
                                    </td>
                                    <td><span class="badge badge-info">Producto</span></td>
                                    <td>
                                        <a href="{{ route('producto.show', $prod->id) }}" class="btn btn-sm btn-info" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('producto.edit', $prod->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('producto.destroy', $prod->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
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
                    <p class="text-muted mb-0">No hay productos registrados. 
                        <a href="{{ route('producto.create') }}" class="text-primary font-weight-bold">Crea uno ahora</a>
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection