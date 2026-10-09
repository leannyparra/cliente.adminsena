@extends('Layout.app')

@php
$nosotrosLayout = true;
@endphp

@section('title', 'Nosotros | AdminSENA')

@section('content')

<main class="adminsena-landing">

{{-- =====================================================
     HERO
====================================================== --}}
<section class="hero-section">

    <div class="hero-glow hero-glow-one"></div>
    <div class="hero-glow hero-glow-two"></div>

    <div class="container hero-container">

        <div class="hero-badge">
            <span class="hero-badge-icon">
                <i class="fa-solid fa-microchip"></i>
            </span>

            <span>
                Tecnología ADSO
            </span>

            <span class="hero-badge-dot"></span>
        </div>

        <h1 class="hero-title">
            Gestión inteligente para
            <span>ambientes de formación</span>
        </h1>

        <p class="hero-subtitle">
            Administra equipos, ambientes, fichas y recursos
            académicos desde una plataforma centralizada,
            moderna y fácil de utilizar.
        </p>

        <div class="hero-actions">

            <a href="#modulos" class="btn-primary-hero">
                <span>Explorar plataforma</span>
                <i class="fa-solid fa-arrow-down"></i>
            </a>

            <a href="#nosotros" class="btn-secondary-hero">
                <i class="fa-solid fa-circle-play"></i>
                Conoce AdminSENA
            </a>

        </div>

        <div class="hero-stats">

            <div class="hero-stat">
                <strong>
                    <i class="fa-solid fa-laptop"></i>
                </strong>
                <span>Gestión de equipos</span>
            </div>

            <div class="hero-stat-divider"></div>

            <div class="hero-stat">
                <strong>
                    <i class="fa-solid fa-calendar-check"></i>
                </strong>
                <span>Control de ambientes</span>
            </div>

            <div class="hero-stat-divider"></div>

            <div class="hero-stat">
                <strong>
                    <i class="fa-solid fa-users"></i>
                </strong>
                <span>Gestión académica</span>
            </div>

        </div>

    </div>

    <div class="hero-bottom-wave"></div>

</section>


{{-- =====================================================
     OFERTAS DE FORMACIÓN
====================================================== --}}
<section class="offers-section">

    <div class="container">

        <div class="section-heading-row">

            <div class="section-heading">

                <span class="section-eyebrow">
                    <i class="fa-solid fa-graduation-cap"></i>
                    FORMACIÓN SENA
                </span>

                <h2 class="offers-title">
                    Descubre nuevas
                    <span>oportunidades</span>
                </h2>

                <p class="offers-description">
                    Explora algunas de las ofertas de formación
                    disponibles y encuentra el programa que
                    más se adapte a tus objetivos.
                </p>

            </div>

            <a href="{{ url('/ofertas') }}" class="offers-all-btn">
                <span>Ver todas</span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>


        {{-- CARRUSEL --}}
        <div class="offers-carousel">

            <div class="offers-track" id="offersTrack">

                @forelse($offers as $index => $offer)

                    <div class="offer-slide {{ $index === 0 ? 'active' : '' }}">

                        @if($offer->image_url)

                            <img
                                src="{{ asset('storage/' . $offer->image_url) }}"
                                alt="Oferta {{ $offer->offer_number }}"
                            >

                        @else

                            <img
                                src="{{ asset('storage/main/home.jpg') }}"
                                alt="Oferta SENA"
                            >

                        @endif

                        <div class="offer-overlay"></div>

                        <div class="offer-decoration">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>

                        <div class="offer-info">

                            <div class="offer-top-line">

                                <span class="offer-tag">
                                    {{ $offer->course->area->name ?? 'Formación SENA' }}
                                </span>

                                <span class="offer-number">
                                    #{{ $offer->offer_number }}
                                </span>

                            </div>

                            <h3>
                                Ficha
                                {{ $offer->course->course_number ?? 'N/A' }}
                            </h3>

                            <p>
                                <i class="fa-solid fa-location-dot"></i>
                                {{ $offer->trainingCenter->name ?? 'Centro no disponible' }}
                            </p>

                            <button
                                type="button"
                                class="offer-action"
                                data-bs-toggle="modal"
                                data-bs-target="#offerModal{{ $offer->id }}"
                            >
                                Ver detalles
                                <span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </button>

                        </div>

                    </div>


                    {{-- =================================================
                         MODAL
                    ================================================== --}}
                    <div
                        class="modal fade"
                        id="offerModal{{ $offer->id }}"
                        tabindex="-1"
                        aria-labelledby="offerModalLabel{{ $offer->id }}"
                        aria-hidden="true"
                    >

                        <div class="modal-dialog modal-dialog-centered">

                            <div class="modal-content offer-modal">

                                <div class="modal-header offer-modal-header">

                                    <div>

                                        <span class="modal-mini-label">
                                            OFERTA DE FORMACIÓN
                                        </span>

                                        <h5
                                            class="modal-title"
                                            id="offerModalLabel{{ $offer->id }}"
                                        >
                                            Oferta #{{ $offer->offer_number }}
                                        </h5>

                                    </div>

                                    <button
                                        type="button"
                                        class="modal-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Cerrar"
                                    >
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>

                                </div>


                                <div class="modal-body">

                                    <div class="modal-status">
                                        <span class="status-dot"></span>
                                        {{ $offer->status }}
                                    </div>

                                    <div class="modal-course-title">

                                        <span>Ficha</span>

                                        <h4>
                                            {{ $offer->course->course_number ?? 'N/A' }}
                                        </h4>

                                    </div>


                                    <div class="offer-details-grid">

                                        <div class="offer-detail-card">

                                            <div class="detail-icon">
                                                <i class="fa-solid fa-building"></i>
                                            </div>

                                            <div>
                                                <small>Centro</small>
                                                <strong>
                                                    {{ $offer->trainingCenter->name ?? 'No disponible' }}
                                                </strong>
                                            </div>

                                        </div>


                                        <div class="offer-detail-card">

                                            <div class="detail-icon">
                                                <i class="fa-solid fa-layer-group"></i>
                                            </div>

                                            <div>
                                                <small>Área</small>
                                                <strong>
                                                    {{ $offer->course->area->name ?? 'No disponible' }}
                                                </strong>
                                            </div>

                                        </div>


                                        <div class="offer-detail-card">

                                            <div class="detail-icon">
                                                <i class="fa-solid fa-clock"></i>
                                            </div>

                                            <div>
                                                <small>Jornada</small>
                                                <strong>
                                                    {{ $offer->day }}
                                                </strong>
                                            </div>

                                        </div>


                                        <div class="offer-detail-card">

                                            <div class="detail-icon">
                                                <i class="fa-solid fa-laptop"></i>
                                            </div>

                                            <div>
                                                <small>Modalidad</small>
                                                <strong>
                                                    {{ $offer->modality }}
                                                </strong>
                                            </div>

                                        </div>


                                        <div class="offer-detail-card">

                                            <div class="detail-icon">
                                                <i class="fa-solid fa-calendar"></i>
                                            </div>

                                            <div>
                                                <small>Inicio</small>
                                                <strong>
                                                    {{ \Carbon\Carbon::parse($offer->start_date)->format('d/m/Y') }}
                                                </strong>
                                            </div>

                                        </div>


                                        <div class="offer-detail-card">

                                            <div class="detail-icon">
                                                <i class="fa-solid fa-calendar-check"></i>
                                            </div>

                                            <div>
                                                <small>Finalización</small>
                                                <strong>
                                                    {{ \Carbon\Carbon::parse($offer->end_date)->format('d/m/Y') }}
                                                </strong>
                                            </div>

                                        </div>

                                    </div>


                                    <div class="quota-box">

                                        <div class="quota-icon">
                                            <i class="fa-solid fa-users"></i>
                                        </div>

                                        <div>
                                            <small>Cupos disponibles</small>
                                            <strong>
                                                {{ $offer->available_quota }}
                                            </strong>
                                        </div>

                                        <span class="quota-arrow">
                                            <i class="fa-solid fa-check"></i>
                                        </span>

                                    </div>

                                </div>


                                <div class="modal-footer offer-modal-footer">

                                    <button
                                        type="button"
                                        class="modal-close-btn"
                                        data-bs-dismiss="modal"
                                    >
                                        Cerrar
                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="offer-slide active empty-offer">

                        <div class="empty-offer-content">

                            <div class="empty-offer-icon">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>

                            <h3>
                                No hay ofertas disponibles
                            </h3>

                            <p>
                                Actualmente no hay ofertas de formación activas.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>


            @if(count($offers) > 1)

                <button
                    type="button"
                    class="offer-arrow offer-arrow-left"
                    id="offerPrev"
                    aria-label="Oferta anterior"
                >
                    <i class="fa-solid fa-chevron-left"></i>
                </button>


                <button
                    type="button"
                    class="offer-arrow offer-arrow-right"
                    id="offerNext"
                    aria-label="Siguiente oferta"
                >
                    <i class="fa-solid fa-chevron-right"></i>
                </button>


                <div class="offer-dots">

                    @foreach($offers as $index => $offer)

                        <button
                            type="button"
                            class="offer-dot {{ $index === 0 ? 'active' : '' }}"
                            data-slide="{{ $index }}"
                            aria-label="Ver oferta {{ $index + 1 }}"
                        ></button>

                    @endforeach

                </div>

            @endif

        </div>

    </div>

