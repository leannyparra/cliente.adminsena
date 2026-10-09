@extends('Layout.app')

@section('content')

<div class="container py-5">

    <!-- Encabezado -->
    <div class="mb-4">

        <a href="{{ route('offer.index') }}"
           class="text-decoration-none text-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Volver a ofertas

        </a>

        <h1 class="fw-bold mt-3 mb-1">
            Nueva oferta
        </h1>

        <p class="text-muted">
            Registra una nueva oferta de formación.
        </p>

    </div>


    <!-- Formulario -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4 p-md-5">

            <form action="{{ route('offer.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf



                @if ($errors->any())
    <div class="alert alert-danger mb-4">
        <strong>Hay un problema con el formulario:</strong>

        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif





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
                            placeholder="Ej: 001-2026"
                            value="{{ old('offer_number') }}"
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
                                    {{ old('course_id') == $course->id ? 'selected' : '' }}
                                >

                                    {{ $course->course_number }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <!-- Centro de formación -->
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
                                    {{ old('training_center_id') == $center->id ? 'selected' : '' }}
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

                            <option value="">
                                Selecciona una jornada
                            </option>

                            <option value="Mañana"
                                {{ old('day') == 'Mañana' ? 'selected' : '' }}>
                                Mañana
                            </option>

                            <option value="Tarde"
                                {{ old('day') == 'Tarde' ? 'selected' : '' }}>
                                Tarde
                            </option>

                            <option value="Noche"
                                {{ old('day') == 'Noche' ? 'selected' : '' }}>
                                Noche
                            </option>

                        </select>

                    </div>


                    <!-- Fecha de inicio -->
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
                            value="{{ old('start_date') }}"
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
                            value="{{ old('end_date') }}"
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

                            <option value="">
                                Selecciona una modalidad
                            </option>

                            <option value="Presencial"
                                {{ old('modality') == 'Presencial' ? 'selected' : '' }}>
                                Presencial
                            </option>

                            <option value="Virtual"
                                {{ old('modality') == 'Virtual' ? 'selected' : '' }}>
                                Virtual
                            </option>

                            <option value="A distancia"
                                {{ old('modality') == 'A distancia' ? 'selected' : '' }}>
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
                            placeholder="Ej: 30"
                            value="{{ old('quota') }}"
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
                                {{ old('status', 'Activa') == 'Activa' ? 'selected' : '' }}>
                                Activa
                            </option>

                            <option value="Cerrada"
                                {{ old('status') == 'Cerrada' ? 'selected' : '' }}>
                                Cerrada
                            </option>

                            <option value="Finalizada"
                                {{ old('status') == 'Finalizada' ? 'selected' : '' }}>
                                Finalizada
                            </option>

                        </select>

                    </div>


                    <!-- Imagen -->
                    <div class="col-md-6">

                        <label for="image"
                               class="form-label fw-semibold">

                            Imagen de la oferta
                            <span class="text-muted fw-normal">
                                (opcional)
                            </span>

                        </label>

                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="form-control"
                            accept="image/*"
                        >

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

                        Guardar oferta

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