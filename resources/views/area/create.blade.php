@extends('Layout.app')

@section('content')

<div class="area-page">

```
<!-- =========================
     ENCABEZADO
========================== -->

<div class="area-header">

    <div class="header-left">

        <a href="{{ url()->previous() }}" class="back-button">
            <i class="bi bi-arrow-left"></i>
        </a>

        <div class="header-icon">
            <i class="bi bi-building"></i>
        </div>

        <div>
            <h1>Registrar área</h1>
            <p>Agrega una nueva área al sistema de gestión.</p>
        </div>

    </div>

</div>


<!-- =========================
     TARJETA DEL FORMULARIO
========================== -->

<div class="area-card">

    <!-- Encabezado -->

    <div class="card-header-custom">

        <div class="section-icon">
            <i class="bi bi-diagram-3-fill"></i>
        </div>

        <div>
            <h2>Información del área</h2>
            <p>Ingresa los datos correspondientes al área.</p>
        </div>

    </div>


    <!-- Cuerpo -->

    <div class="card-body-custom">

        <form action="{{ route('area.store') }}" method="POST">

            @csrf


            <!-- Nombre -->

            <div class="input-group-custom">

                <label for="name">
                    Nombre del área
                    <span>*</span>
                </label>

                <div class="input-wrapper">

                    <i class="bi bi-building"></i>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Ej. Teleinformática y Tecnología"
                        value="{{ old('name') }}"
                        required
                        autocomplete="off"
                    >

                </div>

                <div class="input-help">

                    <i class="bi bi-info-circle"></i>

                    <span>
                        Utiliza un nombre claro y descriptivo para identificar
                        fácilmente el área.
                    </span>

                </div>

            </div>


            <!-- Vista previa -->

            <div class="preview-box">

                <div class="preview-icon">
                    <i class="bi bi-eye"></i>
                </div>

                <div class="preview-content">

                    <span>VISTA PREVIA</span>

                    <strong id="areaPreview">
                        Nombre del área
                    </strong>

                </div>

            </div>


            <!-- Separador -->

            <div class="form-divider"></div>


            <!-- Botones -->

            <div class="form-footer">

                <a
                    href="{{ url()->previous() }}"
                    class="cancel-button"
                >
                    <i class="bi bi-arrow-left"></i>
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="save-button"
                >
                    <i class="bi bi-check-lg"></i>
                    Guardar área
                </button>

            </div>

        </form>

    </div>

</div>


<!-- =========================
     TARJETA INFORMATIVA
========================== -->

<div class="bottom-info">

    <div class="bottom-info-icon">
        <i class="bi bi-lightbulb-fill"></i>
    </div>

    <div>

        <strong>Recomendación</strong>

        <p>
            Evita nombres demasiado cortos o ambiguos.
            Utiliza nombres que permitan identificar fácilmente
            la función del área.
        </p>

    </div>

</div>
```

</div>

<!-- =========================
     ESTILOS
========================== -->