</section>


{{-- =====================================================
     ¿QUÉ ES ADMINSENA?
====================================================== --}}
<section id="nosotros" class="welcome-section">

    <div class="container welcome-container">

        <div class="welcome-image-wrapper">

            <div class="image-background-decoration"></div>

            <div class="main-image-card">

                <div class="image-top-label">
                    <span class="live-dot"></span>
                    Plataforma de gestión
                </div>

                <img
                    src="{{ asset('storage/main/queES.jpg') }}"
                    alt="Ambiente de Formación SENA"
                    class="img-fluid-rounded"
                >

                <div class="image-bottom-info">

                    <div class="image-info-icon">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>

                    <div>
                        <strong>Gestión organizada</strong>
                        <span>Todo en un solo lugar</span>
                    </div>

                </div>

            </div>

        </div>


        <div class="welcome-text-content">

            <span class="section-eyebrow">
                <i class="fa-solid fa-circle-info"></i>
                CONOCE NUESTRA PLATAFORMA
            </span>

            <h2 class="section-title">
                Una forma más
                <span>inteligente de gestionar</span>
            </h2>

            <p class="section-paragraph">

                AdminSENA es una solución interactiva diseñada
                para optimizar los procesos de gestión académica
                y tecnológica del centro de formación.

            </p>

            <p class="section-paragraph">

                La plataforma permite llevar un control organizado
                de los equipos, ambientes, fichas e información
                necesaria para facilitar el trabajo de coordinadores
                e instructores.

            </p>


            <div class="welcome-features">

                <div class="welcome-feature">

                    <div class="feature-icon">
                        <i class="fa-solid fa-bolt"></i>
                    </div>

                    <div>
                        <strong>Procesos ágiles</strong>
                        <span>Reduce tareas manuales y organiza la información.</span>
                    </div>

                </div>


                <div class="welcome-feature">

                    <div class="feature-icon">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>

                    <div>
                        <strong>Mayor control</strong>
                        <span>Consulta y administra los recursos fácilmente.</span>
                    </div>

                </div>

            </div>


            <div class="welcome-buttons">

                <a href="#modulos" class="btn-green-dark">

                    <span>Conocer la plataforma</span>

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

                <a href="#" class="link-simple">

                    <i class="fa-solid fa-book-open"></i>

                    Ver manual de uso

                </a>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     PILARES
