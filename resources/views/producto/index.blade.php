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

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ $message }}
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
                    <table class="table table-striped table-hover table-sm" id="productosTable">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th style="width: 10%">Imagen</th>
                                <th style="width: 25%">Nombre</th>
                                <th style="width: 15%">Precio</th>
                                <th style="width: 12%">Stock</th>
                                <th style="width: 8%">PDF</th>
                                <th style="width: 25%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($producto as $prod)
                                <tr>
                                    <td class="text-bold">{{ $prod->id }}</td>
                                    <td>
                                        @if($prod->imagen)
                                            <img src="{{ asset('storage/' . $prod->imagen) }}" alt="Imagen" class="img-thumbnail" style="max-width: 50px; max-height: 50px;">
                                        @else
                                            <span class="text-muted">Sin imagen</span>
                                        @endif
                                    </td>
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
                                    <td>
                                        @if($prod->archivo_pdf)
                                            <a href="{{ asset('storage/' . $prod->archivo_pdf) }}" target="_blank" class="btn btn-sm btn-outline-danger" title="Descargar PDF">
                                                <i class="fas fa-file-pdf"></i>
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('producto.show', $prod->id) }}" class="btn btn-sm btn-info" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('producto.edit', $prod->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if(auth()->user()->isAdmin())
                                            <form action="{{ route('producto.destroy', $prod->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @else
                                            <button type="button" class="btn btn-sm btn-secondary" title="Solo Admin" disabled>
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Paginación -->
                <div class="card-footer">
                    {{ $producto->links('pagination::bootstrap-5') }}
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

@push('js')
<script>
    $(document).ready(function() {
        $('#productosTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
            },
            paging: false,
            searching: true,
            ordering: true
        });
    });
</script>
@endpush
@endsection