<style>

    /* =========================
       GENERAL
    ========================== */

    body {
        background: #f6f8f7 !important;
    }

    .area-page {
        max-width: 850px;

        margin: 0 auto;

        padding: 35px 25px 55px;
    }


    /* =========================
       HEADER
    ========================== */

    .area-header {
        margin-bottom: 25px;
    }

    .header-left {
        display: flex;

        align-items: center;

        gap: 15px;
    }

    .back-button {
        width: 42px;
        height: 42px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 11px;

        background: white;

        border: 1px solid #e6ebe6;

        color: #68716b;

        text-decoration: none;

        font-size: 17px;

        transition: .2s;
    }

    .back-button:hover {
        background: #eef7ea;

        border-color: #d6eacc;

        color: #39A900;
    }

    .header-icon {
        width: 54px;
        height: 54px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 16px;

        background: linear-gradient(
            135deg,
            #39A900,
            #2d8800
        );

        color: white;

        font-size: 22px;

        box-shadow:
            0 8px 20px rgba(57,169,0,.18);
    }

    .header-left h1 {
        margin: 0;

        color: #202922;

        font-size: 28px;

        font-weight: 750;

        letter-spacing: -.6px;
    }

    .header-left p {
        margin: 4px 0 0;

        color: #858e88;

        font-size: 13px;
    }


    /* =========================
       CARD
    ========================== */

    .area-card {
        background: white;

        border: 1px solid #e8ece8;

        border-radius: 20px;

        overflow: hidden;

        box-shadow:
            0 8px 30px rgba(30,50,35,.055);
    }


    /* =========================
       CARD HEADER
    ========================== */

    .card-header-custom {

        display: flex;

        align-items: center;

        gap: 13px;

        padding: 24px 28px;

        background: linear-gradient(
            135deg,
            #fbfdfb,
            #f5faf3
        );

        border-bottom: 1px solid #e8eee7;
    }

    .section-icon {

        width: 42px;
        height: 42px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background: #eaf7e3;

        color: #39A900;

        font-size: 17px;
    }

    .card-header-custom h2 {
        margin: 0;

        color: #29322c;

        font-size: 16px;

        font-weight: 720;
    }

    .card-header-custom p {
        margin: 4px 0 0;

        color: #929a94;

        font-size: 11px;
    }


    /* =========================
       BODY
    ========================== */

    .card-body-custom {
        padding: 30px;
    }


    /* =========================
       LABEL
    ========================== */

    .input-group-custom label {

        display: block;

        margin-bottom: 8px;

        color: #4c554f;

        font-size: 12px;

        font-weight: 650;
    }

    .input-group-custom label span {
        color: #e05252;

        margin-left: 2px;
    }


    /* =========================
       INPUT
    ========================== */

    .input-wrapper {
        position: relative;
    }

    .input-wrapper > i {

        position: absolute;

        left: 14px;

        top: 50%;

        transform: translateY(-50%);

        color: #9aa39d;

        font-size: 16px;

        pointer-events: none;
    }

    .input-wrapper input {

        width: 100%;

        height: 48px;

        box-sizing: border-box;

        padding: 0 15px 0 43px;

        border: 1px solid #e1e6e2;

        border-radius: 11px;

        background: #fafbfa;

        color: #333;

        font-size: 13px;

        outline: none;

        transition: .2s;
    }

    .input-wrapper input::placeholder {
        color: #b0b6b1;
    }

    .input-wrapper input:focus {

        background: white;

        border-color: #8acb68;

        box-shadow:
            0 0 0 3px rgba(57,169,0,.08);
    }


    /* =========================
       AYUDA
    ========================== */

    .input-help {

        display: flex;

        align-items: center;

        gap: 6px;

        margin-top: 8px;

        color: #929a94;

        font-size: 10px;
    }

    .input-help i {
        color: #39A900;

        font-size: 12px;
    }


    /* =========================
       PREVIEW
    ========================== */

    .preview-box {

        display: flex;

        align-items: center;

        gap: 13px;

        margin-top: 24px;

        padding: 15px;

        background: #f7faf6;

        border: 1px solid #e5eee1;

        border-radius: 12px;
    }

    .preview-icon {

        width: 39px;
        height: 39px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: white;

        color: #39A900;

        border: 1px solid #e1ebdd;

        font-size: 15px;
    }

    .preview-content span {

        display: block;

        color: #9aa29c;

        font-size: 8px;

        font-weight: 750;

        letter-spacing: 1px;

        margin-bottom: 3px;
    }

    .preview-content strong {

        color: #3d463f;

        font-size: 13px;

        font-weight: 650;
    }


    /* =========================
       DIVIDER
    ========================== */

    .form-divider {

        height: 1px;

        background: #edf0ed;

        margin: 27px 0 20px;
    }


    /* =========================
       FOOTER
    ========================== */

    .form-footer {

        display: flex;

        justify-content: flex-end;

        align-items: center;

        gap: 10px;
    }


    /* =========================
       CANCELAR
    ========================== */

    .cancel-button {

        height: 42px;

        padding: 0 18px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 7px;

        border-radius: 10px;

        background: white;

        border: 1px solid #dfe4df;

        color: #626b64;

        text-decoration: none;

        font-size: 12px;

        font-weight: 650;

        transition: .2s;
    }

    .cancel-button:hover {

        background: #f3f5f3;

        color: #333b35;
    }


    /* =========================
       GUARDAR
    ========================== */

    .save-button {

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

        font-size: 12px;

        font-weight: 700;

        cursor: pointer;

        box-shadow:
            0 6px 15px rgba(57,169,0,.18);

        transition: .25s;
    }

    .save-button:hover {

        background: #2e8d00;

        transform: translateY(-1px);

        box-shadow:
            0 8px 20px rgba(57,169,0,.25);
    }

    .save-button i {
        font-size: 15px;
    }


    /* =========================
       INFO INFERIOR
    ========================== */

    .bottom-info {

        display: flex;

        align-items: flex-start;

        gap: 12px;

        margin-top: 18px;

        padding: 14px 16px;

        background: #ffffff;

        border: 1px solid #e9ede9;

        border-radius: 13px;
    }

    .bottom-info-icon {

        color: #e3a52b;

        font-size: 17px;

        margin-top: 1px;
    }

    .bottom-info strong {

        display: block;

        color: #525a54;

        font-size: 11px;

        margin-bottom: 3px;
    }

    .bottom-info p {

        margin: 0;

        color: #8b938d;

        font-size: 10px;

        line-height: 1.5;
    }


    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 600px) {

        .area-page {
            padding: 25px 15px 40px;
        }

        .header-left h1 {
            font-size: 24px;
        }

        .card-body-custom {
            padding: 22px;
        }

        .card-header-custom {
            padding: 20px 22px;
        }

        .form-footer {
            flex-direction: column-reverse;

            align-items: stretch;
        }

        .cancel-button,
        .save-button {
            width: 100%;
        }

    }

</style>

<!-- =========================
     VISTA PREVIA EN TIEMPO REAL
========================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const input = document.getElementById('name');
    const preview = document.getElementById('areaPreview');

    if (!input || !preview) return;

    input.addEventListener('input', function () {

        if (this.value.trim() === '') {

            preview.textContent = 'Nombre del área';

        } else {

            preview.textContent = this.value;

        }

    });

});

</script>

@endsection
