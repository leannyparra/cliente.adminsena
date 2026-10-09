@extends('Layout.app')

@section('content')

<style>
    /* =====================================================
       FONDO GENERAL
    ===================================================== */

    body {
        background: #f5f7f9 !important;
    }

    .edit-course-page {
        padding: 35px 0 55px;
    }

    /* =====================================================
       ENCABEZADO
    ===================================================== */

    .edit-header {
        max-width: 820px;
        margin: 0 auto 22px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #7c8791;
        text-decoration: none;
        font-size: .82rem;
        font-weight: 600;
        margin-bottom: 17px;
        transition: all .2s ease;
    }

    .back-link:hover {
        color: #39A900;
        transform: translateX(-2px);
    }

    .header-content {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .header-icon {
        width: 52px;
        height: 52px;
        border-radius: 15px;
        background: #eaf7e4;
        color: #39A900;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        box-shadow: 0 5px 15px rgba(57,169,0,.08);
    }

    .page-title {
        margin: 0;
        font-size: 1.7rem;
        font-weight: 750;
        letter-spacing: -.6px;
        color: #17212b;
    }

    .page-subtitle {
        margin: 4px 0 0;
        font-size: .88rem;
        color: #8a949e;
    }

    /* =====================================================
       TARJETA PRINCIPAL
    ===================================================== */

    .edit-card {
        max-width: 820px;
        margin: 0 auto;
        background: #ffffff;
        border: 1px solid #e7ebee;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 35px rgba(25,35,45,.07);
    }

    /* =====================================================
       BANNER DE INFORMACIÓN
    ===================================================== */

    .course-banner {
        padding: 20px 26px;
        background: linear-gradient(
            135deg,
            #f4faef 0%,
            #ffffff 100%
        );
        border-bottom: 1px solid #edf1ed;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .banner-left {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .banner-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: #39A900;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 5px 12px rgba(57,169,0,.18);
    }

    .banner-label {
        margin: 0;
        font-size: .68rem;
        text-transform: uppercase;
        letter-spacing: .7px;
        font-weight: 700;
        color: #87918a;
    }

    .banner-number {
        margin: 2px 0 0;
        font-size: 1.05rem;
        font-weight: 750;
        color: #26332b;
    }

    .banner-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 11px;
        background: #e8f7df;
        color: #347c0b;
        border-radius: 20px;
        font-size: .72rem;
        font-weight: 700;
    }

    .status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #39A900;
    }

    /* =====================================================
       FORMULARIO
    ===================================================== */

    .form-content {
        padding: 28px;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 9px;
        margin-bottom: 20px;
    }

    .section-title-icon {
        width: 30px;
        height: 30px;
        border-radius: 8px;
        background: #f0f6ed;
        color: #39A900;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }

    .section-title h5 {
        margin: 0;
        font-size: .92rem;
        font-weight: 700;
        color: #27333d;
    }

    .section-title p {
        margin: 1px 0 0;
        font-size: .72rem;
        color: #9aa3ab;
    }

    /* =====================================================
       CAMPOS
    ===================================================== */

    .field-group {
        margin-bottom: 21px;
    }

    .field-label {
        display: block;
        margin-bottom: 8px;
        color: #56616b;
        font-size: .73rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .45px;
    }

    .input-wrapper {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #9aa4ad;
        font-size: 15px;
        z-index: 2;
        pointer-events: none;
    }

    .modern-input,
    .modern-select {
        width: 100%;
        height: 46px;
        border: 1px solid #e0e5e8;
        border-radius: 11px;
        background: #fafbfc;
        color: #29343e;
        font-size: .86rem;
        padding: 0 14px;
        outline: none;
        transition: all .2s ease;
    }

    .modern-input.with-icon,
    .modern-select.with-icon {
        padding-left: 40px;
    }

    .modern-input::placeholder {
        color: #a8afb6;
    }

    .modern-input:hover,
    .modern-select:hover {
        border-color: #cbd3d8;
        background: #fff;
    }

    .modern-input:focus,
    .modern-select:focus {
        background: #fff;
        border-color: #39A900;
        box-shadow: 0 0 0 4px rgba(57,169,0,.10);
    }

    /* =====================================================
       DIVISOR
    ===================================================== */

    .form-divider {
        height: 1px;
        background: #edf0f2;
        margin: 8px 0 25px;
    }

    /* =====================================================
       BOTONES
    ===================================================== */

    .form-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .footer-info {
        display: flex;
        align-items: center;
        gap: 7px;
        color: #98a1a9;
        font-size: .73rem;
    }

    .footer-info i {
        color: #39A900;
    }

    .button-group {
        display: flex;
        gap: 9px;
    }

    .btn-cancel {
        height: 42px;
        padding: 0 18px;
        border-radius: 10px;
        background: #fff;
        border: 1px solid #dfe4e7;
        color: #68737d;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: .82rem;
        font-weight: 650;
        transition: all .2s ease;
    }

    .btn-cancel:hover {
        background: #f7f8f9;
        border-color: #cfd5d9;
        color: #303b44;
    }

    .btn-save {
        height: 42px;
        padding: 0 20px;
        border: none;
        border-radius: 10px;
        background: #39A900;
        color: white;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        font-size: .82rem;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 5px 13px rgba(57,169,0,.18);
        transition: all .2s ease;
    }

    .btn-save:hover {
        background: #2f8700;
        transform: translateY(-1px);
        box-shadow: 0 7px 18px rgba(57,169,0,.25);
    }

    /* =====================================================
       ERRORES
    ===================================================== */

    .error-message {
        margin-top: 6px;
        font-size: .73rem;
        color: #dc3545;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .input-error {
        border-color: #dc3545 !important;
    }

    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 768px) {

        .edit-course-page {
            padding: 22px 0 35px;
        }

        .edit-header {
            padding: 0 10px;
        }

        .edit-card {
            border-radius: 16px;
        }

        .course-banner {
            padding: 17px 20px;
        }

        .form-content {
            padding: 22px 20px;
        }

        .form-footer {
            align-items: flex-start;
            flex-direction: column;
        }

        .button-group {
            width: 100%;
        }

        .btn-cancel,
        .btn-save {
            flex: 1;
        }
    }

    @media (max-width: 500px) {

        .page-title {
            font-size: 1.4rem;
        }

        .header-icon {
            width: 45px;
            height: 45px;
            font-size: 20px;
        }

        .banner-status {
            display: none;
        }

        .course-banner {
            padding: 16px;
        }

        .form-content {
            padding: 20px 16px;
        }
    }
