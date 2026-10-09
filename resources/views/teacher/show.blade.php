@extends('Layout.app')

@section('content')
<div class="container my-5">
    
    <!-- Encabezado Principal -->
    <div class="mb-4">
        <h1 class="fw-bold text-dark m-0" style="font-size: 1.8rem; letter-spacing: -0.5px;">Perfil del Instructor</h1>
        <p class="text-secondary small m-0 mt-1">Información de contacto y vinculación institucional del docente.</p>
    </div>

    <!-- Bloque Principal Tipo Tarjeta Plana -->
    <div class="bg-white border rounded-3 shadow-sm overflow-hidden" style="max-width: 750px;">
        
        <!-- Pestaña Única Superior -->
        <div class="bg-light border-bottom px-4 py-3">
            <span class="fw-semibold d-flex align-items-center gap-2" style="color: #39A900;">
                <i class="bi bi-person-badge-fill fs-5"></i> Datos Generales
            </span>
        </div>

        <!-- Contenido del Bloque (Modo Lectura) -->
        <div class="p-4 p-md-5">
            <div class="row g-4">
                
                <!-- ID de Registro -->
                <div class="col-md-3">
                    <label class="form-label text-secondary small fw-semibold m-0 mb-1">ID Instructor</label>
                    <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-secondary fw-medium" style="font-size: 0.95rem;">
                        #{{ $teacher['id'] }}
                    </div>
                </div>

                <!-- Nombre (name) -->
                <div class="col-md-9">
                    <label class="form-label text-secondary small fw-semibold m-0 mb-1">Nombre Completo</label>
                    <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark fw-bold" style="font-size: 1.05rem;">
                        {{ $teacher['name'] }}
                    </div>
                </div>

                <!-- Correo Electrónico (email) -->
                <div class="col-12">
                    <label class="form-label text-secondary small fw-semibold m-0 mb-1">Correo Electrónico</label>
                    <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark fw-medium" style="font-size: 0.95rem;">
                        <i class="bi bi-envelope me-2 text-secondary"></i> {{ $teacher['email'] }}
                    </div>
                </div>

                <!-- Área Relacionada (area_id) -->
                <div class="col-md-6">
                    <label class="form-label text-secondary small fw-semibold m-0 mb-1">Área Asignada</label>
                    <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark fw-medium" style="font-size: 0.95rem;">
                        {{ $teacher['area']['name'] ?? 'Sin Área Asignada' }}
                    </div>
                </div>

                <!-- Centro de Formación Vinculado (training_center_id) -->
                <div class="col-md-6">
                    <label class="form-label text-secondary small fw-semibold m-0 mb-1">Centro de Formación</label>
                    <div class="form-control-plaintext bg-light border rounded px-3 py-2 text-dark fw-medium" style="font-size: 0.95rem;">
                        {{ $teacher['training_center']['name'] ?? 'Sin Centro Asignado' }}
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