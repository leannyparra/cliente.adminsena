@extends('Layout.app')

@section('content')
<div class="container my-5">
    
    <!-- Encabezado Principal -->
    <div class="mb-4">
        <h1 class="fw-bold text-dark m-0" style="font-size: 1.8rem; letter-spacing: -0.5px;">Detalle del Computador</h1>
        <p class="text-secondary small m-0 mt-1">Especificaciones técnicas e información del equipo seleccionado.</p>
    </div>

    <!-- Bloque Principal Tipo Tarjeta Plana (Estilo image_663109.png) -->
    <div class="bg-white border rounded-3 shadow-sm overflow-hidden" style="max-width: 650px;">
        
        <!-- Pestaña Única Superior -->
        <div class="bg-light border-bottom px-4 py-3">
            <span class="fw-semibold d-flex align-items-center gap-2" style="color: #39A900;">
                <i class="bi bi-pc-display fs-5"></i> Ficha Técnica del Equipo
            </span>
        </div>

        <!-- Contenido del Bloque (Modo Lectura) -->
        <div class="p-4 p-md-5">
            <div class="row g-4">
                
                <!-- ID de Registro -->
                <div class="col-md-4">
                    <label class="form-label text-secondary small fw-semibold m-0 mb-1">ID de Inventario</label>
                    <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-secondary fw-medium" style="font-size: 0.95rem;">
                        #{{ $computer['id'] }}
                    </div>
                </div>

                <!-- Número de Equipo (number) -->
                <div class="col-md-8">
                    <label class="form-label text-secondary small fw-semibold m-0 mb-1">Número de Equipo</label>
                    <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark fw-bold" style="font-size: 1rem;">
                        Computador {{ $computer['number'] }}
                    </div>
                </div>

                <!-- Marca (brand) -->
                <div class="col-12">
                    <label class="form-label text-secondary small fw-semibold m-0 mb-1">Marca / Fabricante</label>
                    <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark fw-medium" style="font-size: 0.95rem;">
                        {{ $computer['brand'] }}
                    </div>
                </div>

            </div>
        </div>

        <!-- Barra de Botones Inferior -->
        <div class="bg-light border-top p-4 d-flex justify-content-end gap-3">
            <!-- Retorno seguro de historial -->
            <a href="{{ url()->previous() }}" class="btn fw-semibold px-4 py-2 border text-secondary bg-white shadow-sm custom-btn-cancel" style="font-size: 0.85rem; letter-spacing: 0.5px;">
                VOLVER
            </a>
        </div>

    </div>
</div>

<!-- Estilos CSS -->
<style>
    .form-control-plaintext {
        border: 1px solid #dee2e6 !important;
    }

    .custom-btn-cancel:hover {
        background-color: #f8f9fa !important;
        color: #212529 !important;
    }

    .custom-btn-continue:hover {
        background-color: #2e8500 !important;
    }
</style>
@endsection