</style>

<div class="container edit-course-page">


<!-- =================================================
     ENCABEZADO
================================================== -->

<div class="edit-header">

    <a href="{{ url('course.index') }}" class="back-link">
        <i class="bi bi-arrow-left"></i>
        Volver a programas
    </a>

    <div class="header-content">

        <div class="header-icon">
            <i class="bi bi-pencil-square"></i>
        </div>

        <div>
            <h1 class="page-title">
                Editar Programa
            </h1>

            <p class="page-subtitle">
                Actualiza la información de la ficha seleccionada.
            </p>
        </div>

    </div>

</div>


<!-- =================================================
     TARJETA
================================================== -->

<div class="edit-card">

    <!-- Información de la ficha -->

    <div class="course-banner">

        <div class="banner-left">

            <div class="banner-icon">
                <i class="bi bi-journal-bookmark-fill"></i>
            </div>

            <div>

                <p class="banner-label">
                    Ficha seleccionada
                </p>

                <p class="banner-number">
                    {{ 	$course['course_number']}}
                </p>

            </div>

        </div>

        <div class="banner-status">
            <span class="status-dot"></span>
            Registro activo
        </div>

    </div>


    <!-- =================================================
         FORMULARIO
    ================================================== -->

    <div class="form-content">

        <form action="{{ route('course.update', $course['id']) }}" method="POST">

            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $course['id'] }}">


            <!-- SECCIÓN INFORMACIÓN -->

            <div class="section-title">

                <div class="section-title-icon">
                    <i class="bi bi-info-circle"></i>
                </div>

                <div>

                    <h5>
                        Información del programa
                    </h5>

                    <p>
                        Datos principales de la ficha de formación.
                    </p>

                </div>

            </div>


            <div class="row g-3">

                <!-- Número de ficha -->

                <div class="col-md-6">

                    <div class="field-group">

                        <label class="field-label">
                            Número de ficha
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-hash input-icon"></i>

                            <input
                                type="text"
                                name="course_number"
                                value="{{old('course_number', $course['course_number'])}}" 
                                class="modern-input with-icon @error('course_number') input-error @enderror"
                                placeholder="Ej. 2894567"
                                required
                            >

                        </div>

                        @error('course_number')
                            <div class="error-message">
                                <i class="bi bi-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>


                <!-- Jornada -->

                <div class="col-md-6">

                    <div class="field-group">

                        <label class="field-label">
                            Jornada
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-clock input-icon"></i>

                            <input
                                type="text"
                                name="day"
                                value="{{ old('day', $course['day']) }}"
                                class="modern-input with-icon @error('day') input-error @enderror"
                                placeholder="Ej. Diurna"
                                required
                            >

                        </div>

                        @error('day')
                            <div class="error-message">
                                <i class="bi bi-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>


                <!-- Área -->

                <div class="col-md-6">

                    <div class="field-group">

                        <label class="field-label">
                            Área de formación
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-diagram-3 input-icon"></i>

                            <select
                                name="area_id"
                                class="modern-select with-icon @error('area_id') input-error @enderror"
                            >

                                <option value="">
                                    Seleccione un área...
                                </option>

                                @foreach($areas as $area)

                                    <option
                                        value="{{ $area['id'] }}"
                                        {{ old('area_id', $course['area_id']) == $area['id'] ? 'selected' : '' }}
                                    >
                                        {{ $area['name'] }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        @error('area_id')
                            <div class="error-message">
                                <i class="bi bi-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>


                <!-- Centro -->

                <div class="col-md-6">

                    <div class="field-group">

                        <label class="field-label">
                            Centro de formación
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-building input-icon"></i>

                            <select
                                name="training_center_id"
                                class="modern-select with-icon @error('training_center_id') input-error @enderror"
                            >

                                <option value="">
                                    Seleccione un centro...
                                </option>

                                @foreach($training_centers as $center)

                                    <option
                                        value="{{ $center['id'] }}"
                                        {{ old('training_center_id', $course['training_center_id']) == $center['id'] ? 'selected' : '' }}
                                    >
                                        {{ $center['name'] }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        @error('training_center_id')
                            <div class="error-message">
                                <i class="bi bi-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

            </div>


            <!-- DIVISOR -->

            <div class="form-divider"></div>


            <!-- FOOTER -->

            <div class="form-footer">

                <div class="footer-info">

                    <i class="bi bi-shield-check"></i>

                    Los cambios se guardarán en el sistema.

                </div>


                <div class="button-group">

                    <a
                        href="{{ route('course.index')}}"
                        class="btn-cancel"
                    >
                        Cancelar
                    </a>


                    <button
                        type="submit"
                        class="btn-save"
                    >

                        <i class="bi bi-check-lg"></i>

                        Guardar cambios

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


</div>

@endsection