====================================================== --}}
<section id="modulos" class="cards-section">

    <div class="container">

        <div class="cards-heading">

            <span class="section-eyebrow center">
                <i class="fa-solid fa-layer-group"></i>
                NUESTRA PLATAFORMA
            </span>

            <h2 class="grid-section-title">
                Todo lo que necesitas,
                <span>en un solo lugar</span>
            </h2>

            <p class="cards-heading-description">
                AdminSENA integra diferentes procesos para hacer
                que la gestión del centro sea más organizada,
                eficiente y sencilla.
            </p>

        </div>


        <div class="rounded-cards-grid">


            {{-- TARJETA 1 --}}
            <article class="rounded-card">

                <div class="card-image-wrapper">

                    <img
                        src="{{ asset('storage/main/mision.jpg') }}"
                        alt="Misión"
                        class="card-img"
                    >

                    <div class="card-number">
                        01
                    </div>

                    <div class="card-icon">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>

                </div>

                <div class="card-body-content">

                    <span class="card-label">
                        PROPÓSITO
                    </span>

                    <h3>
                        Misión del Sistema
                    </h3>

                    <p>
                        Asegurar la trazabilidad física y lógica
                        de los equipos asignados a la tecnología
                        ADSO, garantizando una gestión organizada
                        y coordinada.
                    </p>

                    <div class="card-line"></div>

                </div>

            </article>


            {{-- TARJETA 2 --}}
            <article class="rounded-card">

                <div class="card-image-wrapper">

                    <img
                        src="{{ asset('storage/main/vision.jpg') }}"
                        alt="Visión"
                        class="card-img"
                    >

                    <div class="card-number">
                        02
                    </div>

                    <div class="card-icon">
                        <i class="fa-solid fa-eye"></i>
                    </div>

                </div>

                <div class="card-body-content">

                    <span class="card-label">
                        PROYECCIÓN
                    </span>

                    <h3>
                        Visión y Futuro
                    </h3>

                    <p>
                        Expandir el control a todos los ambientes
                        del centro de formación, consolidando un
                        ecosistema tecnológico escalable.
                    </p>

                    <div class="card-line"></div>

                </div>

            </article>


            {{-- TARJETA 3 --}}
            <article class="rounded-card">

                <div class="card-image-wrapper">

                    <img
                        src="{{ asset('storage/main/gestion.jpg') }}"
                        alt="Gestión"
                        class="card-img"
                    >

                    <div class="card-number">
                        03
                    </div>

                    <div class="card-icon">
                        <i class="fa-solid fa-chart-pie"></i>
                    </div>

                </div>

                <div class="card-body-content">

                    <span class="card-label">
                        ORGANIZACIÓN
                    </span>

                    <h3>
                        Gestión de Fichas
                    </h3>

                    <p>
                        Organizar de forma ágil los horarios,
                        aprendices e instructores asignados
                        a cada ambiente de computación.
                    </p>

                    <div class="card-line"></div>

                </div>

            </article>

        </div>

    </div>

</section>


{{-- =====================================================
     BOTÓN VOLVER ARRIBA
====================================================== --}}
<button
    id="btnVolverArriba"
    class="btn-scroll-top"
    title="Volver al inicio"
    aria-label="Volver arriba"
>
    <i class="fa-solid fa-arrow-up"></i>
</button>

</main>

{{-- =========================================================
JAVASCRIPT
========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       VOLVER ARRIBA
    ===================================================== */

    const btnVolverArriba =
        document.getElementById('btnVolverArriba');

    if (btnVolverArriba) {

        window.addEventListener('scroll', function () {

            if (window.scrollY > 450) {

                btnVolverArriba.classList.add('show');

            } else {

                btnVolverArriba.classList.remove('show');

            }

        });


        btnVolverArriba.addEventListener('click', function () {

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

        });

    }


    /* =====================================================
       CARRUSEL DE OFERTAS
    ===================================================== */

    const slides =
        document.querySelectorAll('.offer-slide');

    const dots =
        document.querySelectorAll('.offer-dot');

    const btnPrev =
        document.getElementById('offerPrev');

    const btnNext =
        document.getElementById('offerNext');


    if (slides.length > 1) {

        let currentSlide = 0;
        let autoplay;


        function showSlide(index) {

            if (index >= slides.length) {
                index = 0;
            }

            if (index < 0) {
                index = slides.length - 1;
            }


            slides.forEach(function (slide) {

                slide.classList.remove('active');

            });


            dots.forEach(function (dot) {

                dot.classList.remove('active');

            });


            slides[index].classList.add('active');


            if (dots[index]) {

                dots[index].classList.add('active');

            }


            currentSlide = index;

        }


        function nextSlide() {

            showSlide(currentSlide + 1);

        }


        function previousSlide() {

            showSlide(currentSlide - 1);

        }


        function startAutoplay() {

            clearInterval(autoplay);

            autoplay = setInterval(function () {

                nextSlide();

            }, 6000);

        }


        function restartAutoplay() {

            clearInterval(autoplay);

            startAutoplay();

        }


        if (btnNext) {

            btnNext.addEventListener('click', function () {

                nextSlide();
                restartAutoplay();

            });

        }


        if (btnPrev) {

            btnPrev.addEventListener('click', function () {

                previousSlide();
                restartAutoplay();

            });

        }


        dots.forEach(function (dot, index) {

            dot.addEventListener('click', function () {

                showSlide(index);
                restartAutoplay();

            });

        });


        showSlide(0);

        startAutoplay();

    }

});

</script>

<style>

/* =========================================================
   VARIABLES
========================================================= */

:root {

    --adminsena-green: #39a900;
    --adminsena-green-dark: #247500;
    --adminsena-green-deep: #185600;
    --adminsena-green-soft: #eaf7e4;

    --adminsena-white: #ffffff;
    --adminsena-bg: #f6f9f5;

    --adminsena-text: #17251c;
    --adminsena-text-soft: #647067;

    --adminsena-border: #e5ebe5;

    --adminsena-shadow:
        0 20px 60px rgba(24, 86, 0, .10);

}


/* =========================================================
   GENERAL
========================================================= */

.adminsena-landing {

    background:
        var(--adminsena-bg);

    color:
        var(--adminsena-text);

    font-family:
        'Segoe UI',
        system-ui,
        -apple-system,
        BlinkMacSystemFont,
        sans-serif;

    overflow-x:
        hidden;

}


.adminsena-landing .container {

    width:
        min(1200px, calc(100% - 40px));

    margin:
        0 auto;

}


/* =========================================================
   HERO
========================================================= */

