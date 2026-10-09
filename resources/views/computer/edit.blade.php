@extends('Layout.app')

@section('content')
<div class="container py-4">
    <!-- Contenedor tipo Tarjeta (Card) -->
    <div class="card border-0 shadow-sm mx-auto" style="max-width: 600px; border-radius: 12px;">
        
        <!-- Encabezado de la Tarjeta -->
        <div class="card-header bg-white border-0 pt-4 px-4">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-pc-display text-success fs-4"></i>
                <h3 class="m-0 fw-bold text-dark" style="letter-spacing: -0.5px;">Actualizar Equipo</h3>
            </div>
            <p class="text-muted small m-0 mt-1">Modifica las especificaciones del computador asignado.</p>
        </div>

        <!-- Cuerpo del Formulario -->
        <div class="card-body p-4">
            <form action="{{ route('computer.update', $computer['id']) }}" method="POST">
                @csrf
                @method('put')

                <div class="row g-3">
                    <!-- Número del Equipo -->
                    <div class="col-md-6">
                        <label for="number" class="form-label fw-semibold text-dark small">Número del Equipo</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-secondary-subtle text-muted">#</span>
                            <!-- CORREGIDO: Se usa type="text" y name="number" -->
                            <input type="text" id="number" name="number" class="form-control border-secondary-subtle" value="{{ old('number', $computer['number']) }}" required>
                        </div>
                    </div>

                    <!-- Marca del Computador -->
                    <div class="col-md-6">
                        <label for="brand" class="form-label fw-semibold text-dark small">Marca</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-secondary-subtle text-muted"><i class="bi bi-building"></i></span>
                            <!-- CORREGIDO: Ahora es type="text" y name="brand" para que pinte las letras de la marca -->
                            <input type="text" id="brand" name="brand" class="form-control border-secondary-subtle" value="{{ old('brand', $computer['brand']) }}" placeholder="Ej. HP, Dell, Lenovo" required>
                        </div>
                    </div>
                </div>

                <!-- Separador -->
                <hr class="text-black-50 my-4">

                <!-- Botones de Acción de la parte inferior -->
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <a href="{{ url()->previous() }}" class="btn fw-semibold px-4 py-2 border text-secondary bg-white shadow-sm custom-btn-cancel" style="font-size: 0.85rem; letter-spacing: 0.5px; border-radius: 8px;">
                        VOLVER
                    </a>
                    
                    <button type="submit" class="btn text-white fw-semibold px-4 py-2 shadow-sm custom-btn-submit" style="background-color: #39A900; font-size: 0.85rem; letter-spacing: 0.5px; border-radius: 8px;">
                        GUARDAR CAMBIOS <i class="bi bi-check-circle ms-1"></i>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Estilos integrados para mantener la consistencia del grupo -->
<style>
    .form-control:focus {
        border-color: #39A900 !important;
        box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.15) !important;
    }
    .custom-btn-cancel:hover {
        background-color: #f8fafc !important;
        color: #1e293b !important;
    }
    .custom-btn-submit:hover {
        background-color: #2e8800 !important;
        box-shadow: 0 4px 12px rgba(57, 169, 0, 0.2) !important;
    }
</style>
@endsection