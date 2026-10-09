@extends('Layout.app')

@section('content')
<style>
    .form-control:focus, .form-select:focus {
        border-color: #39A900 !important;
        box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.15) !important;
    }
    .btn-sena-success {
        background-color: #39A900 !important;
        color: white !important;
        transition: all 0.3s ease;
    }
    .btn-sena-success:hover {
        background-color: #2e8500 !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(57, 169, 0, 0.2) !important;
    }
    .btn-sena-light {
        background-color: #f8f9fa;
        color: #6c757d;
        border: 1px solid #dee2e6;
        transition: all 0.3s ease;
    }
    .btn-sena-light:hover {
        background-color: #e9ecef;
        color: #495057;
    }
    .card-top-line {
        border-top: 5px solid #39A900 !important;
    }
</style>

<div class="row justify-content-center align-items-center py-5 mt-2" style="min-height: 80vh;">
    <div class="col-12 col-md-10 col-lg-8">
        
        <div class="card shadow-lg border-0 rounded-4 p-3 p-md-5 bg-white card-top-line">
            <div class="card-body">
                
                <!-- Encabezado de la Tarjeta -->
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="fs-3">👨‍🏫</span> 
                        <h1 class="h4 fw-bold text-dark m-0" style="color: #00324D !important;">Registrar Profesor / Instructor</h1>
                    </div>
                    <p class="text-muted small">Ingrese los datos personales y de vinculación institucional para el nuevo docente.</p>
                </div>

                <!-- Formulario -->
                <form action="{{ route('teacher.store') }}" method="POST">
                    @csrf

                    <!-- Fila 1: Datos Personales -->
                    <div class="row g-4 mb-4">
                        
                        <!-- Campo: Nombre del Profesor -->
                        <div class="col-12 col-md-6">
                            <label for="name" class="form-label fw-semibold text-secondary text-uppercase tracking-wider small" style="font-size: 0.75rem;">
                                Nombre del Profesor
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   class="form-control border-light-subtle rounded-3 @error('name') is-invalid @enderror" 
                                   placeholder="Ej. Carlos Alberto Gómez" 
                                   required 
                                   style="padding: 10px 12px; font-size: 0.95rem;">
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo: Correo Electrónico -->
                        <div class="col-12 col-md-6">
                            <label for="email" class="form-label fw-semibold text-secondary text-uppercase tracking-wider small" style="font-size: 0.75rem;">
                                Correo Electrónico
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   class="form-control border-light-subtle rounded-3 @error('email') is-invalid @enderror" 
                                   placeholder="Ej. cgomez@sena.edu.co" 
                                   required 
                                   style="padding: 10px 12px; font-size: 0.95rem;">
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <!-- Fila 2: Vinculación Académica -->
                    <div class="row g-4 mb-4">
                        
                        <!-- Campo: Área -->
                        <div class="col-12 col-md-6">
                            <label for="area_id" class="form-label fw-semibold text-secondary text-uppercase tracking-wider small" style="font-size: 0.75rem;">
                                Área Asignada
                            </label>
                            <select id="area_id" 
                                    name="area_id" 
                                    class="form-select border-light-subtle rounded-3 @error('area_id') is-invalid @enderror" 
                                    required
                                    style="padding: 10px 12px; font-size: 0.95rem;">
                                <option value="" disabled {{ old('area_id') ? '' : 'selected' }}>-- Seleccione un Área --</option>
                                @foreach($areas as $area)
                                    <option value="{{ $area['id'] }}" {{ old('area_id') == $area['id'] ? 'selected' : '' }}>
                                        {{ $area['name'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('area_id')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo: Centro de Formación -->
                        <div class="col-12 col-md-6">
                            <label for="training_center_id" class="form-label fw-semibold text-secondary text-uppercase tracking-wider small" style="font-size: 0.75rem;">
                                Centro de Formación
                            </label>
                            <select id="training_center_id" 
                                    name="training_center_id" 
                                    class="form-select border-light-subtle rounded-3 @error('training_center_id') is-invalid @enderror" 
                                    required
                                    style="padding: 10px 12px; font-size: 0.95rem;">
                                <option value="" disabled {{ old('training_center_id') ? '' : 'selected' }}>-- Seleccione un Centro --</option>
                                @foreach($training_centers as $center)
                                    <option value="{{ $center['id'] }}" {{ old('training_center_id') == $center['id'] ? 'selected' : '' }}>
                                        {{ $center['name'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('training_center_id')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <hr class="text-black-50 my-4" style="opacity: 0.1;">

                    <!-- Botones de Acción -->
                    <div class="d-flex align-items-center justify-content-end gap-2">
                        <a href="{{ url()->previous() }}" class="btn btn-sena-light fw-medium px-4 py-2 rounded-3" style="font-size: 0.9rem;">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-sena-success fw-semibold px-4 py-2 rounded-3 shadow-sm" style="font-size: 0.9rem;">
                            Guardar Profesor
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection