@extends('Layout.app')

@section('content')

<div class="container py-5">

    <!-- Volver -->
    <a href="{{ route('offer.index') }}"
       class="text-decoration-none text-secondary">

        <i class="bi bi-arrow-left me-1"></i>
        Volver a ofertas

    </a>


    <!-- Encabezado -->
    <div class="mb-4 mt-3">

        <h1 class="fw-bold mb-1">
            Editar oferta
        </h1>

        <p class="text-muted mb-0">
            Modifica la información de la oferta {{ $offer->offer_number }}.
        </p>

    </div>


    <!-- Formulario -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4 p-md-5">

            <form action="{{ route('offer.update', $offer->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @method('PUT')


                <div class="row g-4">


                    <!-- Número de oferta -->
                    <div class="col-md-6">

                        <label for="offer_number"
                               class="form-label fw-semibold">

                            Número de oferta

                        </label>

                        <input
                            type="text"
                            name="offer_number"
                            id="offer_number"
                            class="form-control"
                            value="{{ old('offer_number', $offer->offer_number) }}"
                            required
                        >

                    </div>


                    <!-- Curso -->
                    <div class="col-md-6">

                        <label for="course_id"
                               class="form-label fw-semibold">

                            Curso

                        </label>

                        <select
                            name="course_id"
                            id="course_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Selecciona un curso
                            </option>

                            @foreach($courses as $course)

                                <option
                                    value="{{ $course->id }}"
                                    {{ old('course_id', $offer->course_id) == $course->id ? 'selected' : '' }}
                                >

                                    {{ $course->course_number }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <!-- Centro -->
                    <div class="col-md-6">

                        <label for="training_center_id"
                               class="form-label fw-semibold">

                            Centro de formación

                        </label>

                        <select
                            name="training_center_id"
                            id="training_center_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Selecciona un centro
                            </option>

                            @foreach($trainingCenters as $center)

                                <option
                                    value="{{ $center->id }}"
                                    {{ old('training_center_id', $offer->training_center_id) == $center->id ? 'selected' : '' }}
                                >

                                    {{ $center->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <!-- Jornada -->
                    <div class="col-md-6">

                        <label for="day"
                               class="form-label fw-semibold">

                            Jornada

                        </label>

                        <select
                            name="day"
                            id="day"
                            class="form-select"
                            required
                        >

                            <option value="Mañana"
                                {{ old('day', $offer->day) == 'Mañana' ? 'selected' : '' }}>
                                Mañana
                            </option>

                            <option value="Tarde"
                                {{ old('day', $offer->day) == 'Tarde' ? 'selected' : '' }}>
                                Tarde
                            </option>

                            <option value="Noche"
                                {{ old('day', $offer->day) == 'Noche' ? 'selected' : '' }}>
                                Noche
                            </option>

                        </select>

                    </div>


                    <!-- Fecha inicio -->
                    <div class="col-md-6">

                        <label for="start_date"
                               class="form-label fw-semibold">

                            Fecha de inicio

                        </label>

                        <input
                            type="date"
                            name="start_date"
                            id="start_date"
                            class="form-control"
                            value="{{ old('start_date', $offer->start_date) }}"
                            required
                        >

                    </div>


                    <!-- Fecha final -->
                    <div class="col-md-6">

                        <label for="end_date"
                               class="form-label fw-semibold">

                            Fecha de finalización

                        </label>

                        <input
                            type="date"
                            name="end_date"
                            id="end_date"
                            class="form-control"
                            value="{{ old('end_date', $offer->end_date) }}"
                            required
                        >

                    </div>


                    <!-- Modalidad -->
                    <div class="col-md-6">

                        <label for="modality"
                               class="form-label fw-semibold">

                            Modalidad

                        </label>

                        <select
                            name="modality"
                            id="modality"
                            class="form-select"
                            required
                        >

                            <option value="Presencial"
                                {{ old('modality', $offer->modality) == 'Presencial' ? 'selected' : '' }}>
                                Presencial
                            </option>

                            <option value="Virtual"
                                {{ old('modality', $offer->modality) == 'Virtual' ? 'selected' : '' }}>
                                Virtual
                            </option>

                            <option value="A distancia"
                                {{ old('modality', $offer->modality) == 'A distancia' ? 'selected' : '' }}>
                                A distancia
                            </option>

                        </select>

                    </div>


                    <!-- Cupos -->
                    <div class="col-md-6">

                        <label for="quota"
                               class="form-label fw-semibold">

                            Cantidad de cupos

                        </label>

                        <input
                            type="number"
                            name="quota"
                            id="quota"
                            class="form-control"
                            min="1"
                            value="{{ old('quota', $offer->quota) }}"
                            required
                        >

                    </div>


                    <!-- Estado -->
                    <div class="col-md-6">

                        <label for="status"
                               class="form-label fw-semibold">

                            Estado

                        </label>

                        <select
                            name="status"
                            id="status"
                            class="form-select"
                            required
                        >

                            <option value="Activa"
                                {{ old('status', $offer->status) == 'Activa' ? 'selected' : '' }}>
                                Activa
                            </option>

                            <option value="Cerrada"
                                {{ old('status', $offer->status) == 'Cerrada' ? 'selected' : '' }}>
                                Cerrada
                            </option>

                            <option value="Finalizada"
                                {{ old('status', $offer->status) == 'Finalizada' ? 'selected' : '' }}>
                                Finalizada
                            </option>

                        </select>

                    </div>


                    <!-- Imagen -->
                    <div class="col-md-6">

                        <label for="image"
                               class="form-label fw-semibold">

                            Cambiar imagen

                        </label>

                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="form-control"
                            accept="image/*"
                        >

                        @if($offer->image)

                            <small class="text-muted d-block mt-2">

                                Esta oferta ya tiene una imagen.
                                Selecciona otra solamente si deseas cambiarla.

                            </small>

                        @endif

                    </div>


                </div>


                <!-- Botones -->
                <div class="d-flex justify-content-end gap-3 mt-5">

                    <a href="{{ route('offer.index') }}"
                       class="btn btn-light px-4">

                        Cancelar

                    </a>

                    <button
                        type="submit"
                        class="btn text-white px-4"
                        style="background-color: #39A900;">

                        <i class="bi bi-check-lg me-2"></i>

                        Guardar cambios

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>


<style>

    .form-control,
    .form-select {

        border-radius: 8px;

        padding: 10px 13px;

        border: 1px solid #dee2e6;

    }

    .form-control:focus,
    .form-select:focus {

        border-color: #39A900;

        box-shadow: 0 0 0 0.2rem rgba(57, 169, 0, 0.15);

    }

</style>

@endsection