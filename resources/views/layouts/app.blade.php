@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle') | @yield('subtitle') @endif
@stop

{{-- Extend and customize the page content header --}}

@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')

            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop

{{-- Rename section content to content_body --}}

@section('content')
    @yield('content_body')
@stop

{{-- Create a common footer --}}

@section('footer')
    <div class="float-right">
        <small>Versión: {{ config('app.version', '1.0.0') }}</small>
    </div>

    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            🐾 {{ config('app.company_name', 'PetCare - Sistema de Gestión Veterinaria') }}
        </a>
    </strong>
@stop

{{-- Add common Javascript/Jquery code --}}

@push('js')
<script>

    $(document).ready(function() {
        // Animaciones suaves de carga
        $('[data-animate]').each(function() {
            $(this).animate({ opacity: 1 }, 500);
        });

        // Efecto hover en cards
        $('.card').hover(function() {
            $(this).addClass('shadow-lg');
        }, function() {
            $(this).removeClass('shadow-lg');
        });
    });

</script>
@endpush

{{-- Add common CSS customizations --}}

@push('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<style type="text/css">

    /* Estilos adicionales personalizados para PetCare */
    .brand-text {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #2ecc71;
    }

    .sidebar-dark-success {
        background: linear-gradient(180deg, #27ae60 0%, #1e5631 100%);
    }

    .navbar-light {
        background: linear-gradient(135deg, #ffffff 0%, #f8fffe 100%);
        border-bottom: 3px solid #2ecc71;
    }

    /* Animación suave para transiciones */
    * {
        transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease;
    }

    /* Estilos de enfoque mejorados */
    .form-control:focus,
    .form-select:focus {
        border-color: #2ecc71;
        box-shadow: 0 0 0 0.2rem rgba(46, 204, 113, 0.25);
    }

</style>
@endpush