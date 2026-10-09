@extends('Layout.app')

@section('content')

<div class="container-fluid px-4 px-md-5 py-5">

    {{-- MENSAJE DE ÉXITO --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- ENCABEZADO --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

        <div>

            <h1 class="fw-bold mb-1">
                Gestión de Ofertas
            </h1>

            <p class="text-muted mb-0">
                Administra las ofertas de formación disponibles.
            </p>

        </div>


        <a href="{{ route('offer.create') }}"
           class="btn text-white mt-3 mt-md-0 px-4"
           style="background-color: #39A900;">

            <i class="bi bi-plus-lg me-2"></i>

            Nueva oferta

        </a>

    </div>


    {{-- TARJETA PRINCIPAL --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="px-4 py-3">
                                Oferta
                            </th>

                            <th>
                                Curso / Ficha
                            </th>

                            <th>
                                Centro de formación
                            </th>

                            <th>
                                Jornada
                            </th>

                            <th>
                                Modalidad
                            </th>

                            <th>
                                Cupos
                            </th>

                            <th>
                                Estado
                            </th>

                            <th class="text-center">
                                Acciones
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($offers as $offer)

                            <tr>

                                {{-- OFERTA --}}
                                <td class="px-4">

                                    <span class="fw-bold">
                                        {{ $offer->offer_number }}
                                    </span>

                                </td>


                                {{-- CURSO --}}
                                <td>

                                    @if($offer->course)

                                        <span class="fw-semibold">
                                            {{ $offer->course->course_number }}
                                        </span>

                                    @else

                                        <span class="text-muted">
                                            Sin curso
                                        </span>

                                    @endif

                                </td>


                                {{-- CENTRO --}}
                                <td>

                                    @if($offer->trainingCenter)

                                        {{ $offer->trainingCenter->name }}

                                    @else

                                        <span class="text-muted">
                                            Sin centro
                                        </span>

                                    @endif

                                </td>


                                {{-- JORNADA --}}
                                <td>

                                    {{ $offer->day }}

                                </td>


                                {{-- MODALIDAD --}}
                                <td>

                                    {{ $offer->modality }}

                                </td>


                                {{-- CUPOS --}}
                                <td>

                                    <span class="fw-semibold">
                                        {{ $offer->available_quota }}
                                    </span>

                                    <span class="text-muted">
                                        / {{ $offer->quota }}
                                    </span>

                                </td>


                                {{-- ESTADO --}}
                                <td>

                                    @if($offer->status === 'Activa')

                                        <span class="badge rounded-pill bg-success">
                                            Activa
                                        </span>

                                    @elseif($offer->status === 'Cerrada')

                                        <span class="badge rounded-pill bg-warning text-dark">
                                            Cerrada
                                        </span>

                                    @else

                                        <span class="badge rounded-pill bg-secondary">
                                            {{ $offer->status }}
                                        </span>

                                    @endif

                                </td>


                                {{-- ACCIONES --}}
                                <td class="text-center">

                                    <div class="d-flex justify-content-center gap-2">


                                        {{-- VER --}}
                                        <a href="{{ route('offer.show', $offer->id) }}"
                                           class="btn btn-sm btn-light"
                                           title="Ver oferta">

                                            <i class="bi bi-eye"></i>

                                        </a>


                                        {{-- EDITAR --}}
                                        <a href="{{ route('offer.edit', $offer->id) }}"
                                           class="btn btn-sm btn-light"
                                           title="Editar oferta">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        {{-- ELIMINAR --}}
                                        <form action="{{ route('offer.destroy', $offer->id) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-light text-danger"
                                                    title="Eliminar oferta"
                                                    onclick="return confirm('¿Estás seguro de eliminar esta oferta?')">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>


                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8"
                                    class="text-center py-5">

                                    <div class="mb-3">

                                        <i class="bi bi-megaphone"
                                           style="font-size: 3rem; color: #39A900;">
                                        </i>

                                    </div>

                                    <h5 class="fw-bold">
                                        No hay ofertas registradas
                                    </h5>

                                    <p class="text-muted">
                                        Comienza creando tu primera oferta.
                                    </p>

                                    <a href="{{ route('offer.create') }}"
                                       class="btn text-white"
                                       style="background-color: #39A900;">

                                        <i class="bi bi-plus-lg me-2"></i>

                                        Crear oferta

                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<style>

    .table > :not(caption) > * > * {
        padding-top: 15px;
        padding-bottom: 15px;
    }

    .table thead th {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        color: #6c757d;
        white-space: nowrap;
    }

    .table tbody td {
        white-space: nowrap;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(57, 169, 0, 0.03);
    }

</style>

@endsection