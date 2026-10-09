@extends('Layout.app')

@section('content')

<div class="edit-center-page">

```
<div class="container py-5">

    <!-- =====================================================
         ENCABEZADO
    ====================================================== -->

    <div class="edit-heading mb-4">

        <div class="heading-icon">
            <i class="bi bi-pencil-square"></i>
        </div>

        <div>

            <span class="heading-label">
                ADMINISTRACIÓN / CENTROS
            </span>

            <h1>
                Editar Centro de Formación
            </h1>

            <p>
                Actualiza la información institucional del centro seleccionado.
            </p>

        </div>

    </div>


    <!-- =====================================================
         CONTENIDO PRINCIPAL
    ====================================================== -->

    <div class="row g-4">


        <!-- =================================================
             FORMULARIO
        ================================================== -->

        <div class="col-lg-8">

            <div class="edit-card">

                <!-- CABECERA -->

                <div class="edit-card-header">

                    <div class="current-center">

                        <div class="current-icon">
                            <i class="bi bi-building"></i>
                        </div>

                        <div>

                            <span>
                                CENTRO SELECCIONADO
                            </span>

                            <h2>
                                {{ $trainingCenter['name'] }}
                            </h2>

                        </div>

                    </div>

                    <div class="edit-badge">
                        <i class="bi bi-pencil"></i>
                        Editando
                    </div>

                </div>


                <!-- FORMULARIO -->

                <form
                    action="{{ route('trainingCenter.update', $trainingCenter['id']) }}"
                    method="POST"
                >

                    @csrf
                    @method('PUT')


                    <div class="edit-body">


                        <!-- =================================================
                             NOMBRE
                        ================================================== -->

                        <div class="form-section">

                            <div class="section-title">

                                <div class="section-number">
                                    01
                                </div>

                                <div>

                                    <h3>
                                        Información principal
                                    </h3>

                                    <p>
                                        Modifica el nombre oficial del centro.
                                    </p>

                                </div>

                            </div>


                            <div class="form-group">

                                <label for="name">
                                    Nombre del Centro
                                </label>

                                <div class="input-wrapper">

                                    <i class="bi bi-building input-icon"></i>

                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        value="{{ old('name', $trainingCenter['name']) }}"
                                        class="@error('name') is-invalid @enderror"
                                        placeholder="Ej. Centro de Comercio y Servicios"
                                        required
                                    >

                                </div>

                                @error('name')

                                    <div class="error-message">
                                        <i class="bi bi-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>


                        <!-- =================================================
                             UBICACIÓN
                        ================================================== -->

                        <div class="form-section location-section">

                            <div class="section-title">

                                <div class="section-number">
                                    02
                                </div>

                                <div>

                                    <h3>
                                        Ubicación
                                    </h3>

                                    <p>
                                        Actualiza la ciudad o dirección del centro.
                                    </p>

                                </div>

                            </div>


                            <div class="form-group">

                                <label for="location">
                                    Ubicación / Ciudad
                                </label>

                                <div class="input-wrapper">

                                    <i class="bi bi-geo-alt input-icon"></i>

                                    <input
                                        type="text"
                                        id="location"
                                        name="location"
                                        value="{{ old('location', $trainingCenter['location']) }}"
                                        class="@error('location') is-invalid @enderror"
                                        placeholder="Ej. Popayán, Cauca"
                                        required
                                    >

                                </div>

                                @error('location')

                                    <div class="error-message">
                                        <i class="bi bi-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>


                        <!-- =================================================
                             AVISO
                        ================================================== -->

                        <div class="update-notice">

                            <div class="notice-icon">
                                <i class="bi bi-info-lg"></i>
                            </div>

                            <div>

                                <strong>
                                    Antes de guardar
                                </strong>

                                <p>
                                    Comprueba que los datos sean correctos.
                                    Los cambios se actualizarán inmediatamente
                                    en el sistema.
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- =================================================
                         FOOTER
                    ================================================== -->

                    <div class="edit-footer">

                        <a
                            href="{{ route('trainingCenter.index') }}"
                            class="btn-cancel"
                        >
                            <i class="bi bi-arrow-left"></i>
                            Cancelar
                        </a>


                        <button
                            type="submit"
                            class="btn-update"
                        >

                            <i class="bi bi-check2"></i>

                            Guardar cambios

                        </button>

                    </div>

                </form>

            </div>

        </div>


        <!-- =================================================
             PANEL LATERAL
        ================================================== -->

        <div class="col-lg-4">

            <div class="side-card">

                <div class="side-pattern"></div>


                <div class="side-content">

                    <div class="side-icon">
                        <i class="bi bi-arrow-repeat"></i>
                    </div>


                    <span class="side-label">
                        ACTUALIZACIÓN
                    </span>


                    <h3>
                        Mantén la información al día.
                    </h3>


                    <p>
                        Una información actualizada permite administrar
                        correctamente los centros, programas y ofertas
                        disponibles en AdminSENA.
                    </p>


                    <div class="side-divider"></div>


                    <div class="side-data">

                        <div class="data-row">

                            <span class="data-icon">
                                <i class="bi bi-hash"></i>
                            </span>

                            <div>
                                <small>ID DEL CENTRO</small>
                                <strong>#{{ $trainingCenter['id'] }}</strong>
                            </div>

                        </div>


                        <div class="data-row">

                            <span class="data-icon">
                                <i class="bi bi-building"></i>
                            </span>

                            <div>
                                <small>CENTRO</small>
                                <strong>{{ $trainingCenter['name'] }}</strong>
                            </div>

                        </div>


                        <div class="data-row">

                            <span class="data-icon">
                                <i class="bi bi-geo-alt"></i>
                            </span>

                            <div>
                                <small>UBICACIÓN</small>
                                <strong>{{ $trainingCenter['location'] }}</strong>
                            </div>

                        </div>

                    </div>


                    <div class="side-footer">

                        <i class="bi bi-shield-check"></i>

                        Información administrada por AdminSENA

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
```

