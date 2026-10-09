@extends('Layout.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/apprentice/ApprenticeEdit.css') }}">
@endsection

@section('content')

@php
    $initials = strtoupper(
        collect(explode(' ', trim($apprentice['name'] ?? '')))
            ->filter()
            ->take(2)
            ->map(fn ($part) => mb_substr($part, 0, 1))
            ->implode('')
    );
@endphp

<div class="apprentice-edit-page">

    <!-- =========================================
         ENCABEZADO
    ========================================== -->

    <div class="apprentice-edit-header">

        <div class="apprentice-edit-header-left">

            <a
                href="{{ url()->previous() }}"
                class="apprentice-edit-back-button"
                title="Volver"
            >
                <i class="bi bi-arrow-left"></i>
            </a>

            <div class="apprentice-edit-header-icon">
                <i class="bi bi-pencil-square"></i>
            </div>

            <div>
                <h1>Actualizar aprendiz</h1>

                <p>
                    Modifica la información del aprendiz seleccionado.
                </p>
            </div>

        </div>

    </div>


    <!-- =========================================
         TARJETA PRINCIPAL
    ========================================== -->

    <div class="apprentice-edit-card">

        <!-- =========================================
             ENCABEZADO DE TARJETA
        ========================================== -->

        <div class="apprentice-edit-card-top">

            <div class="apprentice-edit-student-preview">

                <div class="apprentice-edit-student-avatar">
                    {{ $initials }}
                </div>

                <div>

                    <span class="apprentice-edit-student-label">
                        APRENDIZ
                    </span>

                    <h2>{{ $apprentice['name'] }}</h2>

                    <span class="apprentice-edit-student-id">
                        ID #{{ $apprentice['id'] }}
                    </span>

                </div>

            </div>


            <div class="apprentice-edit-status">
                <i class="bi bi-pencil"></i>
                Editando información
            </div>

        </div>


        <!-- =========================================
             CUERPO DEL FORMULARIO
        ========================================== -->

        <div class="apprentice-edit-card-body">

            <form
                action="{{ route('apprentice.update', $apprentice['id']) }}"
                method="POST"
            >
                @csrf
                @method('put')

                <!-- =====================================
                     DATOS PERSONALES
                ====================================== -->

                <div class="apprentice-edit-section-title">

                    <div class="apprentice-edit-section-icon">
                        <i class="bi bi-person"></i>
                    </div>

                    <div>
                        <h3>Datos personales</h3>

                        <p>Información de contacto del aprendiz</p>
                    </div>

                </div>


                <div class="apprentice-edit-form-grid">

                    <!-- ID -->

                    <div class="apprentice-edit-input-group">

                        <label>
                            ID del aprendiz
                        </label>

                        <div class="apprentice-edit-input-wrapper apprentice-edit-readonly">

                            <i class="bi bi-hash"></i>

                            <input
                                type="text"
                                value="#{{ $apprentice['id'] }}"
                                disabled
                                readonly
                            >

                            <span class="apprentice-edit-lock-icon">
                                <i class="bi bi-lock-fill"></i>
                            </span>

                        </div>

                    </div>


                    <!-- NOMBRE -->

                    <div class="apprentice-edit-input-group">

                        <label for="name">
                            Nombre completo
                            <span>*</span>
                        </label>

                        <div class="apprentice-edit-input-wrapper">

                            <i class="bi bi-person"></i>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', $apprentice['name']) }}"
                                placeholder="Nombre completo"
                                required
                            >

                        </div>

                    </div>


                    <!-- CORREO -->

                    <div class="apprentice-edit-input-group">

                        <label for="email">
                            Correo electrónico
                            <span>*</span>
                        </label>

                        <div class="apprentice-edit-input-wrapper">

                            <i class="bi bi-envelope"></i>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email', $apprentice['email']) }}"
                                placeholder="correo@ejemplo.com"
                                required
                            >

                        </div>

                    </div>


                    <!-- TELÉFONO -->

                    <div class="apprentice-edit-input-group">

                        <label for="cell_number">
                            Número de celular
                            <span>*</span>
                        </label>

                        <div class="apprentice-edit-input-wrapper">

                            <i class="bi bi-phone"></i>

                            <input
                                type="text"
                                id="cell_number"
                                name="cell_number"
                                value="{{ old('cell_number', $apprentice['cell_number']) }}"
                                placeholder="300 123 4567"
                                required
                            >

                        </div>

                    </div>

                </div>


                <!-- =====================================
                     FORMACIÓN Y EQUIPO
                ====================================== -->

                <div class="apprentice-edit-section-title apprentice-edit-second-section">

                    <div class="apprentice-edit-section-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <div>
                        <h3>Formación y equipo</h3>

                        <p>Actualiza la ficha y el computador asignado</p>
                    </div>

                </div>


                <div class="apprentice-edit-form-grid">

                    <!-- CURSO -->

                    <div class="apprentice-edit-input-group">

                        <label for="course_id">
                            Curso / Ficha
                            <span>*</span>
                        </label>

                        <div class="apprentice-edit-input-wrapper apprentice-edit-select-wrapper">

                            <i class="bi bi-book"></i>

                            <select
                                id="course_id"
                                name="course_id"
                                required
                            >
                                <option value="">
                                    Selecciona un curso
                                </option>

                                @foreach($courses as $course)
                                    <option
                                        value="{{ $course['id'] }}"
                                        {{ old('course_id', $apprentice['course_id']) == $course['id'] ? 'selected' : '' }}
                                    >
                                        Ficha {{ $course['course_number'] }}
                                    </option>
                                @endforeach

                            </select>

                            <i class="bi bi-chevron-down apprentice-edit-select-arrow"></i>

                        </div>

                    </div>


                    <!-- COMPUTADOR -->

                    <div class="apprentice-edit-input-group">

                        <label for="computer_id">
                            Computador asignado
                        </label>

                        <div class="apprentice-edit-input-wrapper apprentice-edit-select-wrapper">

                            <i class="bi bi-laptop"></i>

                            <select
                                id="computer_id"
                                name="computer_id"
                            >
                                <option value="">
                                    Sin computador
                                </option>

                                @foreach($computers as $computer)
                                    <option
                                        value="{{ $computer['id'] }}"
                                        {{ old('computer_id', $apprentice['computer_id']) == $computer['id'] ? 'selected' : '' }}
                                    >
                                        Computador #{{ $computer['number'] }} - {{ $computer['brand'] }}
                                    </option>
                                @endforeach

                            </select>

                            <i class="bi bi-chevron-down apprentice-edit-select-arrow"></i>

                        </div>

                    </div>

                </div>


                <!-- =====================================
                     AVISO
                ====================================== -->

                <div class="apprentice-edit-warning-box">

                    <div class="apprentice-edit-warning-icon">
                        <i class="bi bi-info-circle-fill"></i>
                    </div>

                    <div>

                        <strong>
                            Estás editando un registro existente
                        </strong>

                        <p>
                            Los cambios realizados reemplazarán la
                            información actual del aprendiz. Verifica
                            los datos antes de guardar.
                        </p>

                    </div>

                </div>


                <!-- =====================================
                     BOTONES
                ====================================== -->

                <div class="apprentice-edit-form-footer">

                    <a
                        href="{{ url()->previous() }}"
                        class="apprentice-edit-cancel-button"
                    >
                        <i class="bi bi-arrow-left"></i>
                        Volver
                    </a>


                    <button
                        type="submit"
                        class="apprentice-edit-save-button"
                    >
                        <i class="bi bi-check-lg"></i>
                        Guardar cambios
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
