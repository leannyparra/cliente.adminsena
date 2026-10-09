@extends('layout.app')

@section('title', 'Iniciar sesión | AdminSENA')

@php
    $hideLayout = true;
@endphp

@section('content')

<main class="login-page">

    <!-- Decoraciones -->

    <div class="shape shape-one"></div>

    <div class="shape shape-two"></div>

    <div class="shape shape-three"></div>


    <div class="login-card">


        <!-- ==========================
             PANEL IZQUIERDO
        =========================== -->

        <section class="welcome-section">

            <a href="{{ route('nosotros') }}" class="btn-volver">
    <i class="bi bi-arrow-left"></i>
    Volver
</a>

            <div class="brand">

            <div class="logo-container">
                <img 
                    src="{{ asset('img/senalogo.png') }}" 
                    alt="Logo SENA"
                    class="logo-image"
                >
            </div>


                <h1>
                    Admin<span>SENA</span>
                </h1>


                <p>
                    Plataforma de administración y gestión
                    para los procesos de formación del SENA.
                </p>

            </div>


            <div class="illustration">

                <div class="illustration-circle">

                    <i class="bi bi-pc-display-horizontal computer-icon"></i>


                    <div class="floating-icon floating-one">

                        <i class="bi bi-people-fill"></i>

                    </div>


                    <div class="floating-icon floating-two">

                        <i class="bi bi-mortarboard-fill"></i>

                    </div>


                    <div class="floating-icon floating-three">

                        <i class="bi bi-bar-chart-fill"></i>

                    </div>

                </div>

            </div>


            <div class="institution-text">

                Servicio Nacional de Aprendizaje · SENA

            </div>

        </section>



        <!-- ==========================
             PANEL DERECHO
        =========================== -->

        <section class="form-section">

            <div class="form-container">


                <div class="form-header">

                    <h2>
                        Bienvenido
                    </h2>

                    <p>
                        Ingresa a tu cuenta de
                        <span>AdminSENA</span>
                        para continuar.
                    </p>

                </div>


                <!-- Errores Laravel -->

                @if ($errors->any())

                    <div class="alert alert-danger alert-custom">

                        <i class="bi bi-exclamation-circle me-2"></i>

                        {{ $errors->first() }}

                    </div>

                @endif


                <!-- Mensaje de sesión -->

                @if (session('status'))

                    <div class="alert alert-success alert-custom">

                        <i class="bi bi-check-circle me-2"></i>

                        {{ session('status') }}

                    </div>

                @endif



                <!-- ==========================
                     FORMULARIO
                =========================== -->

                <form
                    method="POST"
                    action="{{ route('login.post') }}"
                >

                    @csrf


                    <!-- CORREO -->

                    <div class="input-group-custom">

                        <label for="email">
                            Correo electrónico
                        </label>


                        <div class="input-wrapper">

                            <i class="bi bi-envelope input-icon"></i>


                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="custom-input"
                                placeholder="Ingresa tu correo"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                            >

                        </div>

                    </div>



                    <!-- CONTRASEÑA -->

                    <div class="input-group-custom">

                        <label for="password">
                            Contraseña
                        </label>


                        <div class="input-wrapper">

                            <i class="bi bi-lock input-icon"></i>


                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="custom-input"
                                placeholder="Ingresa tu contraseña"
                                required
                                autocomplete="current-password"
                            >


                            <button
                                type="button"
                                class="password-toggle"
                                id="togglePassword"
                            >

                                <i class="bi bi-eye"></i>

                            </button>

                        </div>

                    </div>



                    <!-- OPCIONES -->

                    <div class="form-options">

                        <label class="remember">

                            <input
                                type="checkbox"
                                name="remember"
                                value="1"
                            >

                            <span>
                                Recordarme
                            </span>

                        </label>


                        <a
                            href="#"
                            class="forgot-password"
                        >
                            ¿Olvidaste tu contraseña?
                        </a>

                    </div>



                    <!-- BOTÓN -->

                    <button
                        type="submit"
                        class="btn-login"
                    >

                        Iniciar sesión

                        <i class="bi bi-arrow-right"></i>

                    </button>

                </form>



                <div class="divider">

                    <span>
                        Acceso administrativo
                    </span>

                </div>



                <div class="form-footer">

                    <p>
                        Sistema de gestión
                        <strong>AdminSENA</strong>
                    </p>


                    <div class="security-message">

                        <i class="bi bi-shield-lock-fill"></i>

                        Acceso protegido y seguro

                    </div>

                </div>

            </div>

        </section>

    </div>

</main>

@endsection



@section('scripts')

<script>

    const togglePassword =
        document.getElementById('togglePassword');

    const password =
        document.getElementById('password');


    if (togglePassword && password) {

        togglePassword.addEventListener('click', function () {

            const type =
                password.getAttribute('type') === 'password'
                    ? 'text'
                    : 'password';


            password.setAttribute('type', type);


            const icon =
                this.querySelector('i');


            if (type === 'text') {

                icon.classList.remove('bi-eye');

                icon.classList.add('bi-eye-slash');

            } else {

                icon.classList.remove('bi-eye-slash');

                icon.classList.add('bi-eye');

            }

        });

    }

