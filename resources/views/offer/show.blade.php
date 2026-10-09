@extends('Layout.app')

@section('content')

<div class="container py-5">

    {{-- VOLVER --}}
    <a href="{{ route('offer.index') }}"
       class="text-decoration-none text-secondary">

        <i class="bi bi-arrow-left me-1"></i>

        Volver a ofertas

    </a>


    {{-- ENCABEZADO --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mt-4 mb-4">

        <div>

            <p class="text-success fw-semibold mb-1">
                OFERTA DE FORMACIÓN
            </p>

            <h1 class="fw-bold mb-1">
                Oferta {{ $offer->offer_number }}
            </h1>

            <p class="text-muted mb-0">
                Información detallada de la oferta.
            </p>

        </div>


        {{-- ESTADO --}}
        <div class="mt-3 mt-md-0">

            @if($offer->status === 'Activa')

                <span class="badge rounded-pill bg-success px-3 py-2">
                    <i class="bi bi-check-circle me-1"></i>
                    Activa
                </span>

            @elseif($offer->status === 'Cerrada')

                <span class="badge rounded-pill bg-warning text-dark px-3 py-2">
                    <i class="bi bi-lock me-1"></i>
                    Cerrada
                </span>

            @else

                <span class="badge rounded-pill bg-secondary px-3 py-2">
                    {{ $offer->status }}
                </span>

            @endif

        </div>

    </div>


    {{-- INFORMACIÓN PRINCIPAL --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4 p-md-5">


            {{-- CURSO --}}
            <div class="course-box mb-4">

                <div class="icon-box">

                    <i class="bi bi-book"></i>

                </div>

                <div>

                    <small class="text-muted">
                        CURSO / FICHA
                    </small>

                    <h4 class="fw-bold mb-0">

                        @if($offer->course)

                            {{ $offer->course->course_number }}

                        @else

                            Sin curso

                        @endif

                    </h4>

                </div>

            </div>


            {{-- DATOS --}}
            <div class="row g-3">


                {{-- CENTRO --}}
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-icon">
                            <i class="bi bi-building"></i>
                        </div>

                        <div>

                            <small class="text-muted">
                                CENTRO DE FORMACIÓN
                            </small>

                            <p class="fw-semibold mb-0">

                                @if($offer->trainingCenter)

                                    {{ $offer->trainingCenter->name }}

                                @else

                                    Sin centro

                                @endif

                            </p>

                        </div>

                    </div>

                </div>


                {{-- JORNADA --}}
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-icon">
                            <i class="bi bi-clock"></i>
                        </div>

                        <div>

                            <small class="text-muted">
                                JORNADA
                            </small>

                            <p class="fw-semibold mb-0">
                                {{ $offer->day }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- MODALIDAD --}}
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-icon">
                            <i class="bi bi-laptop"></i>
                        </div>

                        <div>

                            <small class="text-muted">
                                MODALIDAD
                            </small>

                            <p class="fw-semibold mb-0">
                                {{ $offer->modality }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- CUPOS --}}
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-icon">
                            <i class="bi bi-people"></i>
                        </div>

                        <div>

                            <small class="text-muted">
                                CUPOS
                            </small>

                            <p class="fw-semibold mb-0">

                                {{ $offer->available_quota }}

                                <span class="text-muted fw-normal">
                                    disponibles de {{ $offer->quota }}
                                </span>

                            </p>

                        </div>

                    </div>

                </div>


                {{-- FECHA INICIO --}}
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-icon">
                            <i class="bi bi-calendar-event"></i>
                        </div>

                        <div>

                            <small class="text-muted">
                                FECHA DE INICIO
                            </small>

                            <p class="fw-semibold mb-0">

                                {{ \Carbon\Carbon::parse($offer->start_date)->format('d/m/Y') }}

                            </p>

                        </div>

                    </div>

                </div>


                {{-- FECHA FINAL --}}
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>

                        <div>

                            <small class="text-muted">
                                FECHA DE FINALIZACIÓN
                            </small>

                            <p class="fw-semibold mb-0">

                                {{ \Carbon\Carbon::parse($offer->end_date)->format('d/m/Y') }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- BOTONES --}}
            <div class="d-flex justify-content-end gap-2 mt-5">

                <a href="{{ route('offer.index') }}"
                   class="btn btn-light px-4">

                    Volver

                </a>

                <a href="{{ route('offer.edit', $offer->id) }}"
                   class="btn text-white px-4"
                   style="background-color: #39A900;">

                    <i class="bi bi-pencil me-2"></i>

                    Editar oferta

                </a>

            </div>


        </div>

    </div>

</div>


<style>

    .course-box {

        display: flex;

        align-items: center;

        gap: 18px;

        padding: 20px;

        border-radius: 12px;

        background-color: #f8f9fa;

    }


    .icon-box {

        width: 55px;

        height: 55px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 12px;

        background-color: rgba(57, 169, 0, 0.12);

        color: #39A900;

        font-size: 1.5rem;

    }


    .info-box {

        display: flex;

        align-items: center;

        gap: 15px;

        height: 100%;

        padding: 20px;

        border: 1px solid #e9ecef;

        border-radius: 12px;

        transition: 0.2s ease;

    }


    .info-box:hover {

        border-color: #39A900;

        transform: translateY(-2px);

    }


    .info-icon {

        width: 45px;

        height: 45px;

        min-width: 45px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 10px;

        background-color: rgba(57, 169, 0, 0.1);

        color: #39A900;

        font-size: 1.2rem;

    }


</style>

@endsection