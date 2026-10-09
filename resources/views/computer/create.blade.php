@extends('Layout.app')

@section('content')

<style>

    /* =====================================================
       FONDO
    ====================================================== */

    body {
        background: #f6f8f6 !important;
    }


    /* =====================================================
       CONTENEDOR PRINCIPAL
    ====================================================== */

    .computer-form-page {

        max-width: 900px;

        margin: 0 auto;

        padding: 35px 20px 60px;

    }


    /* =====================================================
       ENCABEZADO
    ====================================================== */

    .computer-form-header {

        display: flex;

        align-items: center;

        gap: 16px;

        margin-bottom: 25px;

    }

    .computer-header-icon {

        width: 58px;

        height: 58px;

        flex-shrink: 0;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 17px;

        background: linear-gradient(
            135deg,
            #39A900,
            #2d8500
        );

        color: white;

        font-size: 25px;

        box-shadow:
            0 8px 20px rgba(57,169,0,.18);

    }

    .computer-form-header h1 {

        margin: 0;

        color: #202923;

        font-size: 25px;

        font-weight: 750;

        letter-spacing: -.6px;

    }

    .computer-form-header p {

        margin: 5px 0 0;

        color: #8d9690;

        font-size: 12px;

    }


    /* =====================================================
       TARJETA
    ====================================================== */

    .computer-form-card {

        background: white;

        border: 1px solid #e5eae6;

        border-radius: 20px;

        overflow: hidden;

        box-shadow:
            0 10px 35px rgba(30,50,35,.06);

    }


    /* =====================================================
       BARRA VERDE SUPERIOR
    ====================================================== */

    .card-green-line {

        height: 5px;

        background: linear-gradient(
            90deg,
            #39A900,
            #70c94b,
            #39A900
        );

    }


    /* =====================================================
       INFORMACIÓN DE LA TARJETA
    ====================================================== */

    .form-card-intro {

        padding: 26px 30px 22px;

        border-bottom: 1px solid #edf0ed;

    }

    .form-card-intro h2 {

        margin: 0;

        color: #303832;

        font-size: 15px;

        font-weight: 720;

    }

    .form-card-intro p {

        margin: 5px 0 0;

        color: #9aa19c;

        font-size: 10px;

    }


    /* =====================================================
       FORMULARIO
    ====================================================== */

    .computer-form-body {

        padding: 30px;

    }


    /* =====================================================
       LABELS
    ====================================================== */

    .computer-label {

        display: flex;

        align-items: center;

        gap: 7px;

        margin-bottom: 8px;

        color: #4b554e;

        font-size: 10px;

        font-weight: 750;

        letter-spacing: .6px;

        text-transform: uppercase;

    }

    .computer-label i {

        color: #39A900;

        font-size: 12px;

    }


    /* =====================================================
       INPUT
    ====================================================== */

    .computer-input-wrapper {

        position: relative;

    }

    .computer-input-icon {

        position: absolute;

        left: 14px;

        top: 50%;

        transform: translateY(-50%);

        color: #9aa39c;

        font-size: 14px;

        pointer-events: none;

        z-index: 2;

    }

    .computer-input {

        width: 100%;

        height: 48px;

        padding: 0 15px 0 40px;

        background: #fafbfa;

        border: 1px solid #e1e6e2;

        border-radius: 11px;

        outline: none;

        color: #303831;

        font-size: 12px;

        transition: all .2s ease;

    }

    .computer-input::placeholder {

        color: #adb4ae;

    }

    .computer-input:hover {

        border-color: #cbd5cd;

        background: white;

    }

    .computer-input:focus {

        background: white;

        border-color: #6fbe51;

        box-shadow:
            0 0 0 3px rgba(57,169,0,.09);

    }


    /* =====================================================
       AYUDA
    ====================================================== */

    .computer-help {

        display: flex;

        align-items: center;

        gap: 5px;

        margin-top: 7px;

        color: #9aa19c;

        font-size: 9px;

    }

    .computer-help i {

        color: #8e9890;

        font-size: 10px;

    }


    /* =====================================================
       ERRORES
    ====================================================== */

    .computer-error {

        display: flex;

        align-items: center;

        gap: 5px;

        margin-top: 7px;

        color: #dc3545;

        font-size: 10px;

        font-weight: 600;

    }

    .computer-error i {

        font-size: 11px;

    }

    .computer-input.is-invalid {

        border-color: #dc3545;

    }

    .computer-input.is-invalid:focus {

        border-color: #dc3545;

        box-shadow:
            0 0 0 3px rgba(220,53,69,.08);

    }


    /* =====================================================
       SEPARADOR
    ====================================================== */

    .form-divider {

        height: 1px;

        margin: 30px 0 24px;

        background: #edf0ed;

    }


    /* =====================================================
       BOTONES
    ====================================================== */

    .form-actions {

        display: flex;

        align-items: center;

        justify-content: flex-end;

        gap: 10px;

    }

    .btn-cancel-computer {

        height: 42px;

        padding: 0 18px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 7px;

        border-radius: 10px;

        border: 1px solid #e0e5e1;

        background: white;

        color: #69726b;

        text-decoration: none;

        font-size: 10px;

        font-weight: 700;

        transition: all .2s ease;

    }

    .btn-cancel-computer:hover {

        background: #f5f7f5;

        color: #353d37;

        border-color: #d3d9d4;

    }


    .btn-save-computer {

        height: 42px;

        padding: 0 20px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        border: none;

        border-radius: 10px;

        background: #39A900;

        color: white;

        font-size: 10px;

        font-weight: 750;

        cursor: pointer;

        box-shadow:
            0 6px 15px rgba(57,169,0,.18);

        transition: all .2s ease;

    }

    .btn-save-computer:hover {

        background: #2d8b00;

        color: white;

        transform: translateY(-2px);

        box-shadow:
            0 9px 20px rgba(57,169,0,.24);

    }

    .btn-save-computer i {

        font-size: 13px;

    }


    /* =====================================================
       INFO INFERIOR
    ====================================================== */

    .form-security-info {

        display: flex;

        align-items: center;

        gap: 8px;

        margin-top: 20px;

        padding: 11px 13px;

        border-radius: 10px;

        background: #f7faf6;

        border: 1px solid #e8efe6;

        color: #879188;

        font-size: 9px;

    }

    .form-security-info i {

        color: #39A900;

        font-size: 13px;

    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 600px) {

        .computer-form-page {

            padding: 25px 15px 40px;

        }

        .computer-form-header {

            align-items: flex-start;

        }

        .computer-header-icon {

            width: 50px;

            height: 50px;

            font-size: 21px;

        }

        .computer-form-header h1 {

            font-size: 21px;

        }

        .computer-form-header p {

            font-size: 11px;

        }

        .form-card-intro,
        .computer-form-body {

            padding: 22px 20px;

        }

        .form-actions {

            flex-direction: column-reverse;

        }

        .btn-cancel-computer,
        .btn-save-computer {

            width: 100%;

        }

    }

