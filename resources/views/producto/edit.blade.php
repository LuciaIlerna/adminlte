@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="text-dark">
                <i class="fas fa-box-open text-primary"></i> Editar Producto
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card card-primary card-outline elevation-3">
                <div class="card-header bg-primary">
                    <h3 class="card-title">
                        <i class="fas fa-form"></i> Formulario de Edición
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('producto.update', $producto->id) }}" method="POST" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nombre -->
                        <div class="form-group mb-3">
                            <label for="nombre" class="form-label font-weight-bold">
                                <i class="fas fa-tag text-primary"></i> Nombre <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="nombre" name="nombre" placeholder="Ej: Correa para perro"
                                   class="form-control form-control-lg @error('nombre') is-invalid @enderror"
                                   value="{{ old('nombre', $producto->nombre) }}" required>
                            @error('nombre') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <!-- Descripción -->
                        <div class="form-group mb-3">
                            <label for="descripcion" class="form-label font-weight-bold">
                                <i class="fas fa-align-left text-primary"></i> Descripción
                            </label>
                            <textarea id="descripcion" name="descripcion" placeholder="Descripción del producto" rows="4"
                                      class="form-control form-control-lg @error('descripcion') is-invalid @enderror">{{ old('descripcion', $producto->descripcion) }}</textarea>
                            @error('descripcion') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <!-- Precio -->
                        <div class="form-group mb-3">
                            <label for="precio" class="form-label font-weight-bold">
                                <i class="fas fa-euro-sign text-primary"></i> Precio <span class="text-danger">*</span>
                            </label>
                            <input type="number" id="precio" name="precio" placeholder="0.00" step="0.01" min="0"
                                   class="form-control form-control-lg @error('precio') is-invalid @enderror"
                                   value="{{ old('precio', $producto->precio) }}" required>
                            @error('precio') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <!-- Stock -->
                        <div class="form-group mb-3">
                            <label for="stock" class="form-label font-weight-bold">
                                <i class="fas fa-boxes text-primary"></i> Stock <span class="text-danger">*</span>
                            </label>
                            <input type="number" id="stock" name="stock" placeholder="0" min="0"
                                   class="form-control form-control-lg @error('stock') is-invalid @enderror"
                                   value="{{ old('stock', $producto->stock) }}" required>
                            @error('stock') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <!-- Imagen Actual -->
                        @if($producto->imagen)
                            <div class="form-group mb-3">
                                <label class="form-label font-weight-bold">
                                    <i class="fas fa-image text-primary"></i> Imagen Actual
                                </label>
                                <div>
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                </div>
                            </div>
                        @endif

                        <!-- Imagen Nueva -->
                        <div class="form-group mb-3">
                            <label for="imagen" class="form-label font-weight-bold">
                                <i class="fas fa-image text-primary"></i> Cambiar Imagen
                            </label>
                            <input type="file" id="imagen" name="imagen" accept=".jpg,.jpeg,.png,.gif"
                                   class="form-control form-control-lg @error('imagen') is-invalid @enderror">
                            <small class="form-text text-muted">Máximo 2MB. Formatos: JPG, PNG, GIF (dejar vacío para mantener la imagen actual)</small>
                            @error('imagen') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <!-- PDF Actual -->
                        @if($producto->archivo_pdf)
                            <div class="form-group mb-3">
                                <label class="form-label font-weight-bold">
                                    <i class="fas fa-file-pdf text-danger"></i> PDF Actual
                                </label>
                                <div>
                                    <a href="{{ asset('storage/' . $producto->archivo_pdf) }}" target="_blank" class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-file-pdf"></i> Ver PDF
                                    </a>
                                </div>
                            </div>
                        @endif

                        <!-- Archivo PDF Nuevo -->
                        <div class="form-group mb-4">
                            <label for="archivo_pdf" class="form-label font-weight-bold">
                                <i class="fas fa-file-pdf text-danger"></i> Cambiar Archivo PDF (Ficha Técnica)
                            </label>
                            <input type="file" id="archivo_pdf" name="archivo_pdf" accept=".pdf"
                                   class="form-control form-control-lg @error('archivo_pdf') is-invalid @enderror">
                            <small class="form-text text-muted">Máximo 5MB. Formato: PDF (dejar vacío para mantener el PDF actual)</small>
                            @error('archivo_pdf') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg elevation-2">
                                <i class="fas fa-save"></i> Guardar Cambios
                            </button>
                            <a href="{{ route('producto.index') }}" class="btn btn-secondary btn-lg">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Info Card -->
        <div class="col-lg-4">
            <div class="card card-info card-outline">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        <i class="fas fa-lightbulb"></i> Información
                    </h3>
                </div>
                <div class="card-body">
                    <p><strong>Campos obligatorios:</strong></p>
                    <ul class="mb-3">
                        <li>Nombre</li>
                        <li>Precio</li>
                        <li>Stock</li>
                    </ul>
                    <p class="text-muted small mb-0">Puedes actualizar la imagen del producto y el archivo PDF con la ficha técnica.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection