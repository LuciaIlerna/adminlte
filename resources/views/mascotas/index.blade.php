@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-sm-6">
            <h1 class="text-dark">
                <i class="fas fa-paw text-warning"></i> Mascotas
            </h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ route('mascotas.create') }}" class="btn btn-warning btn-lg elevation-2">
                <i class="fas fa-plus"></i> Nueva Mascota
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
    <div class="card card-warning card-outline elevation-3">
        <div class="card-header bg-warning">
            <h3 class="card-title">
                <i class="fas fa-list"></i> Listado de Mascotas
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            @if($mascotas->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm" id="mascotasTable">
                        <thead class="bg-warning text-white">
                            <tr>
                                <th style="width: 8%">ID</th>
                                <th style="width: 12%">Imagen</th>
                                <th style="width: 16%">Mascota</th>
                                <th style="width: 16%">Dueño</th>
                                <th style="width: 12%">Raza</th>
                                <th style="width: 10%">Edad</th>
                                <th style="width: 12%">Peso (kg)</th>
                                <th style="width: 14%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mascotas as $mascota)
                                <tr>
                                    <td class="text-bold">{{ $mascota->id }}</td>
                                    <td>
                                        @if($mascota->imagen)
                                            <img src="{{ asset('storage/' . $mascota->imagen) }}" alt="Imagen" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                        @else
                                            <span class="badge badge-secondary">Sin imagen</span>
                                        @endif
                                    </td>
                                    <td><i class="fas fa-heart text-danger"></i> {{ $mascota->nombre_mascota ?? 'N/A' }}</td>
                                    <td>{{ $mascota->nombre_dueno ?? 'N/A' }}</td>
                                    <td>{{ $mascota->raza ?? 'N/A' }}</td>
                                    <td><span class="badge badge-info">{{ $mascota->edad ?? '0' }} años</span></td>
                                    <td>{{ $mascota->peso ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('mascotas.show', $mascota->id) }}" class="btn btn-sm btn-info" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('mascotas.edit', $mascota->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if(auth()->user()->isAdmin())
                                            <form action="{{ route('mascotas.destroy', $mascota->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar esta mascota?')">
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
                    {{ $mascotas->links('pagination::bootstrap-5') }}
                </div>
            @else
                <div class="p-4 text-center">
                    <i class="fas fa-inbox text-muted" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                    <p class="text-muted mb-0">No hay mascotas registradas. 
                        <a href="{{ route('mascotas.create') }}" class="text-warning font-weight-bold">Registra una ahora</a>
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>

@push('js')
<script>
    $(document).ready(function() {
        $('#mascotasTable').DataTable({
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