@extends('Layout.app')

@section('content')
<style>
    .form-select:focus {
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
        
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 d-flex align-items-center gap-2 mb-4" role="alert">
                <span>✅</span>
                <div>{{ session('status') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-lg border-0 rounded-4 p-3 p-md-5 bg-white card-top-line">
            <div class="card-body">
                
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="fs-3">👤🔗</span> 
                        <h1 class="h4 fw-bold text-dark m-0" style="color: #00324D !important;">Asignar Instructor a una Ficha / Curso</h1>
                    </div>
                    <p class="text-muted small">Establezca la vinculación entre un instructor disponible y la ficha académica correspondiente.</p>
                </div>

                <form action="{{ route('course-teacher.store') }}" method="POST">
                    @csrf

                    <div class="row g-4 mb-4">
                        
                        <div class="col-12 col-md-6">
                            <label for="teacher_id" class="form-label fw-semibold text-secondary text-uppercase tracking-wider small" style="font-size: 0.75rem;">
                                Seleccione el Instructor
                            </label>
                            <select id="teacher_id" 
                                    name="teacher_id" 
                                    class="form-select border-light-subtle rounded-3 @error('teacher_id') is-invalid @enderror" 
                                    required
                                    style="padding: 10px 12px; font-size: 0.95rem;">
                                <option value="" disabled {{ old('teacher_id') ? '' : 'selected' }}>-- Seleccione un Instructor --</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name }} ({{ $teacher->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="course_id" class="form-label fw-semibold text-secondary text-uppercase tracking-wider small" style="font-size: 0.75rem;">
                                Seleccione la Ficha / Curso
                            </label>
                            <select id="course_id" 
                                    name="course_id" 
                                    class="form-select border-light-subtle rounded-3 @error('course_id') is-invalid @enderror" 
                                    required
                                    style="padding: 10px 12px; font-size: 0.95rem;">
                                <option value="" disabled {{ old('course_id') ? '' : 'selected' }}>-- Seleccione una Ficha --</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                        Ficha #{{ $course->course_number }} - Jornada {{ $course->day }}
                                    </option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <hr class="text-black-50 my-4" style="opacity: 0.1;">

                    <div class="d-flex align-items-center justify-content-end gap-2">
                        <a href="{{ url()->previous() }}" class="btn btn-sena-light fw-medium px-4 py-2 rounded-3" style="font-size: 0.9rem;">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-sena-success fw-semibold px-4 py-2 rounded-3 shadow-sm" style="font-size: 0.9rem;">
                            Vincular Instructor y Curso
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection