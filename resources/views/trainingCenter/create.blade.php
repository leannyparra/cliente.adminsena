@extends('Layout.app')

@section('content')

<div class="training-page">

```
<div class="container py-5">

    <!-- =====================================================
         ENCABEZADO
    ====================================================== -->

    <div class="page-heading mb-4">

        <div class="heading-icon">
            <i class="bi bi-building"></i>
        </div>

        <div>
            <span class="heading-label">
                ADMINISTRACIÓN
            </span>

            <h1>
                Registrar Centro de Formación
            </h1>

            <p>
                Agrega una nueva sede o centro de formación al sistema AdminSENA.
            </p>
        </div>

    </div>


    <!-- =====================================================
         CONTENIDO
    ====================================================== -->

    <div class="row g-4 align-items-stretch">

        <!-- FORMULARIO -->

        <div class="col-lg-8">

            <div class="register-card">

                <!-- CABECERA -->

                <div class="register-header">

                    <div class="header-icon">
                        <i class="bi bi-building-add"></i>
                    </div>

                    <div>
                        <h2>Información del centro</h2>

                        <p>
                            Completa los siguientes datos para registrar el centro.
                        </p>
                    </div>

                </div>


                <!-- FORMULARIO -->

                <form action="{{ route('trainingCenter.store') }}" method="POST">

                    @csrf

                    <div class="register-body">

                        <!-- NOMBRE -->

                        <div class="form-group mb-4">

                            <label for="name">
                                <i class="bi bi-building"></i>
                                Nombre del Centro de Formación
                            </label>

                            <div class="input-wrapper">

                                <i class="bi bi-building input-icon"></i>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    value="{{ old('name') }}"
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


                        <!-- UBICACIÓN -->

                        <div class="form-group mb-3">

                            <label for="location">
                                <i class="bi bi-geo-alt"></i>
                                Ubicación / Dirección Regional
                            </label>

                            <div class="input-wrapper">

                                <i class="bi bi-geo-alt input-icon"></i>

                                <input
                                    type="text"
                                    name="location"
                                    id="location"
                                    value="{{ old('location') }}"
                                    class="@error('location') is-invalid @enderror"
                                    placeholder="Ej. Calle 4 # 2-30, Popayán"
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


                        <!-- AYUDA -->

                        <div class="form-tip">

                            <div class="tip-icon">
                                <i class="bi bi-lightbulb"></i>
                            </div>

                            <div>
                                <strong>Consejo</strong>

                                <p>
                                    Verifica que el nombre y la ubicación estén escritos
                                    correctamente antes de registrar el centro.
                                </p>
                            </div>

                        </div>

                    </div>


                    <!-- BOTONES -->

                    <div class="register-footer">

                        <a
                            href="{{ route('trainingCenter.index') }}"
                            class="btn-cancel"
                        >
                            <i class="bi bi-arrow-left"></i>
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            class="btn-save"
                        >
                            Registrar centro
                            <i class="bi bi-check2"></i>
                        </button>

                    </div>

                </form>

            </div>

        </div>


        <!-- PANEL LATERAL -->

        <div class="col-lg-4">

            <div class="info-card">

                <div class="info-top">

                    <div class="info-main-icon">
                        <i class="bi bi-mortarboard"></i>
                    </div>

                    <span>AdminSENA</span>

                </div>


                <h3>
                    Nuevos centros,<br>
                    nuevas oportunidades.
                </h3>

                <p>
                    Mantén actualizada la información de los centros de formación
                    para facilitar la administración de programas y ofertas.
                </p>


                <div class="info-divider"></div>


                <div class="info-item">

                    <div class="small-icon">
                        <i class="bi bi-check-lg"></i>
                    </div>

                    <span>
                        Información organizada
                    </span>

                </div>


                <div class="info-item">

                    <div class="small-icon">
                        <i class="bi bi-check-lg"></i>
                    </div>

                    <span>
                        Gestión sencilla
                    </span>

                </div>


                <div class="info-item">

                    <div class="small-icon">
                        <i class="bi bi-check-lg"></i>
                    </div>

                    <span>
                        Administración eficiente
                    </span>

                </div>


                <div class="info-decoration decoration-one"></div>
                <div class="info-decoration decoration-two"></div>

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

    .training-page {
        min-height: calc(100vh - 80px);
        background:
            radial-gradient(
                circle at top right,
                rgba(57, 169, 0, 0.08),
                transparent 35%
            ),
            #f5f7f6;
    }


    /* =====================================================
       ENCABEZADO
    ====================================================== */

    .page-heading {
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

        font-size: 25px;

        box-shadow:
            0 10px 25px rgba(57, 169, 0, 0.20);
    }

    .heading-label {
        display: block;

        font-size: 11px;
        font-weight: 700;

        letter-spacing: 1.5px;

        color: #39A900;

        margin-bottom: 3px;
    }

    .page-heading h1 {
        margin: 0;

        font-size: 28px;

        font-weight: 800;

        color: #202824;

        letter-spacing: -0.6px;
    }

    .page-heading p {
        margin: 5px 0 0;

        color: #77817c;

        font-size: 14px;
    }


    /* =====================================================
       TARJETA PRINCIPAL
    ====================================================== */

    .register-card {
        background: #ffffff;

        border-radius: 20px;

        border: 1px solid #e8ece9;

        overflow: hidden;

        box-shadow:
            0 15px 40px rgba(29, 45, 35, 0.07);

        transition: 0.3s ease;
    }

    .register-card:hover {
        box-shadow:
            0 20px 50px rgba(29, 45, 35, 0.10);
    }


    /* =====================================================
       HEADER CARD
    ====================================================== */

    .register-header {
        display: flex;
        align-items: center;

        gap: 15px;

        padding: 25px 30px;

        border-bottom: 1px solid #edf0ee;

        background:
            linear-gradient(
                135deg,
                #ffffff,
                #fbfdfb
            );
    }

    .header-icon {
        width: 48px;
        height: 48px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 14px;

        background: #eef8e9;

        color: #39A900;

        font-size: 21px;
    }

    .register-header h2 {
        margin: 0;

        font-size: 17px;

        font-weight: 750;

        color: #26312b;
    }

    .register-header p {
        margin: 4px 0 0;

        font-size: 13px;

        color: #8a938e;
    }


    /* =====================================================
       BODY
    ====================================================== */

    .register-body {
        padding: 32px 30px;
    }


    /* =====================================================
       LABELS
    ====================================================== */

    .form-group label {
        display: block;

        margin-bottom: 9px;

        font-size: 13px;

        font-weight: 700;

        color: #39443e;
    }

    .form-group label i {
        color: #39A900;

        margin-right: 5px;
    }


    /* =====================================================
       INPUT
    ====================================================== */

    .input-wrapper {
        position: relative;
    }

    .input-icon {
        position: absolute;

        left: 16px;

        top: 50%;

        transform: translateY(-50%);

        color: #9aa39e;

        font-size: 17px;

        transition: 0.2s;
    }

    .input-wrapper input {
        width: 100%;

        height: 52px;

        padding: 0 18px 0 47px;

        border: 1px solid #dfe5e1;

        border-radius: 13px;

        outline: none;

        background: #fbfcfb;

        color: #26312b;

        font-size: 14px;

        transition:
            border-color 0.2s,
            box-shadow 0.2s,
            background 0.2s;
    }

    .input-wrapper input::placeholder {
        color: #adb5b1;
    }

    .input-wrapper input:hover {
        border-color: #cbd5cf;

        background: #ffffff;
    }

    .input-wrapper input:focus {
        border-color: #39A900;

        background: #ffffff;

        box-shadow:
            0 0 0 4px rgba(57, 169, 0, 0.10);
    }

    .input-wrapper input:focus + .input-icon {
        color: #39A900;
    }

    .input-wrapper:focus-within .input-icon {
        color: #39A900;
    }


    /* =====================================================
       ERROR
    ====================================================== */

    .input-wrapper input.is-invalid {
        border-color: #dc3545;
    }

    .error-message {
        display: flex;

        align-items: center;

        gap: 5px;

        margin-top: 7px;

        font-size: 12px;

        color: #dc3545;
    }


    /* =====================================================
       TIP
    ====================================================== */

    .form-tip {
        display: flex;

        gap: 12px;

        margin-top: 25px;

        padding: 15px;

        border-radius: 13px;

        background: #f4f9f2;

        border: 1px solid #e4f0df;
    }

    .tip-icon {
        flex-shrink: 0;

        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #e4f4dc;

        color: #39A900;
    }

    .form-tip strong {
        display: block;

        color: #354238;

        font-size: 12px;

        margin-bottom: 2px;
    }

    .form-tip p {
        margin: 0;

        color: #7b857f;

        font-size: 12px;

        line-height: 1.5;
    }


    /* =====================================================
       FOOTER
    ====================================================== */

    .register-footer {
        display: flex;

        justify-content: flex-end;

        align-items: center;

        gap: 12px;

        padding: 20px 30px;

        background: #fafbfa;

        border-top: 1px solid #edf0ee;
    }


    /* =====================================================
       BOTON CANCELAR
    ====================================================== */

    .btn-cancel {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        height: 45px;

        padding: 0 20px;

        border-radius: 11px;

        background: white;

        border: 1px solid #dfe4e1;

        color: #68716c;

        text-decoration: none;

        font-size: 13px;

        font-weight: 700;

        transition: 0.2s ease;
    }

    .btn-cancel:hover {
        background: #f3f5f4;

        color: #303934;

        border-color: #cfd6d1;

        transform: translateY(-1px);
    }


    /* =====================================================
       BOTON GUARDAR
    ====================================================== */

    .btn-save {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 9px;

        height: 45px;

        padding: 0 23px;

        border: none;

        border-radius: 11px;

        background: #39A900;

        color: white;

        font-size: 13px;

        font-weight: 750;

        cursor: pointer;

        box-shadow:
            0 7px 18px rgba(57, 169, 0, 0.22);

        transition: 0.2s ease;
    }

    .btn-save:hover {
        background: #2f8f00;

        transform: translateY(-2px);

        box-shadow:
            0 10px 22px rgba(57, 169, 0, 0.28);
    }

    .btn-save:active {
        transform: translateY(0);
    }


    /* =====================================================
       PANEL LATERAL
    ====================================================== */

    .info-card {
        position: relative;

        height: 100%;

        min-height: 390px;

        overflow: hidden;

        padding: 30px;

        border-radius: 20px;

        background:
            linear-gradient(
                145deg,
                #39A900 0%,
                #2f8e00 100%
            );

        color: white;

        box-shadow:
            0 18px 40px rgba(57, 169, 0, 0.20);
    }


    /* =====================================================
       INFO TOP
    ====================================================== */

    .info-top {
        position: relative;

        z-index: 2;

        display: flex;

        align-items: center;

        gap: 12px;

        margin-bottom: 28px;
    }

    .info-main-icon {
        width: 45px;
        height: 45px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 13px;

        background: rgba(255,255,255,0.16);

        border: 1px solid rgba(255,255,255,0.18);

        font-size: 20px;
    }

    .info-top span {
        font-size: 13px;

        font-weight: 750;

        letter-spacing: 1px;
    }


    /* =====================================================
       INFO TEXT
    ====================================================== */

    .info-card h3 {
        position: relative;

        z-index: 2;

        margin: 0 0 14px;

        font-size: 25px;

        line-height: 1.25;

        font-weight: 800;

        letter-spacing: -0.5px;
    }

    .info-card > p {
        position: relative;

        z-index: 2;

        margin: 0;

        max-width: 320px;

        font-size: 13px;

        line-height: 1.7;

        color: rgba(255,255,255,0.82);
    }


    /* =====================================================
       DIVISOR
    ====================================================== */

    .info-divider {
        width: 100%;

        height: 1px;

        margin: 25px 0;

        background: rgba(255,255,255,0.18);
    }


    /* =====================================================
       ITEMS
    ====================================================== */

    .info-item {
        position: relative;

        z-index: 2;

        display: flex;

        align-items: center;

        gap: 11px;

        margin-bottom: 14px;

        font-size: 13px;

        font-weight: 600;

        color: rgba(255,255,255,0.92);
    }

    .small-icon {
        width: 24px;
        height: 24px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: rgba(255,255,255,0.16);

        font-size: 12px;
    }


    /* =====================================================
       DECORACIÓN
    ====================================================== */

    .info-decoration {
        position: absolute;

        border-radius: 50%;

        background: rgba(255,255,255,0.07);
    }

    .decoration-one {
        width: 190px;
        height: 190px;

        right: -90px;
        top: -70px;
    }

    .decoration-two {
        width: 230px;
        height: 230px;

        right: -110px;
        bottom: -120px;
    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 991px) {

        .info-card {
            min-height: auto;
        }

    }


    @media (max-width: 576px) {

        .training-page .container {
            padding-left: 16px;
            padding-right: 16px;
        }

        .page-heading {
            align-items: flex-start;
        }

        .heading-icon {
            width: 48px;
            height: 48px;

            border-radius: 14px;

            font-size: 20px;
        }

        .page-heading h1 {
            font-size: 22px;
        }

        .page-heading p {
            font-size: 12px;
        }

        .register-header {
            padding: 22px;
        }

        .register-body {
            padding: 24px 22px;
        }

        .register-footer {
            padding: 18px 22px;

            flex-direction: column-reverse;

            align-items: stretch;
        }

        .btn-cancel,
        .btn-save {
            width: 100%;
        }

        .info-card {
            padding: 25px;
        }

    }

</style>

@endsection