.hero-section {

    position:
        relative;

    min-height:
        650px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    overflow:
        hidden;

    color:
        white;

    background:

        linear-gradient(
            125deg,
            rgba(18, 67, 0, .96),
            rgba(39, 111, 0, .90)
        ),

        url('{{ asset('storage/main/home.jpg') }}')

        center / cover
        no-repeat;

    border-radius:
        0 0 55px 55px;

}


.hero-container {

    position:
        relative;

    z-index:
        3;

    display:
        flex;

    flex-direction:
        column;

    align-items:
        center;

    text-align:
        center;

    padding:
        100px 0 120px;

}


.hero-glow {

    position:
        absolute;

    width:
        450px;

    height:
        450px;

    border-radius:
        50%;

    background:
        rgba(112, 218, 55, .12);

    filter:
        blur(5px);

    pointer-events:
        none;

}


.hero-glow-one {

    top:
        -220px;

    right:
        -100px;

}


.hero-glow-two {

    bottom:
        -250px;

    left:
        -120px;

}


.hero-badge {

    display:
        inline-flex;

    align-items:
        center;

    gap:
        10px;

    padding:
        7px 15px 7px 7px;

    border:
        1px solid rgba(255,255,255,.25);

    border-radius:
        50px;

    background:
        rgba(255,255,255,.10);

    backdrop-filter:
        blur(12px);

    font-size:
        .82rem;

    font-weight:
        700;

    letter-spacing:
        .5px;

    margin-bottom:
        25px;

}


.hero-badge-icon {

    width:
        31px;

    height:
        31px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        50%;

    background:
        rgba(255,255,255,.20);

}


.hero-badge-dot {

    width:
        7px;

    height:
        7px;

    border-radius:
        50%;

    background:
        #9df36f;

    box-shadow:
        0 0 0 5px rgba(157,243,111,.12);

}


.hero-title {

    max-width:
        900px;

    margin:
        0;

    font-size:
        clamp(2.5rem, 5vw, 4.5rem);

    line-height:
        1.05;

    font-weight:
        850;

    letter-spacing:
        -2px;

}


.hero-title span {

    display:
        block;

    color:
        #a9ed83;

}


.hero-subtitle {

    max-width:
        720px;

    margin:
        25px 0 0;

    font-size:
        1.12rem;

    line-height:
        1.75;

    color:
        rgba(255,255,255,.82);

}


.hero-actions {

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    gap:
        14px;

    margin-top:
        32px;

}


.btn-primary-hero,
.btn-secondary-hero {

    display:
        inline-flex;

    align-items:
        center;

    justify-content:
        center;

    gap:
        10px;

    min-height:
        50px;

    padding:
        0 22px;

    border-radius:
        15px;

    text-decoration:
        none;

    font-weight:
        750;

    transition:
        .3s ease;

}


.btn-primary-hero {

    color:
        var(--adminsena-green-deep);

    background:
        white;

    box-shadow:
        0 12px 30px rgba(0,0,0,.15);

}


.btn-primary-hero:hover {

    color:
        var(--adminsena-green-deep);

    transform:
        translateY(-4px);

    box-shadow:
        0 18px 35px rgba(0,0,0,.22);

}


.btn-primary-hero i {

    transition:
        transform .3s;

}


.btn-primary-hero:hover i {

    transform:
        translateY(3px);

}


.btn-secondary-hero {

    color:
        white;

    border:
        1px solid rgba(255,255,255,.25);

    background:
        rgba(255,255,255,.08);

    backdrop-filter:
        blur(10px);

}


.btn-secondary-hero:hover {

    color:
        white;

    background:
        rgba(255,255,255,.16);

    transform:
        translateY(-4px);

}


.hero-stats {

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    margin-top:
        55px;

    padding:
        17px 24px;

    border:
        1px solid rgba(255,255,255,.15);

    border-radius:
        18px;

    background:
        rgba(0,0,0,.12);

    backdrop-filter:
        blur(10px);

}


.hero-stat {

    display:
        flex;

    align-items:
        center;

    gap:
        9px;

    padding:
        0 20px;

    color:
        rgba(255,255,255,.84);

    font-size:
        .82rem;

    font-weight:
        600;

}


.hero-stat strong {

    color:
        #a9ed83;

    font-size:
        1rem;

}


.hero-stat-divider {

    width:
        1px;

    height:
        25px;

    background:
        rgba(255,255,255,.20);

}


.hero-bottom-wave {

    position:
        absolute;

    left:
        -5%;

    bottom:
        -60px;

    width:
        110%;

    height:
        120px;

    background:
        var(--adminsena-bg);

    border-radius:
        50% 50% 0 0 / 100% 100% 0 0;

}


/* =========================================================
   SECTION HEADINGS
========================================================= */

.section-eyebrow {

    display:
        inline-flex;

    align-items:
        center;

    gap:
        8px;

    color:
        var(--adminsena-green);

    font-size:
        .76rem;

    font-weight:
        850;

    letter-spacing:
        1.5px;

    margin-bottom:
        10px;

}


.section-eyebrow.center {

    justify-content:
        center;

}


.offers-title,
.section-title,
.grid-section-title {

    margin:
        0;

    font-weight:
        850;

    letter-spacing:
        -1px;

}


.offers-title span,
.section-title span,
.grid-section-title span {

    color:
        var(--adminsena-green);

}


/* =========================================================
   OFFERS
========================================================= */

.offers-section {

    position:
        relative;

    padding:
        35px 0 90px;

}


.section-heading-row {

    display:
        flex;

    align-items:
        flex-end;

    justify-content:
        space-between;

    gap:
        30px;

    margin-bottom:
        30px;

}


.offers-title {

    max-width:
        650px;

    font-size:
        clamp(2rem, 4vw, 2.7rem);

    line-height:
        1.1;

}


.offers-description {

    max-width:
        650px;

    margin:
        14px 0 0;

    color:
        var(--adminsena-text-soft);

    line-height:
        1.7;

}


.offers-all-btn {

    display:
        inline-flex;

    align-items:
        center;

    gap:
        12px;

    padding:
        13px 18px;

    border-radius:
        14px;

    background:
        var(--adminsena-green);

    color:
        white;

    text-decoration:
        none;

    font-size:
        .88rem;

    font-weight:
        750;

    white-space:
        nowrap;

    box-shadow:
        0 10px 25px rgba(57,169,0,.18);

    transition:
        .3s;

}


