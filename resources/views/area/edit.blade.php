@extends('Layout.app')

@section('content')

<div class="area-edit-page">

```
<!-- =========================
     ENCABEZADO
========================== -->

<div class="area-edit-header">

    <div class="header-left">

        <a href="{{ url()->previous() }}" class="back-button">
            <i class="bi bi-arrow-left"></i>
        </a>

        <div class="header-icon">
            <i class="bi bi-pencil-square"></i>
        </div>

        <div>
            <h1>Actualizar área</h1>
            <p>Modifica la información del área seleccionada.</p>
        </div>

    </div>

</div>


<!-- =========================
     TARJETA PRINCIPAL
========================== -->

<div class="area-edit-card">

    <!-- Encabezado de la tarjeta -->

    <div class="card-top">

        <div class="area-preview-header">

            <div class="area-avatar">
                <i class="bi bi-building"></i>
            </div>

            <div>

                <span class="area-label">
                    ÁREA SELECCIONADA
                </span>

                <h2>
                    {{ $area['name'] }}
                </h2>

                <span class="area-id">
                    Registro #{{ $area['id'] }}
                </span>

            </div>

        </div>


        <div class="edit-status">

            <i class="bi bi-pencil"></i>

            Editando área

        </div>

    </div>


    <!-- =========================
         CUERPO
    ========================== -->

    <div class="card-body-custom">

        <form
            action="{{ route('area.update', $area['id']) }}"
            method="POST"
        >

            @csrf
            @method('put')


            <!-- Título sección -->

            <div class="section-title">

                <div class="section-icon">
                    <i class="bi bi-building"></i>
                </div>

                <div>
                    <h3>Información del área</h3>
                    <p>Actualiza el nombre de esta área.</p>
                </div>

            </div>


            <!-- Campo -->

            <div class="input-group-custom">

                <label for="name">

                    Nombre del área

                    <span>*</span>

                </label>


                <div class="input-wrapper">

                    <i class="bi bi-tag"></i>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $area['name']) }}"
                        placeholder="Ej. Redes y Telecomunicaciones"
                        required
                        autocomplete="off"
                    >

                </div>


                <div class="input-help">

                    <i class="bi bi-info-circle"></i>

                    <span>
                        Utiliza un nombre claro y descriptivo para
                        identificar fácilmente el área.
                    </span>

                </div>

            </div>


            <!-- =========================
                 VISTA PREVIA
            ========================== -->

            <div class="preview-box">

                <div class="preview-icon">

                    <i class="bi bi-eye"></i>

                </div>


                <div class="preview-content">

                    <span>
                        NUEVO NOMBRE DEL ÁREA
                    </span>

                    <strong id="areaPreview">
                        {{ old('name', $area['name']) }}
                    </strong>

                </div>

            </div>


            <!-- =========================
                 AVISO
            ========================== -->

            <div class="info-box">

                <div class="info-icon">

                    <i class="bi bi-info-circle-fill"></i>

                </div>

                <div>

                    <strong>
                        Estás modificando un área existente
                    </strong>

                    <p>
                        Al guardar los cambios, el nuevo nombre
                        reemplazará el nombre actual del área.
                    </p>

                </div>

            </div>


            <!-- =========================
                 DIVISOR
            ========================== -->

            <div class="form-divider"></div>


            <!-- =========================
                 BOTONES
            ========================== -->

            <div class="form-footer">

                <a
                    href="{{ url()->previous() }}"
                    class="cancel-button"
                >

                    <i class="bi bi-arrow-left"></i>

                    Volver

                </a>


                <button
                    type="submit"
                    class="save-button"
                >

                    <i class="bi bi-check-lg"></i>

                    Guardar cambios

                </button>

            </div>


        </form>

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

    .area-edit-page {

        max-width: 850px;

        margin: 0 auto;

        padding: 35px 25px 55px;

    }


    /* =========================
       HEADER
    ========================== */

    .area-edit-header {

        margin-bottom: 25px;

    }

    .header-left {

        display: flex;

        align-items: center;

        gap: 15px;

    }


    /* =========================
       BOTÓN ATRÁS
    ========================== */

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


    /* =========================
       ICONO HEADER
    ========================== */

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


    /* =========================
       TÍTULO
    ========================== */

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

    .area-edit-card {

        background: white;

        border: 1px solid #e8ece8;

        border-radius: 20px;

        overflow: hidden;

        box-shadow:
            0 8px 30px rgba(30,50,35,.055);

    }


    /* =========================
       CARD TOP
    ========================== */

    .card-top {

        display: flex;

        align-items: center;

        justify-content: space-between;

        padding: 25px 30px;

        background: linear-gradient(
            135deg,
            #fbfdfb,
            #f5faf3
        );

        border-bottom: 1px solid #e8eee7;

    }


    /* =========================
       PREVIEW HEADER
    ========================== */

    .area-preview-header {

        display: flex;

        align-items: center;

        gap: 14px;

    }

    .area-avatar {

        width: 55px;
        height: 55px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 16px;

        background: linear-gradient(
            135deg,
            #e1f5d8,
            #cbeab9
        );

        color: #31780e;

        font-size: 22px;

    }

    .area-label {

        display: block;

        color: #89938c;

        font-size: 9px;

        font-weight: 750;

        letter-spacing: 1px;

        margin-bottom: 2px;

    }

    .area-preview-header h2 {

        margin: 0;

        color: #273029;

        font-size: 17px;

        font-weight: 720;

    }

    .area-id {

        display: block;

        margin-top: 3px;

        color: #8c958e;

        font-size: 11px;

    }


    /* =========================
       ESTADO
    ========================== */

    .edit-status {

        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 8px 12px;

        border-radius: 9px;

        background: #eaf7e3;

        color: #397c1d;

        font-size: 10px;

        font-weight: 650;

    }


    /* =========================
       BODY
    ========================== */

    .card-body-custom {

        padding: 0 30px 25px;

    }


    /* =========================
       SECTION
    ========================== */

    .section-title {

        display: flex;

        align-items: center;

        gap: 12px;

        margin: 28px 0 20px;

    }

    .section-icon {

        width: 39px;
        height: 39px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 11px;

        background: #eaf7e3;

        color: #39A900;

        font-size: 16px;

    }

    .section-title h3 {

        margin: 0;

        color: #29322c;

        font-size: 14px;

        font-weight: 720;

    }

    .section-title p {

        margin: 3px 0 0;

        color: #929a94;

        font-size: 11px;

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

        transition: .2s;

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
       INFO
    ========================== */

    .info-box {

        display: flex;

        align-items: flex-start;

        gap: 12px;

        margin-top: 18px;

        padding: 14px 16px;

        background: #f5faf2;

        border: 1px solid #e1efdb;

        border-radius: 12px;

    }

    .info-icon {

        color: #39A900;

        font-size: 17px;

        margin-top: 1px;

    }

    .info-box strong {

        display: block;

        color: #45603b;

        font-size: 12px;

        margin-bottom: 3px;

    }

    .info-box p {

        margin: 0;

        color: #778171;

        font-size: 11px;

        line-height: 1.5;

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
       VOLVER
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
       RESPONSIVE
    ========================== */

    @media (max-width: 600px) {

        .area-edit-page {

            padding: 25px 15px 40px;

        }

        .header-left h1 {

            font-size: 24px;

        }

        .card-top {

            flex-direction: column;

            align-items: flex-start;

            gap: 15px;

        }

        .card-body-custom {

            padding: 0 22px 22px;

        }

        .edit-status {

            align-self: flex-start;

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

        const value = this.value.trim();


        if (value === '') {

            preview.textContent = 'Nombre del área';

        } else {

            preview.textContent = value;

        }

    });

});

</script>

@endsection