</div>

<!-- =========================================================
     CSS
========================================================= -->

<style>

    /* =====================================================
       GENERAL
    ====================================================== */

    .edit-center-page {

        min-height: calc(100vh - 80px);

        background:
            radial-gradient(
                circle at 90% 0%,
                rgba(57,169,0,.09),
                transparent 32%
            ),
            #f5f7f6;

    }


    /* =====================================================
       HEADING
    ====================================================== */

    .edit-heading {

        display: flex;

        align-items: center;

        gap: 18px;

    }


    .heading-icon {

        width: 58px;
        height: 58px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 18px;

        background: #39A900;

        color: white;

        font-size: 24px;

        box-shadow:
            0 10px 25px rgba(57,169,0,.20);

    }


    .heading-label {

        display: block;

        color: #39A900;

        font-size: 10px;

        font-weight: 800;

        letter-spacing: 1.5px;

        margin-bottom: 3px;

    }


    .edit-heading h1 {

        margin: 0;

        color: #202824;

        font-size: 28px;

        font-weight: 800;

        letter-spacing: -.7px;

    }


    .edit-heading p {

        margin: 5px 0 0;

        color: #7d8781;

        font-size: 13px;

    }


    /* =====================================================
       CARD
    ====================================================== */

    .edit-card {

        overflow: hidden;

        background: white;

        border: 1px solid #e5ebe7;

        border-radius: 20px;

        box-shadow:
            0 15px 40px rgba(28,43,34,.07);

    }


    /* =====================================================
       CARD HEADER
    ====================================================== */

    .edit-card-header {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        padding: 24px 30px;

        border-bottom: 1px solid #edf0ee;

        background:
            linear-gradient(
                135deg,
                #ffffff,
                #f9fcf9
            );

    }


    .current-center {

        display: flex;

        align-items: center;

        gap: 13px;

        min-width: 0;

    }


    .current-icon {

        flex-shrink: 0;

        width: 47px;
        height: 47px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 13px;

        background: #edf8e9;

        color: #39A900;

        font-size: 19px;

    }


    .current-center span {

        display: block;

        margin-bottom: 3px;

        color: #9aa29d;

        font-size: 9px;

        font-weight: 800;

        letter-spacing: 1px;

    }


    .current-center h2 {

        margin: 0;

        max-width: 420px;

        overflow: hidden;

        color: #29332e;

        font-size: 15px;

        font-weight: 750;

        text-overflow: ellipsis;

        white-space: nowrap;

    }


    .edit-badge {

        display: inline-flex;

        align-items: center;

        gap: 6px;

        padding: 7px 10px;

        border-radius: 8px;

        background: #f0f8ed;

        color: #39A900;

        font-size: 10px;

        font-weight: 750;

        white-space: nowrap;

    }


    /* =====================================================
       BODY
    ====================================================== */

    .edit-body {

        padding: 32px 30px;

    }


    /* =====================================================
       FORM SECTIONS
    ====================================================== */

    .form-section {

        padding-bottom: 27px;

        border-bottom: 1px solid #edf0ee;

    }


    .location-section {

        padding-top: 27px;

        border-bottom: none;

    }


    .section-title {

        display: flex;

        align-items: center;

        gap: 11px;

        margin-bottom: 20px;

    }


    .section-number {

        width: 31px;
        height: 31px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 9px;

        background: #f0f7ed;

        color: #39A900;

        font-size: 9px;

        font-weight: 800;

    }


    .section-title h3 {

        margin: 0;

        color: #354039;

        font-size: 14px;

        font-weight: 750;

    }


    .section-title p {

        margin: 2px 0 0;

        color: #9aa29d;

        font-size: 11px;

    }


    /* =====================================================
       FORM
    ====================================================== */

    .form-group label {

        display: block;

        margin-bottom: 8px;

        color: #46504a;

        font-size: 12px;

        font-weight: 700;

    }


    .input-wrapper {

        position: relative;

    }


    .input-icon {

        position: absolute;

        left: 16px;

        top: 50%;

        transform: translateY(-50%);

        color: #9aa39e;

        font-size: 16px;

        pointer-events: none;

        transition: .2s ease;

    }


    .input-wrapper input {

        width: 100%;

        height: 52px;

        padding: 0 17px 0 46px;

        border: 1px solid #dfe5e1;

        border-radius: 12px;

        outline: none;

        background: #fafcfa;

        color: #29332e;

        font-size: 13px;

        transition: .2s ease;

    }


    .input-wrapper input::placeholder {

        color: #adb5b0;

    }


    .input-wrapper input:hover {

        border-color: #cbd4ce;

        background: white;

    }


    .input-wrapper input:focus {

        border-color: #39A900;

        background: white;

        box-shadow:
            0 0 0 4px rgba(57,169,0,.09);

    }


    .input-wrapper:focus-within .input-icon {

        color: #39A900;

    }


    .input-wrapper input.is-invalid {

        border-color: #dc3545;

    }


    /* =====================================================
       ERRORS
    ====================================================== */

    .error-message {

        display: flex;

        align-items: center;

        gap: 5px;

        margin-top: 7px;

        color: #dc3545;

        font-size: 11px;

    }


    /* =====================================================
       NOTICE
    ====================================================== */

    .update-notice {

        display: flex;

        align-items: flex-start;

        gap: 11px;

        margin-top: 25px;

        padding: 14px;

        border: 1px solid #e1eddb;

        border-radius: 12px;

        background: #f5faf2;

    }


    .notice-icon {

        flex-shrink: 0;

        width: 31px;
        height: 31px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 9px;

        background: #e5f2df;

        color: #39A900;

        font-size: 14px;

    }


    .update-notice strong {

        display: block;

        margin-bottom: 2px;

        color: #39453e;

        font-size: 11px;

    }


    .update-notice p {

        margin: 0;

        color: #7c8780;

        font-size: 10px;

        line-height: 1.5;

    }


    /* =====================================================
       FOOTER
    ====================================================== */

    .edit-footer {

        display: flex;

        align-items: center;

        justify-content: flex-end;

        gap: 10px;

        padding: 19px 30px;

        border-top: 1px solid #edf0ee;

        background: #fafbfa;

    }


    /* =====================================================
       CANCELAR
    ====================================================== */

    .btn-cancel {

        height: 44px;

        display: inline-flex;

        align-items: center;
        justify-content: center;

        gap: 7px;

        padding: 0 18px;

        border: 1px solid #dfe5e1;

        border-radius: 10px;

        background: white;

        color: #707a74;

        text-decoration: none;

        font-size: 12px;

        font-weight: 700;

        transition: .2s ease;

    }


    .btn-cancel:hover {

        background: #f2f5f3;

        border-color: #ccd4cf;

        color: #303934;

        transform: translateY(-1px);

    }


    /* =====================================================
       ACTUALIZAR
    ====================================================== */

    .btn-update {

        height: 44px;

        display: inline-flex;

        align-items: center;
        justify-content: center;

        gap: 8px;

        padding: 0 20px;

        border: none;

        border-radius: 10px;

        background: #39A900;

        color: white;

        font-size: 12px;

        font-weight: 750;

        cursor: pointer;

        box-shadow:
            0 7px 18px rgba(57,169,0,.20);

        transition: .2s ease;

    }


    .btn-update:hover {

        background: #2f8e00;

        transform: translateY(-2px);

        box-shadow:
            0 10px 22px rgba(57,169,0,.27);

    }


    /* =====================================================
       PANEL LATERAL
    ====================================================== */

    .side-card {

        position: relative;

        height: 100%;

        min-height: 450px;

        overflow: hidden;

        border-radius: 20px;

        background:
            linear-gradient(
                145deg,
                #39A900,
                #2f8d00
            );

        color: white;

        box-shadow:
            0 18px 40px rgba(57,169,0,.18);

    }


    .side-content {

        position: relative;

        z-index: 2;

        padding: 30px;

    }


    .side-pattern {

        position: absolute;

        width: 270px;
        height: 270px;

        right: -130px;
        top: -100px;

        border-radius: 50%;

        background: rgba(255,255,255,.07);

    }


    .side-pattern::after {

        content: "";

        position: absolute;

        width: 180px;
        height: 180px;

        left: -80px;
        top: 150px;

        border-radius: 50%;

        background: rgba(255,255,255,.05);

    }


    .side-icon {

        width: 48px;
        height: 48px;

        display: flex;

        align-items: center;
        justify-content: center;

        margin-bottom: 18px;

        border-radius: 14px;

        background: rgba(255,255,255,.15);

        border: 1px solid rgba(255,255,255,.15);

        font-size: 20px;

    }


    .side-label {

        display: block;

        margin-bottom: 8px;

        font-size: 9px;

        font-weight: 800;

        letter-spacing: 1.5px;

        color: rgba(255,255,255,.75);

    }


    .side-card h3 {

        margin: 0 0 13px;

        font-size: 23px;

        line-height: 1.25;

        font-weight: 800;

        letter-spacing: -.4px;

    }


    .side-card > .side-content > p {

        margin: 0;

        color: rgba(255,255,255,.82);

        font-size: 12px;

        line-height: 1.7;

    }


    /* =====================================================
       DIVISOR
    ====================================================== */

    .side-divider {

        width: 100%;

        height: 1px;

        margin: 25px 0;

        background: rgba(255,255,255,.18);

    }


    /* =====================================================
       DATA
    ====================================================== */

    .side-data {

        display: flex;

        flex-direction: column;

        gap: 17px;

    }


    .data-row {

        display: flex;

        align-items: center;

        gap: 11px;

    }


    .data-icon {

        flex-shrink: 0;

        width: 33px;
        height: 33px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: rgba(255,255,255,.13);

        font-size: 13px;

    }


    .data-row small {

        display: block;

        margin-bottom: 2px;

        color: rgba(255,255,255,.60);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .8px;

    }


    .data-row strong {

        display: block;

        max-width: 230px;

        overflow: hidden;

        color: white;

        font-size: 11px;

        font-weight: 650;

        text-overflow: ellipsis;

        white-space: nowrap;

    }


    /* =====================================================
       SIDE FOOTER
    ====================================================== */

    .side-footer {

        display: flex;

        align-items: center;

        gap: 7px;

        margin-top: 30px;

        padding-top: 18px;

        border-top: 1px solid rgba(255,255,255,.16);

        color: rgba(255,255,255,.70);

        font-size: 9px;

    }


    .side-footer i {

        font-size: 13px;

    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 991px) {

        .side-card {

            min-height: auto;

        }

    }


    @media (max-width: 600px) {

        .edit-center-page .container {

            padding-left: 15px;

            padding-right: 15px;

        }


        .edit-heading {

            align-items: flex-start;

        }


        .heading-icon {

            width: 48px;
            height: 48px;

            border-radius: 14px;

            font-size: 20px;

        }


        .edit-heading h1 {

            font-size: 22px;

        }


        .edit-heading p {

            font-size: 11px;

        }


        .edit-card-header {

            align-items: flex-start;

            flex-direction: column;

            padding: 20px;

        }


        .current-center h2 {

            max-width: 250px;

        }


        .edit-body {

            padding: 25px 20px;

        }


        .edit-footer {

            flex-direction: column-reverse;

            align-items: stretch;

            padding: 18px 20px;

        }


        .btn-cancel,
        .btn-update {

            width: 100%;

        }


        .side-content {

            padding: 25px;

        }

    }

</style>

@endsection