.offers-all-btn:hover {

    background:
        var(--adminsena-green-dark);

    color:
        white;

    transform:
        translateY(-3px);

}


.offers-all-btn i {

    transition:
        transform .3s;

}


.offers-all-btn:hover i {

    transform:
        translateX(4px);

}


/* =========================================================
   OFFER CAROUSEL
========================================================= */

.offers-carousel {

    position:
        relative;

    height:
        470px;

    overflow:
        hidden;

    border-radius:
        30px;

    background:
        #174e00;

    box-shadow:
        var(--adminsena-shadow);

}


.offers-track {

    position:
        relative;

    width:
        100%;

    height:
        100%;

}


.offer-slide {

    position:
        absolute;

    inset:
        0;

    opacity:
        0;

    visibility:
        hidden;

    transform:
        scale(1.035);

    transition:
        opacity .65s ease,
        transform .8s ease,
        visibility .65s;

}


.offer-slide.active {

    opacity:
        1;

    visibility:
        visible;

    transform:
        scale(1);

}


.offer-slide > img {

    width:
        100%;

    height:
        100%;

    display:
        block;

    object-fit:
        cover;

}


.offer-overlay {

    position:
        absolute;

    inset:
        0;

    background:

        linear-gradient(
            90deg,
            rgba(5,20,2,.92) 0%,
            rgba(10,30,4,.72) 38%,
            rgba(10,20,4,.18) 100%
        );

}


.offer-decoration {

    position:
        absolute;

    top:
        45px;

    right:
        70px;

    width:
        110px;

    height:
        110px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border:
        1px solid rgba(255,255,255,.13);

    border-radius:
        50%;

    color:
        rgba(255,255,255,.12);

    font-size:
        3rem;

}


.offer-info {

    position:
        absolute;

    z-index:
        2;

    left:
        60px;

    bottom:
        65px;

    max-width:
        650px;

    color:
        white;

}


.offer-top-line {

    display:
        flex;

    align-items:
        center;

    gap:
        12px;

    margin-bottom:
        16px;

}


.offer-tag {

    display:
        inline-flex;

    padding:
        7px 13px;

    border-radius:
        9px;

    background:
        var(--adminsena-green);

    color:
        white;

    font-size:
        .7rem;

    font-weight:
        850;

    text-transform:
        uppercase;

    letter-spacing:
        .6px;

}


.offer-number {

    color:
        rgba(255,255,255,.55);

    font-size:
        .75rem;

    font-weight:
        700;

}


.offer-info h3 {

    margin:
        0 0 13px;

    font-size:
        clamp(2rem, 4vw, 3.1rem);

    line-height:
        1.05;

    font-weight:
        850;

    letter-spacing:
        -1px;

}


.offer-info p {

    display:
        flex;

    align-items:
        center;

    gap:
        8px;

    margin:
        0 0 22px;

    color:
        rgba(255,255,255,.78);

    font-size:
        .95rem;

}


.offer-info p i {

    color:
        #8fe067;

}


.offer-action {

    display:
        inline-flex;

    align-items:
        center;

    gap:
        12px;

    padding:
        5px 6px 5px 16px;

    border:
        1px solid rgba(255,255,255,.22);

    border-radius:
        50px;

    background:
        rgba(255,255,255,.09);

    color:
        white;

    font-size:
        .82rem;

    font-weight:
        750;

    backdrop-filter:
        blur(10px);

    cursor:
        pointer;

    transition:
        .3s;

}


.offer-action span {

    width:
        35px;

    height:
        35px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        50%;

    background:
        white;

    color:
        var(--adminsena-green-dark);

    transition:
        .3s;

}


.offer-action:hover {

    background:
        var(--adminsena-green);

    border-color:
        var(--adminsena-green);

}


.offer-action:hover span {

    transform:
        rotate(-45deg);

}


/* =========================================================
   CAROUSEL BUTTONS
========================================================= */

.offer-arrow {

    position:
        absolute;

    z-index:
        10;

    top:
        50%;

    width:
        48px;

    height:
        48px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border:
        1px solid rgba(255,255,255,.22);

    border-radius:
        50%;

    background:
        rgba(0,0,0,.18);

    color:
        white;

    backdrop-filter:
        blur(8px);

    cursor:
        pointer;

    transform:
        translateY(-50%);

    transition:
        .3s;

}


.offer-arrow:hover {

    background:
        var(--adminsena-green);

    border-color:
        var(--adminsena-green);

    transform:
        translateY(-50%) scale(1.08);

}


.offer-arrow-left {

    left:
        18px;

}


.offer-arrow-right {

    right:
        18px;

}


.offer-dots {

    position:
        absolute;

    z-index:
        10;

    bottom:
        22px;

    left:
        50%;

    display:
        flex;

    align-items:
        center;

    gap:
        7px;

    transform:
        translateX(-50%);

}


.offer-dot {

    width:
        7px;

    height:
        7px;

    padding:
        0;

    border:
        0;

    border-radius:
        50%;

    background:
        rgba(255,255,255,.40);

    cursor:
        pointer;

    transition:
        .3s;

}


.offer-dot.active {

    width:
        27px;

    border-radius:
        20px;

    background:
        white;

}


/* =========================================================
   EMPTY OFFER
========================================================= */

.empty-offer {

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    background:
        linear-gradient(
            135deg,
            var(--adminsena-green-deep),
            var(--adminsena-green)
        );

}


.empty-offer-content {

    text-align:
        center;

    color:
        white;

}


.empty-offer-icon {

    width:
        80px;

    height:
        80px;

    margin:
        0 auto 20px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border:
        1px solid rgba(255,255,255,.2);

    border-radius:
        24px;

    background:
        rgba(255,255,255,.10);

    font-size:
        2rem;

}


.empty-offer-content h3 {

    margin:
        0 0 8px;

    font-weight:
        800;

}


.empty-offer-content p {

    margin:
        0;

    color:
        rgba(255,255,255,.75);

}


/* =========================================================
   WELCOME
========================================================= */

.welcome-section {

    position:
        relative;

    padding:
        80px 0;

    background:
        white;

}


