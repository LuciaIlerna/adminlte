@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-sm-6">
            <h1 class="text-dark">
                <i class="fas fa-calendar-alt text-danger"></i> Citas
            </h1>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ route('citas.create') }}" class="btn btn-danger btn-lg elevation-2">
                <i class="fas fa-plus"></i> Nueva Cita
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
    <div class="card card-danger card-outline elevation-3">
        <div class="card-header bg-danger">
            <h3 class="card-title">
                <i class="fas fa-list"></i> Listado de Citas
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            @if($citas->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm" id="citasTable">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th style="width: 8%">ID</th>
                                <th style="width: 20%">Mascota</th>
                                <th style="width: 20%">Tipo de Cita</th>
                                <th style="width: 25%">Fecha y Hora</th>
                                <th style="width: 12%">Estado</th>
                                <th style="width: 15%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($citas as $cita)
                                <tr>
                                    <td class="text-bold">{{ $cita->id }}</td>
                                    <td>
                                        <i class="fas fa-heart text-danger"></i> 
                                        {{ $cita->nombre_mascota ?? 'N/A' }}
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">
                                            {{ $cita->tipo_cita ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td>
                                        <i class="fas fa-clock text-info"></i>
                                        {{ $cita->fecha_hora ? $cita->fecha_hora->format('d/m/Y H:i') : 'N/A' }}
                                    </td>
                                    <td>
                                        @if($cita->estado === 'confirmada' || $cita->estado === 'Confirmada')
                                            <span class="badge badge-success">Confirmada</span>
                                        @elseif($cita->estado === 'pendiente' || $cita->estado === 'Pendiente')
                                            <span class="badge badge-warning">Pendiente</span>
                                        @else
                                            <span class="badge badge-secondary">{{ $cita->estado ?? 'N/A' }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('citas.show', $cita->id) }}" class="btn btn-sm btn-info" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if(auth()->user()->isAdmin())
                                            <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar esta cita?')">
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
                    {{ $citas->links('pagination::bootstrap-5') }}
                </div>
            @else
                <div class="p-4 text-center">
                    <i class="fas fa-inbox text-muted" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                    <p class="text-muted mb-0">No hay citas registradas. 
                        <a href="{{ route('citas.create') }}" class="text-danger font-weight-bold">Crea una ahora</a>
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>
@push('js')
<script>
    $(document).ready(function() {
        $('#citasTable').DataTable({
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