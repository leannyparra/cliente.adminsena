@extends('Layout.app')

@section('content')
<div class="container my-5">
    
    <!-- Encabezado Principal -->
    <div class="mb-4">
        <h1 class="fw-bold text-dark m-0" style="font-size: 1.8rem; letter-spacing: -0.5px;">Detalle de la Ficha</h1>
        <p class="text-secondary small m-0 mt-1">Información completa y dependencias del programa de formación seleccionado.</p>
    </div>

    <!-- Bloque Principal Tipo Tarjeta Plana -->
    <div class="bg-white border rounded-3 shadow-sm overflow-hidden" style="max-width: 750px;">
        
        <!-- Pestaña Única Superior -->
        <div class="bg-light border-bottom px-4 py-3">
            <span class="fw-semibold d-flex align-items-center gap-2" style="color: #39A900;">
                <i class="bi bi-journal-bookmark-fill fs-5"></i> Ficha Técnica del Programa
            </span>
        </div>

        <!-- Contenido del Bloque (Modo Lectura / Formulario Bloqueado) -->
        <div class="p-4 p-md-5">
            <div class="row g-4">
                
                <!-- ID de Registro -->
                <div class="col-md-4">
                    <label class="form-label text-secondary small fw-semibold m-0 mb-1">ID de Sistema</label>
                    <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-secondary fw-medium" style="font-size: 0.95rem;">
                        #{{ $course['id'] }}
                    </div>
                </div>

                <!-- Número de Ficha (course_number) -->
                <div class="col-md-8">
                    <label class="form-label text-secondary small fw-semibold m-0 mb-1">Número de Ficha</label>
                    <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark fw-bold" style="font-size: 1.05rem;">
                        {{ $course['course_number'] }}
                    </div>
                </div>

                <!-- Jornada / Día (day) -->
                <div class="col-md-6">
                    <label class="form-label text-secondary small fw-semibold m-0 mb-1">Jornada / Día</label>
                    <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark fw-medium" style="font-size: 0.95rem;">
                        {{ $course['day'] }}
                    </div>
                </div>

                <!-- Área Relacionada (area_id) -->
                <div class="col-md-6">
                    <label class="form-label text-secondary small fw-semibold m-0 mb-1">Área de Formación</label>
                    <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark fw-medium" style="font-size: 0.95rem;">
                        {{ $course['area']['name'] ?? 'No Asignada' }}
                    </div>
                </div>

                <!-- Centro de Formación Vinculado (training_center_id) -->
                <div class="col-12">
                    <label class="form-label text-secondary small fw-semibold m-0 mb-1">Centro de Formación</label>
                    <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark fw-medium" style="font-size: 0.95rem;">
                        {{ $course['training_center']['name'] ?? 'No Asignado' }}
                    </div>
                </div>

            </div>
        </div>

        <!-- Barra de Botones Inferior -->
        <div class="bg-light border-top p-4 d-flex justify-content-end gap-3">
            <!-- Retorno seguro -->
            <a href="{{ url()->previous() }}" class="btn fw-semibold px-4 py-2 border text-secondary bg-white shadow-sm custom-btn-cancel" style="font-size: 0.85rem; letter-spacing: 0.5px;">
                VOLVER
            </a>
        </div>

    </div>
</div>

<!-- Estilos CSS unificados -->
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