</script>

@section('styles')

<style>

    body {
        background: #eef8eb;
        overflow-x: hidden;
    }

    /* =========================
       PÁGINA LOGIN
    ========================= */

    .login-page {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        position: relative;
        overflow: hidden;
    }

    /* =========================
       FORMAS DECORATIVAS
    ========================= */

    .shape {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
    }

    .shape-one {
        width: 430px;
        height: 430px;
        background: #39A900;
        top: -250px;
        right: -120px;
        opacity: .95;
    }

    .shape-two {
        width: 400px;
        height: 400px;
        background: #007a33;
        bottom: -250px;
        left: -150px;
        opacity: .95;
    }

    .shape-three {
        width: 180px;
        height: 180px;
        background: #8bcf70;
        top: 70%;
        right: -90px;
        opacity: .45;
    }


    /* =========================
       TARJETA PRINCIPAL
    ========================= */

    .login-card {
        width: 100%;
        max-width: 1050px;
        min-height: 620px;
        background: #fff;
        border-radius: 24px;
        overflow: hidden;
        display: flex;
        position: relative;
        z-index: 2;

        box-shadow:
            0 25px 70px rgba(0, 80, 30, .18);
    }


    /* =========================
       PANEL IZQUIERDO
    ========================= */

    .welcome-section {
        width: 48%;

        background:
            linear-gradient(
                145deg,
                #39A900 0%,
                #2d8f00 55%,
                #007a33 100%
            );

        color: white;
        padding: 55px 50px;

        display: flex;
        flex-direction: column;
        justify-content: space-between;

        position: relative;
        overflow: hidden;
    }


    .welcome-section::before {
        content: "";

        position: absolute;

        width: 350px;
        height: 350px;

        border-radius: 50%;

        background: rgba(255,255,255,.08);

        top: -160px;
        right: -140px;
    }


    .welcome-section::after {
        content: "";

        position: absolute;

        width: 280px;
        height: 280px;

        border-radius: 50%;

        background: rgba(255,255,255,.06);

        bottom: -150px;
        left: -130px;
    }


    /* =========================
       MARCA
    ========================= */

    .brand {
        position: relative;
        z-index: 2;
    }


    .logo-container {
        width: 75px;
        height: 75px;

        background: white;

        border-radius: 20px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 25px;

        box-shadow:
            0 8px 25px rgba(0,0,0,.12);
    }

    .logo-image {
        width: 52px;
        height: 52px;
        object-fit: contain;
        display: block;
    }

    .logo-icon {
        color: #39A900;
        font-size: 38px;
        font-weight: 800;
    }


    .brand h1 {
        font-size: 42px;
        font-weight: 800;

        letter-spacing: -1px;

        margin-bottom: 15px;
    }


    .brand h1 span {
        color: #dfffcf;
    }


    .brand p {
        max-width: 390px;

        font-size: 16px;

        line-height: 1.7;

        color: rgba(255,255,255,.9);
    }


    /* =========================
       ILUSTRACIÓN
    ========================= */

    .illustration {
        position: relative;
        z-index: 2;

        height: 210px;

        display: flex;
        align-items: center;
        justify-content: center;
    }


    .illustration-circle {
        width: 180px;
        height: 180px;

        border-radius: 50%;

        background: rgba(255,255,255,.12);

        display: flex;
        align-items: center;
        justify-content: center;

        position: relative;
    }


    .illustration-circle::before {
        content: "";

        position: absolute;

        width: 130px;
        height: 130px;

        border-radius: 50%;

        background: rgba(255,255,255,.10);
    }


    .computer-icon {
        position: relative;
        z-index: 2;

        font-size: 85px;

        color: white;
    }


    .floating-icon {
        position: absolute;

        width: 48px;
        height: 48px;

        background: white;

        color: #39A900;

        border-radius: 15px;

        display: flex;
        align-items: center;
        justify-content: center;

        box-shadow:
            0 8px 20px rgba(0,0,0,.15);

        font-size: 22px;
    }


    .floating-one {
        top: 10px;
        left: 30px;
    }


    .floating-two {
        bottom: 10px;
        right: 30px;
    }


    .floating-three {
        top: 55px;
        right: 5px;
    }


    .institution-text {
        position: relative;
        z-index: 2;

        text-align: center;

        font-size: 13px;

        color: rgba(255,255,255,.8);
    }


    /* =========================
       PANEL DERECHO
    ========================= */

    .form-section {
        width: 52%;

        padding: 65px 75px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: white;
    }


    .form-container {
        width: 100%;
        max-width: 410px;
    }


    .form-header {
        margin-bottom: 35px;
    }


    .form-header h2 {
        color: #202820;

        font-size: 32px;

        font-weight: 750;

        margin-bottom: 8px;
    }


    .form-header p {
        color: #7a8278;

        font-size: 14px;
    }


    .form-header p span {
        color: #39A900;

        font-weight: 600;
    }


    /* =========================
       INPUTS
    ========================= */

    .input-group-custom {
        margin-bottom: 22px;
    }


    .input-group-custom label {
        display: block;

        color: #4a5148;

        font-size: 13px;

        font-weight: 600;

        margin-bottom: 8px;
    }


    .input-wrapper {
        position: relative;
    }


    .input-icon {
        position: absolute;

        left: 16px;
        top: 50%;

        transform: translateY(-50%);

        color: #8b9488;

        font-size: 17px;

        z-index: 2;
    }


    .custom-input {
        width: 100%;
        height: 52px;

        border: 1px solid #dce3da;

        border-radius: 11px;

        padding: 0 45px;

        font-size: 14px;

        color: #333;

        background: #fbfdfb;

        outline: none;

        transition: .25s;
    }


    .custom-input:focus {
        border-color: #39A900;

        background: white;

        box-shadow:
            0 0 0 4px rgba(57,169,0,.10);
    }


    .custom-input::placeholder {
        color: #a5aba3;
    }


    .password-toggle {
        position: absolute;

        right: 15px;
        top: 50%;

        transform: translateY(-50%);

        border: none;

        background: transparent;

        color: #8b9488;

        cursor: pointer;

        font-size: 17px;
    }


    .password-toggle:hover {
        color: #39A900;
    }


    /* =========================
       OPCIONES
    ========================= */

    .form-options {
        display: flex;

        justify-content: space-between;

        align-items: center;

        margin: 5px 0 28px;
    }


    .remember {
        display: flex;

        align-items: center;

        gap: 8px;

        font-size: 13px;

        color: #70776e;
    }


    .remember input {
        width: 15px;
        height: 15px;

        accent-color: #39A900;

        cursor: pointer;
    }


    .forgot-password {
        color: #39A900;

        font-size: 13px;

        font-weight: 600;

        text-decoration: none;
    }


    .forgot-password:hover {
        color: #247000;

        text-decoration: underline;
    }


    /* =========================
       BOTÓN
    ========================= */

    .btn-login {
        width: 100%;
        height: 52px;

        border: none;

        border-radius: 11px;

        background: #39A900;

        color: white;

        font-size: 15px;

        font-weight: 700;

        cursor: pointer;

        transition: .25s;

        box-shadow:
            0 8px 18px rgba(57,169,0,.20);
    }


    .btn-login:hover {
        background: #2f8f00;

        transform: translateY(-2px);

        box-shadow:
            0 12px 25px rgba(57,169,0,.28);
    }


    .btn-login i {
        margin-left: 8px;
    }


    /* =========================
       DIVISOR
    ========================= */

    .divider {
        display: flex;

        align-items: center;

        gap: 12px;

        margin: 30px 0 20px;
    }


    .divider::before,
    .divider::after {
        content: "";

        height: 1px;

        background: #e5e9e3;

        flex: 1;
    }


    .divider span {
        color: #a0a69e;

        font-size: 12px;
    }


    /* =========================
       FOOTER LOGIN
    ========================= */

    .form-footer {
        text-align: center;
    }


    .form-footer p {
        color: #8a9087;

        font-size: 13px;

        margin-bottom: 0;
    }


    .form-footer strong {
        color: #39A900;
    }


    .btn-volver {
    position: relative;
    z-index: 5;

    display: inline-flex;
    align-items: center;
    gap: 8px;

    width: fit-content;

    padding: 9px 16px;

    border: 1px solid rgba(255,255,255,.35);
    border-radius: 10px;

    color: white;
    background: rgba(255,255,255,.10);

    text-decoration: none;

    font-size: 13px;
    font-weight: 600;

    backdrop-filter: blur(5px);

    transition: .25s;
}

.btn-volver i {
    font-size: 16px;
}

.btn-volver:hover {
    background: white;
    color: #39A900;

    transform: translateX(-3px);
}

    .security-message {
        display: flex;

        align-items: center;

        justify-content: center;

        gap: 7px;

        margin-top: 25px;

        color: #90978e;

        font-size: 11px;
    }


    .security-message i {
        color: #39A900;
    }


    /* =========================
       ALERTAS
    ========================= */

    .alert-custom {
        border: none;

        border-radius: 10px;

        font-size: 13px;

        padding: 12px 15px;

        margin-bottom: 22px;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 900px) {

        .login-card {
            max-width: 600px;
        }

        .welcome-section {
            display: none;
        }

        .form-section {
            width: 100%;

            padding: 55px 50px;
        }
    }


    @media (max-width: 500px) {

        .login-page {
            padding: 20px 12px;
        }

        .login-card {
            min-height: auto;

            border-radius: 18px;
        }

        .form-section {
            padding: 40px 25px;
        }

        .form-header h2 {
            font-size: 27px;
        }

        .form-options {
            flex-direction: column;

            align-items: flex-start;

            gap: 12px;
        }
    }

</style>

@endsection

@endsection