.welcome-container {

    display:
        grid;

    grid-template-columns:
        .9fr 1.1fr;

    align-items:
        center;

    gap:
        80px;

}


.welcome-image-wrapper {

    position:
        relative;

    padding:
        25px;

}


.image-background-decoration {

    position:
        absolute;

    inset:
        5px 5px 5px 5px;

    border:
        2px dashed #bce6a8;

    border-radius:
        35px;

    transform:
        rotate(-4deg);

}


.main-image-card {

    position:
        relative;

    z-index:
        2;

    padding:
        10px;

    border:
        1px solid var(--adminsena-border);

    border-radius:
        28px;

    background:
        white;

    box-shadow:
        0 25px 60px rgba(24,86,0,.12);

}


.img-fluid-rounded {

    width:
        100%;

    height:
        350px;

    display:
        block;

    object-fit:
        cover;

    border-radius:
        20px;

}


.image-top-label {

    position:
        absolute;

    z-index:
        3;

    top:
        -16px;

    left:
        25px;

    display:
        flex;

    align-items:
        center;

    gap:
        8px;

    padding:
        9px 14px;

    border:
        1px solid #e1eadf;

    border-radius:
        50px;

    background:
        white;

    box-shadow:
        0 8px 20px rgba(0,0,0,.08);

    color:
        var(--adminsena-text);

    font-size:
        .75rem;

    font-weight:
        750;

}


.live-dot {

    width:
        8px;

    height:
        8px;

    border-radius:
        50%;

    background:
        var(--adminsena-green);

    box-shadow:
        0 0 0 5px var(--adminsena-green-soft);

}


.image-bottom-info {

    position:
        absolute;

    z-index:
        3;

    right:
        25px;

    bottom:
        -18px;

    display:
        flex;

    align-items:
        center;

    gap:
        10px;

    padding:
        11px 15px;

    border:
        1px solid #e1eadf;

    border-radius:
        15px;

    background:
        white;

    box-shadow:
        0 10px 25px rgba(0,0,0,.10);

}


.image-info-icon {

    width:
        38px;

    height:
        38px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        11px;

    background:
        var(--adminsena-green-soft);

    color:
        var(--adminsena-green);

}


.image-bottom-info div:last-child {

    display:
        flex;

    flex-direction:
        column;

}


.image-bottom-info strong {

    font-size:
        .78rem;

}


.image-bottom-info span {

    color:
        var(--adminsena-text-soft);

    font-size:
        .68rem;

}


/* =========================================================
   WELCOME TEXT
========================================================= */

.welcome-text-content {

    max-width:
        650px;

}


.section-title {

    font-size:
        clamp(2rem, 4vw, 3rem);

    line-height:
        1.1;

}


.section-paragraph {

    margin:
        18px 0 0;

    color:
        var(--adminsena-text-soft);

    font-size:
        1rem;

    line-height:
        1.8;

}


.welcome-features {

    display:
        grid;

    grid-template-columns:
        repeat(2, 1fr);

    gap:
        15px;

    margin:
        28px 0;

}


.welcome-feature {

    display:
        flex;

    align-items:
        flex-start;

    gap:
        12px;

    padding:
        15px;

    border:
        1px solid var(--adminsena-border);

    border-radius:
        16px;

    background:
        #fbfdfb;

}


.feature-icon {

    flex:
        0 0 38px;

    width:
        38px;

    height:
        38px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        11px;

    background:
        var(--adminsena-green-soft);

    color:
        var(--adminsena-green);

}


.welcome-feature div:last-child {

    display:
        flex;

    flex-direction:
        column;

    gap:
        3px;

}


.welcome-feature strong {

    font-size:
        .82rem;

}


.welcome-feature span {

    color:
        var(--adminsena-text-soft);

    font-size:
        .72rem;

    line-height:
        1.5;

}


.welcome-buttons {

    display:
        flex;

    align-items:
        center;

    gap:
        22px;

    margin-top:
        25px;

}


.btn-green-dark {

    display:
        inline-flex;

    align-items:
        center;

    gap:
        12px;

    padding:
        13px 18px;

    border-radius:
        14px;

    background:
        var(--adminsena-green-deep);

    color:
        white;

    text-decoration:
        none;

    font-size:
        .85rem;

    font-weight:
        750;

    box-shadow:
        0 10px 25px rgba(24,86,0,.16);

    transition:
        .3s;

}


.btn-green-dark:hover {

    background:
        var(--adminsena-green);

    color:
        white;

    transform:
        translateY(-3px);

}


.link-simple {

    display:
        inline-flex;

    align-items:
        center;

    gap:
        8px;

    color:
        var(--adminsena-text);

    text-decoration:
        none;

    font-size:
        .82rem;

    font-weight:
        700;

    transition:
        .3s;

}


.link-simple:hover {

    color:
        var(--adminsena-green);

}


/* =========================================================
   CARDS SECTION
========================================================= */

.cards-section {

    padding:
        90px 0 110px;

    background:
        var(--adminsena-bg);

}


.cards-heading {

    max-width:
        720px;

    margin:
        0 auto 45px;

    text-align:
        center;

}


.grid-section-title {

    font-size:
        clamp(2rem, 4vw, 2.8rem);

    line-height:
        1.1;

}


.cards-heading-description {

    margin:
        15px auto 0;

    color:
        var(--adminsena-text-soft);

    font-size:
        .95rem;

    line-height:
        1.7;

}


/* =========================================================
   CARDS
========================================================= */

.rounded-cards-grid {

    display:
        grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap:
        25px;

}


.rounded-card {

    position:
        relative;

    overflow:
        hidden;

    border:
        1px solid var(--adminsena-border);

    border-radius:
        27px;

    background:
        white;

    box-shadow:
        0 10px 35px rgba(24,86,0,.05);

    transition:
        transform .35s ease,
        box-shadow .35s ease;

}


.rounded-card:hover {

    transform:
        translateY(-9px);

    box-shadow:
        0 25px 50px rgba(24,86,0,.12);

}


.card-image-wrapper {

    position:
        relative;

    overflow:
        hidden;

    height:
        220px;

}


