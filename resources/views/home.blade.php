@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="text-dark mb-3">
                <i class="fas fa-tachometer-alt text-success"></i> Panel de Control
            </h1>
            <p class="text-muted">Bienvenido a PetCare - Sistema de Gestión Veterinaria</p>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        </div>
    @endif

    <!-- Stats Cards -->
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="info-box">
                <span class="info-box-icon bg-success elevation-3">
                    <i class="fas fa-users"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Clientes</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="info-box">
                <span class="info-box-icon bg-warning elevation-3">
                    <i class="fas fa-paw"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Mascotas</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-3">
                    <i class="fas fa-calendar-alt"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Citas Hoy</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="info-box">
                <span class="info-box-icon bg-danger elevation-3">
                    <i class="fas fa-syringe"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Vacunaciones</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Welcome Card -->
    <div class="row">
        <div class="col-12">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle"></i> Bienvenido
                    </h3>
                </div>
                <div class="card-body">
                    <p>¡Hola, <strong>{{ Auth::user()->name }}</strong>! 👋</p>
                    <p>Estás conectado a PetCare, tu sistema completo de gestión para clínicas veterinarias y tiendas de mascotas.</p>
                    <p class="mb-0">
                        <i class="fas fa-arrow-right text-success"></i> 
                        Utiliza el menú lateral para navegar entre clientes, mascotas, citas y productos.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