</style>

<div class="computer-form-page">

```
<!-- =================================================
     ENCABEZADO
================================================== -->

<div class="computer-form-header">

    <div class="computer-header-icon">
        <i class="bi bi-pc-display"></i>
    </div>

    <div>

        <h1>
            Registrar nuevo computador
        </h1>

        <p>
            Agrega un nuevo equipo al inventario del ambiente de formación.
        </p>

    </div>

</div>


<!-- =================================================
     TARJETA PRINCIPAL
================================================== -->

<div class="computer-form-card">

    <div class="card-green-line"></div>


    <!-- INTRODUCCIÓN -->

    <div class="form-card-intro">

        <h2>
            Información del equipo
        </h2>

        <p>
            Completa los siguientes datos para registrar correctamente el computador.
        </p>

    </div>


    <!-- FORMULARIO -->

    <div class="computer-form-body">

        <form
            action="{{ route('computer.store') }}"
            method="POST"
        >

            @csrf


            <div class="row g-4">


                <!-- =========================
                     NÚMERO
                ========================== -->

                <div class="col-12 col-md-6">

                    <label
                        for="number"
                        class="computer-label"
                    >
                        <i class="bi bi-hash"></i>
                        Número de equipo
                    </label>


                    <div class="computer-input-wrapper">

                        <i class="bi bi-pc-display computer-input-icon"></i>

                        <input
                            type="number"
                            id="number"
                            name="number"
                            value="{{ old('number') }}"
                            class="computer-input @error('number') is-invalid @enderror"
                            placeholder="Ej. 15"
                            required
                        >

                    </div>


                    <div class="computer-help">

                        <i class="bi bi-info-circle"></i>

                        Identificador del equipo registrado en el chasis.

                    </div>


                    @error('number')

                        <div class="computer-error">

                            <i class="bi bi-exclamation-circle"></i>

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                <!-- =========================
                     MARCA
                ========================== -->

                <div class="col-12 col-md-6">

                    <label
                        for="brand"
                        class="computer-label"
                    >
                        <i class="bi bi-tag"></i>
                        Marca del equipo
                    </label>


                    <div class="computer-input-wrapper">

                        <i class="bi bi-laptop computer-input-icon"></i>

                        <input
                            type="text"
                            id="brand"
                            name="brand"
                            value="{{ old('brand') }}"
                            class="computer-input @error('brand') is-invalid @enderror"
                            placeholder="Ej. Lenovo, HP, Dell"
                            required
                        >

                    </div>


                    <div class="computer-help">

                        <i class="bi bi-info-circle"></i>

                        Fabricante del computador.

                    </div>


                    @error('brand')

                        <div class="computer-error">

                            <i class="bi bi-exclamation-circle"></i>

                            {{ $message }}

                        </div>

                    @enderror

                </div>

            </div>


            <!-- SEPARADOR -->

            <div class="form-divider"></div>


            <!-- BOTONES -->

            <div class="form-actions">

                <a
                    href="{{ url()->previous() }}"
                    class="btn-cancel-computer"
                >
                    <i class="bi bi-arrow-left"></i>
                    Cancelar
                </a>


                <button
                    type="submit"
                    class="btn-save-computer"
                >
                    <i class="bi bi-check2"></i>
                    Registrar equipo
                </button>

            </div>


            <!-- INFORMACIÓN -->

            <div class="form-security-info">

                <i class="bi bi-shield-check"></i>

                <span>
                    Los datos ingresados quedarán registrados en el inventario del sistema.
                </span>

            </div>

        </form>

    </div>

</div>
```

</div>

@endsection