.card-img {

    width:
        100%;

    height:
        100%;

    object-fit:
        cover;

    display:
        block;

    transition:
        transform .6s ease;

}


.rounded-card:hover .card-img {

    transform:
        scale(1.06);

}


.card-image-wrapper::after {

    content:
        '';

    position:
        absolute;

    inset:
        0;

    background:
        linear-gradient(
            to top,
            rgba(0,0,0,.45),
            transparent 55%
        );

}


.card-number {

    position:
        absolute;

    z-index:
        2;

    top:
        15px;

    left:
        15px;

    padding:
        6px 10px;

    border:
        1px solid rgba(255,255,255,.20);

    border-radius:
        10px;

    background:
        rgba(0,0,0,.25);

    color:
        white;

    backdrop-filter:
        blur(8px);

    font-size:
        .7rem;

    font-weight:
        800;

}


.card-icon {

    position:
        absolute;

    z-index:
        3;

    right:
        17px;

    bottom:
        -19px;

    width:
        52px;

    height:
        52px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border:
        4px solid white;

    border-radius:
        16px;

    background:
        var(--adminsena-green);

    color:
        white;

    box-shadow:
        0 8px 20px rgba(0,0,0,.12);

}


.card-body-content {

    padding:
        35px 24px 25px;

}


.card-label {

    color:
        var(--adminsena-green);

    font-size:
        .65rem;

    font-weight:
        850;

    letter-spacing:
        1.3px;

}


.card-body-content h3 {

    margin:
        8px 0 10px;

    font-size:
        1.35rem;

    font-weight:
        800;

}


.card-body-content p {

    margin:
        0;

    color:
        var(--adminsena-text-soft);

    font-size:
        .88rem;

    line-height:
        1.7;

}


.card-line {

    width:
        35px;

    height:
        3px;

    margin-top:
        22px;

    border-radius:
        5px;

    background:
        var(--adminsena-green);

    transition:
        width .3s;

}


.rounded-card:hover .card-line {

    width:
        65px;

}


/* =========================================================
   MODAL
========================================================= */

.offer-modal {

    overflow:
        hidden;

    border:
        0;

    border-radius:
        25px;

    box-shadow:
        0 30px 80px rgba(0,0,0,.20);

}


.offer-modal-header {

    display:
        flex;

    align-items:
        center;

    justify-content:
        space-between;

    padding:
        25px;

    border-bottom:
        1px solid var(--adminsena-border);

}


.modal-mini-label {

    display:
        block;

    margin-bottom:
        4px;

    color:
        var(--adminsena-green);

    font-size:
        .65rem;

    font-weight:
        850;

    letter-spacing:
        1.2px;

}


.offer-modal .modal-title {

    color:
        var(--adminsena-text);

    font-size:
        1.45rem;

    font-weight:
        850;

}


.modal-close {

    width:
        38px;

    height:
        38px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border:
        0;

    border-radius:
        12px;

    background:
        #f1f4f1;

    color:
        var(--adminsena-text-soft);

    cursor:
        pointer;

    transition:
        .25s;

}


.modal-close:hover {

    background:
        #e6eee4;

    color:
        var(--adminsena-green-dark);

}


.offer-modal .modal-body {

    padding:
        25px;

}


.modal-status {

    display:
        inline-flex;

    align-items:
        center;

    gap:
        7px;

    padding:
        7px 11px;

    border-radius:
        30px;

    background:
        var(--adminsena-green-soft);

    color:
        var(--adminsena-green-dark);

    font-size:
        .72rem;

    font-weight:
        800;

}


.status-dot {

    width:
        7px;

    height:
        7px;

    border-radius:
        50%;

    background:
        var(--adminsena-green);

}


.modal-course-title {

    margin:
        20px 0;

}


.modal-course-title span {

    color:
        var(--adminsena-text-soft);

    font-size:
        .75rem;

}


.modal-course-title h4 {

    margin:
        3px 0 0;

    color:
        var(--adminsena-text);

    font-size:
        1.8rem;

    font-weight:
        850;

}


.offer-details-grid {

    display:
        grid;

    grid-template-columns:
        repeat(2, 1fr);

    gap:
        12px;

}


.offer-detail-card {

    display:
        flex;

    align-items:
        center;

    gap:
        11px;

    padding:
        13px;

    border:
        1px solid var(--adminsena-border);

    border-radius:
        14px;

    background:
        #fbfdfb;

}


.detail-icon {

    flex:
        0 0 36px;

    width:
        36px;

    height:
        36px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        10px;

    background:
        var(--adminsena-green-soft);

    color:
        var(--adminsena-green);

}


.offer-detail-card div:last-child {

    min-width:
        0;

    display:
        flex;

    flex-direction:
        column;

    gap:
        3px;

}


.offer-detail-card small {

    color:
        var(--adminsena-text-soft);

    font-size:
        .65rem;

}


.offer-detail-card strong {

    overflow:
        hidden;

    color:
        var(--adminsena-text);

    font-size:
        .72rem;

    text-overflow:
        ellipsis;

}


.quota-box {

    display:
        flex;

    align-items:
        center;

    gap:
        12px;

    margin-top:
        14px;

    padding:
        14px;

    border-radius:
        15px;

    background:
        linear-gradient(
            135deg,
            #eff9e9,
            #e5f5dd
        );

}


.quota-icon {

    width:
        40px;

    height:
        40px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        12px;

    background:
        white;

    color:
        var(--adminsena-green);

}


.quota-box div:nth-child(2) {

    display:
        flex;

    flex-direction:
        column;

}


.quota-box small {

    color:
        var(--adminsena-text-soft);

    font-size:
        .65rem;

}


.quota-box strong {

    color:
        var(--adminsena-green-dark);

    font-size:
        1.1rem;

}


.quota-arrow {

    margin-left:
        auto;

    width:
        30px;

    height:
        30px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        50%;

    background:
        white;

    color:
        var(--adminsena-green);

    font-size:
        .7rem;

}


.offer-modal-footer {

    padding:
        18px 25px;

    border-top:
        1px solid var(--adminsena-border);

}


