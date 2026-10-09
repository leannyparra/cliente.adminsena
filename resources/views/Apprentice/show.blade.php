@extends('Layout.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/apprentice/ApprenticeShow.css') }}">
@endsection

@section('content')

<div class="apprentice-show-page">
    <div class="apprentice-show-container">

        <div class="apprentice-show-header">
            <a
                href="{{ url()->previous() }}"
                class="apprentice-show-back"
            >
                <i class="bi bi-arrow-left"></i>
                Volver
            </a>

            <div class="apprentice-show-header-title">
                <div class="apprentice-show-header-icon">
                    <i class="bi bi-person-badge-fill"></i>
                </div>

                <div>
                    <h1>Detalle del aprendiz</h1>

                    <p>
                        Información completa del aprendiz registrado
                        en AdminSENA.
                    </p>
                </div>
            </div>
        </div>

        <div class="apprentice-show-card">

            <div class="apprentice-show-banner">
                <div class="apprentice-show-banner-left">
                    <div class="apprentice-show-banner-icon">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <div>
                        <p class="apprentice-show-banner-label">
                            Aprendiz registrado
                        </p>

                        <p class="apprentice-show-banner-name">
                            {{ $apprentice['name'] }}
                        </p>
                    </div>
                </div>

                <div class="apprentice-show-banner-status">
                    <span class="apprentice-show-banner-dot"></span>
                    Registro activo
                </div>
            </div>

            <div class="apprentice-show-content">
                <div class="apprentice-show-grid">

                    <div class="apprentice-show-field">
                        <span class="apprentice-show-field-icon">
                            <i class="bi bi-hash"></i>
                        </span>

                        <div>
                            <label>ID de sistema</label>
                            <p>#{{ $apprentice['id'] }}</p>
                        </div>
                    </div>

                    <div class="apprentice-show-field">
                        <span class="apprentice-show-field-icon">
                            <i class="bi bi-patch-check"></i>
                        </span>

                        <div>
                            <label>Estado en plataforma</label>
                            <p class="apprentice-show-status">
                                <span class="apprentice-show-status-dot"></span>
                                Formación Activa
                            </p>
                        </div>
                    </div>

                    <div class="apprentice-show-field">
                        <span class="apprentice-show-field-icon">
                            <i class="bi bi-phone"></i>
                        </span>

                        <div>
                            <label>Número de teléfono</label>
                            <p>{{ $apprentice['cell_number'] }}</p>
                        </div>
                    </div>

                    <div class="apprentice-show-field">
                        <span class="apprentice-show-field-icon">
                            <i class="bi bi-calendar-event"></i>
                        </span>

                        <div>
                            <label>Fecha de registro</label>
                            <p>
                                {{ $apprentice['created_at']
                                    ? \Illuminate\Support\Carbon::parse($apprentice['created_at'])->format('d/m/Y - h:i A')
                                    : 'No registrada' }}
                            </p>
                        </div>
                    </div>

                    <div class="apprentice-show-field apprentice-show-field-primary">
                        <span class="apprentice-show-field-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </span>

                        <div>
                            <label>Código de ficha (curso)</label>
                            <p>{{ $apprentice['course_id'] }}</p>
                        </div>
                    </div>

                    <div class="apprentice-show-field">
                        <span class="apprentice-show-field-icon">
                            <i class="bi bi-laptop"></i>
                        </span>

                        <div>
                            <label>Computador asignado</label>
                            <p>Computador #{{ $apprentice['computer_id'] }}</p>
                        </div>
                    </div>

                    <div class="apprentice-show-field apprentice-show-field-wide">
                        <span class="apprentice-show-field-icon">
                            <i class="bi bi-envelope"></i>
                        </span>

                        <div>
                            <label>Correo electrónico</label>
                            <p>{{ $apprentice['email'] }}</p>
                        </div>
                    </div>

                    <div class="apprentice-show-field apprentice-show-field-wide">
                        <span class="apprentice-show-field-icon">
                            <i class="bi bi-pc-display"></i>
                        </span>

                        <div>
                            <label>Ambiente relacionado</label>
                            <p>
                                Ambiente de Desarrollo de Software
                                (ADSO)
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="apprentice-show-footer">
                <a
                    href="{{ route('apprentice.index') }}"
                    class="apprentice-show-btn-back"
                >
                    <i class="bi bi-arrow-left"></i>
                    Volver a aprendices
                </a>
            </div>

        </div>

    </div>
</div>

@endsection
