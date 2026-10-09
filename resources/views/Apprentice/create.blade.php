@extends('Layout.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/apprentice/ApprenticeCreate.css') }}">
@endsection

@section('content')

<div class="apprentice-create-page">
    <div class="apprentice-create-container">

        <div class="apprentice-create-header">
            <a
                href="{{ route('apprentice.index') }}"
                class="apprentice-create-back"
            >
                <i class="bi bi-arrow-left"></i>
                Volver
            </a>

            <div class="apprentice-create-title-wrapper">
                <div class="apprentice-create-page-icon">
                    <i class="bi bi-person-plus-fill"></i>
                </div>

                <div>
                    <h1>Registrar aprendiz</h1>

                    <p>
                        Agrega un nuevo aprendiz al sistema AdminSENA.
                    </p>
                </div>
            </div>
        </div>

        <div class="apprentice-create-card">

            <div class="apprentice-create-banner">
                <div class="apprentice-create-banner-left">
                    <div class="apprentice-create-banner-icon">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>

                    <div>
                        <p class="apprentice-create-banner-label">
                            Formulario
                        </p>

                        <p class="apprentice-create-banner-title">
                            Nuevo registro de aprendiz
                        </p>
                    </div>
                </div>

                <span class="apprentice-create-banner-status">
                    <span class="apprentice-create-status-dot"></span>
                    Nuevo registro
                </span>
            </div>

            <form
                class="apprentice-create-form"
                action="{{ route('apprentice.store') }}"
                method="POST"
            >
                @csrf

                <div class="apprentice-create-section">
                    <div class="apprentice-create-section-title">
                        <span class="apprentice-create-section-icon">
                            <i class="bi bi-person-lines-fill"></i>
                        </span>

                        <div>
                            <h5>Datos personales</h5>

                            <p>
                                Información básica de identificación y
                                contacto del aprendiz.
                            </p>
                        </div>
                    </div>

                    <div class="apprentice-create-grid">

                        <div class="apprentice-create-field apprentice-create-field-full">
                            <label for="name" class="apprentice-create-label">
                                Nombre completo
                                <span>*</span>
                            </label>

                            <div class="apprentice-create-input-wrap">
                                <i class="bi bi-person"></i>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="apprentice-create-input"
                                    placeholder="Ej. Juan Carlos Pérez"
                                    value="{{ old('name') }}"
                                    required
                                >
                            </div>
                        </div>

                        <div class="apprentice-create-field">
                            <label for="email" class="apprentice-create-label">
                                Correo electrónico
                                <span>*</span>
                            </label>

                            <div class="apprentice-create-input-wrap">
                                <i class="bi bi-envelope"></i>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="apprentice-create-input"
                                    placeholder="Ej. juan@correo.com"
                                    value="{{ old('email') }}"
                                    required
                                >
                            </div>
                        </div>

                        <div class="apprentice-create-field">
                            <label for="cell_number" class="apprentice-create-label">
                                Número de celular
                                <span>*</span>
                            </label>

                            <div class="apprentice-create-input-wrap">
                                <i class="bi bi-phone"></i>

                                <input
                                    type="text"
                                    id="cell_number"
                                    name="cell_number"
                                    class="apprentice-create-input"
                                    placeholder="Ej. 300 123 4567"
                                    value="{{ old('cell_number') }}"
                                    required
                                >
                            </div>
                        </div>

                    </div>
                </div>

                <div class="apprentice-create-section">
                    <div class="apprentice-create-section-title">
                        <span class="apprentice-create-section-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </span>

                        <div>
                            <h5>Formación y equipo</h5>

                            <p>
                                Asigna la ficha y el computador
                                correspondientes al aprendiz.
                            </p>
                        </div>
                    </div>

                    <div class="apprentice-create-grid">

                        <div class="apprentice-create-field">
                            <label for="course_id" class="apprentice-create-label">
                                Curso / Ficha
                                <span>*</span>
                            </label>

                            <div class="apprentice-create-input-wrap">
                                <i class="bi bi-book"></i>

                                <select
                                    id="course_id"
                                    name="course_id"
                                    class="apprentice-create-input apprentice-create-select"
                                    required
                                >
                                    <option value="">
                                        Seleccione una ficha
                                    </option>

                                    @foreach($courses as $course)
                                        <option
                                            value="{{ $course['id'] }}"
                                            {{ old('course_id') == $course['id'] ? 'selected' : '' }}
                                        >
                                            Ficha {{ $course['course_number'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="apprentice-create-field">
                            <label for="computer_id" class="apprentice-create-label">
                                Computador asignado
                                <span>*</span>
                            </label>

                            <div class="apprentice-create-input-wrap">
                                <i class="bi bi-laptop"></i>

                                <select
                                    id="computer_id"
                                    name="computer_id"
                                    class="apprentice-create-input apprentice-create-select"
                                    required
                                >
                                    <option value="">
                                        Seleccione un computador
                                    </option>

                                    @foreach($computers as $computer)
                                        <option
                                            value="{{ $computer['id'] }}"
                                            {{ old('computer_id') == $computer['id'] ? 'selected' : '' }}
                                        >
                                            Equipo #{{ $computer['number'] }} - {{ $computer['brand'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="apprentice-create-footer">
                    <div class="apprentice-create-security">
                        <i class="bi bi-shield-check"></i>

                        <span>
                            Datos protegidos y guardados de forma segura.
                        </span>
                    </div>

                    <div class="apprentice-create-actions">
                        <a
                            href="{{ route('apprentice.index') }}"
                            class="apprentice-create-button apprentice-create-button-light"
                        >
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            class="apprentice-create-button apprentice-create-button-success"
                        >
                            <i class="bi bi-check-lg"></i>
                            Registrar aprendiz
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>

@endsection