.modal-close-btn {

    padding:
        10px 18px;

    border:
        0;

    border-radius:
        11px;

    background:
        #edf0ed;

    color:
        var(--adminsena-text);

    font-size:
        .78rem;

    font-weight:
        750;

    cursor:
        pointer;

    transition:
        .25s;

}


.modal-close-btn:hover {

    background:
        #e0e7df;

}


/* =========================================================
   SCROLL TOP
========================================================= */

.btn-scroll-top {

    position:
        fixed;

    z-index:
        1050;

    right:
        25px;

    bottom:
        25px;

    width:
        48px;

    height:
        48px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border:
        1px solid rgba(255,255,255,.25);

    border-radius:
        15px;

    background:
        rgba(39,111,0,.78);

    color:
        white;

    backdrop-filter:
        blur(10px);

    box-shadow:
        0 12px 30px rgba(0,0,0,.16);

    cursor:
        pointer;

    opacity:
        0;

    visibility:
        hidden;

    transform:
        translateY(15px);

    transition:
        .3s;

}


.btn-scroll-top.show {

    opacity:
        1;

    visibility:
        visible;

    transform:
        translateY(0);

}


.btn-scroll-top:hover {

    background:
        var(--adminsena-green);

    transform:
        translateY(-4px);

}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 991px) {

    .hero-section {

        min-height:
            600px;

    }


    .hero-title {

        font-size:
            3.3rem;

    }


    .welcome-container {

        grid-template-columns:
            1fr;

        gap:
            50px;

    }


    .welcome-image-wrapper {

        max-width:
            600px;

        width:
            100%;

        margin:
            0 auto;

    }


    .welcome-text-content {

        max-width:
            100%;

    }


    .rounded-cards-grid {

        grid-template-columns:
            repeat(2, 1fr);

    }


    .rounded-card:last-child {

        grid-column:
            span 2;

        max-width:
            calc(50% - 12px);

        width:
            100%;

        margin:
            0 auto;

    }

}


/* =========================================================
   TABLET PEQUEÑA
========================================================= */

@media (max-width: 768px) {

    .adminsena-landing .container {

        width:
            min(100% - 30px, 650px);

    }


    .hero-section {

        min-height:
            590px;

        border-radius:
            0 0 35px 35px;

    }


    .hero-container {

        padding:
            80px 0 100px;

    }


    .hero-title {

        font-size:
            2.5rem;

        letter-spacing:
            -1px;

    }


    .hero-subtitle {

        font-size:
            .95rem;

    }


    .hero-actions {

        width:
            100%;

        flex-direction:
            column;

    }


    .btn-primary-hero,
    .btn-secondary-hero {

        width:
            min(100%, 300px);

    }


    .hero-stats {

        width:
            100%;

        flex-direction:
            column;

        gap:
            12px;

    }


    .hero-stat {

        justify-content:
            center;

    }


    .hero-stat-divider {

        width:
            80px;

        height:
            1px;

    }


    .section-heading-row {

        flex-direction:
            column;

        align-items:
            flex-start;

    }


    .offers-all-btn {

        width:
            100%;

        justify-content:
            center;

    }


    .offers-carousel {

        height:
            430px;

        border-radius:
            24px;

    }


    .offer-info {

        left:
            30px;

        right:
            30px;

        bottom:
            50px;

    }


    .offer-decoration {

        right:
            30px;

        top:
            30px;

        width:
            80px;

        height:
            80px;

        font-size:
            2rem;

    }


    .offer-info h3 {

        font-size:
            2rem;

    }


    .welcome-section {

        padding:
            65px 0;

    }


    .welcome-features {

        grid-template-columns:
            1fr;

    }


    .welcome-buttons {

        flex-direction:
            column;

        align-items:
            flex-start;

    }


    .rounded-cards-grid {

        grid-template-columns:
            1fr;

    }


    .rounded-card:last-child {

        grid-column:
            auto;

        max-width:
            none;

    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 500px) {

    .adminsena-landing .container {

        width:
            calc(100% - 28px);

    }


    .hero-section {

        min-height:
            570px;

    }


    .hero-container {

        padding:
            70px 0 95px;

    }


    .hero-badge {

        font-size:
            .7rem;

    }


    .hero-title {

        font-size:
            2rem;

    }


    .hero-subtitle {

        font-size:
            .88rem;

        line-height:
            1.65;

    }


    .hero-stats {

        padding:
            13px;

    }


    .hero-stat {

        font-size:
            .72rem;

    }


    .offers-section {

        padding:
            20px 0 60px;

    }


    .offers-title {

        font-size:
            1.85rem;

    }


    .offers-description {

        font-size:
            .85rem;

    }


    .offers-carousel {

        height:
            390px;

    }


    .offer-info {

        left:
            20px;

        right:
            20px;

        bottom:
            45px;

    }


    .offer-top-line {

        flex-wrap:
            wrap;

        gap:
            7px;

    }


    .offer-info h3 {

        font-size:
            1.55rem;

    }


    .offer-info p {

        font-size:
            .78rem;

    }


    .offer-arrow {

        width:
            36px;

        height:
            36px;

        font-size:
            .75rem;

    }


    .offer-arrow-left {

        left:
            10px;

    }


    .offer-arrow-right {

        right:
            10px;

    }


    .offer-decoration {

        display:
            none;

    }


    .welcome-image-wrapper {

        padding:
            15px;

    }


    .img-fluid-rounded {

        height:
            240px;

    }


    .image-top-label {

        left:
            15px;

        font-size:
            .65rem;

    }


    .image-bottom-info {

        right:
            10px;

        bottom:
            -15px;

    }


    .section-title {

        font-size:
            1.85rem;

    }


    .section-paragraph {

        font-size:
            .88rem;

    }


    .cards-section {

        padding:
            65px 0 80px;

    }


    .grid-section-title {

        font-size:
            1.85rem;

    }


    .card-image-wrapper {

        height:
            200px;

    }


    .offer-details-grid {

        grid-template-columns:
            1fr;

    }


    .offer-modal-header,
    .offer-modal .modal-body {

        padding:
            20px;

    }


    .btn-scroll-top {

        right:
            16px;

        bottom:
            16px;

        width:
            44px;

        height:
            44px;

        border-radius:
            13px;

    }

}

</style>

@endsection
