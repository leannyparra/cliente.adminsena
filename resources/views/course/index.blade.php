@extends('Layout.app')

@section('content')

<style>
    /* =====================================================
       ESTILOS GENERALES
    ===================================================== */

    body {
        background: #f5f7f9 !important;
    }

    .courses-page {
        padding: 35px 0 50px;
    }

    /* =====================================================
       ENCABEZADO
    ===================================================== */

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 28px;
    }

    .page-title-wrapper {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .page-icon {
        width: 52px;
        height: 52px;
        border-radius: 15px;
        background: #e8f6df;
        color: #39A900;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        box-shadow: 0 4px 12px rgba(57, 169, 0, 0.08);
    }

    .page-title {
        margin: 0;
        font-size: 1.75rem;
        font-weight: 750;
        color: #17212b;
        letter-spacing: -0.6px;
    }

    .page-subtitle {
        margin: 4px 0 0;
        color: #7b8794;
        font-size: 0.9rem;
    }

    /* =====================================================
       BOTÓN NUEVO
    ===================================================== */

    .btn-new-course {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #39A900;
        color: white !important;
        border: none;
        padding: 11px 18px;
        border-radius: 11px;
        font-size: 0.86rem;
        font-weight: 650;
        text-decoration: none;
        box-shadow: 0 5px 14px rgba(57, 169, 0, 0.18);
        transition: all .25s ease;
    }

    .btn-new-course:hover {
        background: #2e8700;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(57, 169, 0, 0.25);
    }

    /* =====================================================
       ESTADÍSTICA
    ===================================================== */

    .course-summary {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 22px;
    }

    .summary-card {
        background: white;
        border: 1px solid #edf0f2;
        border-radius: 14px;
        padding: 14px 18px;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 3px 12px rgba(20, 30, 40, 0.035);
    }

    .summary-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: #f0f8eb;
        color: #39A900;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .summary-label {
        font-size: 0.72rem;
        color: #89929c;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: .5px;
        font-weight: 650;
    }

    .summary-number {
        font-size: 1.15rem;
        color: #17212b;
        font-weight: 750;
        margin: 1px 0 0;
    }

    /* =====================================================
       CONTENEDOR PRINCIPAL
    ===================================================== */

    .courses-card {
        background: white;
        border: 1px solid #e9edf0;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(25, 35, 45, 0.055);
    }

    /* =====================================================
       BARRA SUPERIOR
    ===================================================== */

    .courses-toolbar {
        padding: 20px 24px;
        border-bottom: 1px solid #edf0f2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        background: #fff;
    }

    .toolbar-title {
        margin: 0;
        font-size: 1rem;
        font-weight: 700;
        color: #26323d;
    }

    .toolbar-description {
        margin: 3px 0 0;
        color: #929ba4;
        font-size: .78rem;
    }

    /* =====================================================
       BUSCADOR
    ===================================================== */

    .search-wrapper {
        position: relative;
        width: 290px;
    }

    .search-wrapper i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #98a1aa;
        font-size: 15px;
        pointer-events: none;
    }

    .search-input {
        width: 100%;
        height: 42px;
        border: 1px solid #e1e6ea;
        border-radius: 11px;
        padding: 0 15px 0 40px;
        font-size: .85rem;
        color: #343d46;
        background: #f9fafb;
        outline: none;
        transition: all .2s ease;
    }

    .search-input::placeholder {
        color: #a0a8b0;
    }

    .search-input:focus {
        background: white;
        border-color: #39A900;
        box-shadow: 0 0 0 4px rgba(57, 169, 0, .10);
    }

    /* =====================================================
       TABLA
    ===================================================== */

    .courses-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
    }

    .courses-table thead {
        background: #f8fafb;
    }

    .courses-table thead th {
        padding: 13px 18px;
        color: #89939d;
        font-size: .69rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .65px;
        border-bottom: 1px solid #edf0f2;
        white-space: nowrap;
    }

    .courses-table tbody tr {
        transition: all .2s ease;
        border-bottom: 1px solid #f0f2f4;
    }

    .courses-table tbody tr:last-child {
        border-bottom: none;
    }

    .courses-table tbody tr:hover {
        background: #fbfdf9;
    }

    .courses-table td {
        padding: 17px 18px;
        vertical-align: middle;
        color: #4d5862;
        font-size: .84rem;
    }

    /* =====================================================
       ID
    ===================================================== */

    .course-id {
        color: #9aa3ab;
        font-size: .78rem;
        font-weight: 650;
    }

    /* =====================================================
       FICHA
    ===================================================== */

    .course-number-wrapper {
        display: flex;
        align-items: center;
        gap: 11px;
    }

    .course-number-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: #edf8e8;
        color: #39A900;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .course-number {
        color: #202a33;
        font-weight: 700;
        text-decoration: none;
        transition: color .2s ease;
    }

    .course-number:hover {
        color: #39A900;
    }

    .course-label {
        display: block;
        color: #a0a7ae;
        font-size: .68rem;
        margin-top: 1px;
    }

    /* =====================================================
       BADGES
    ===================================================== */

    .info-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 10px;
        border-radius: 8px;
        font-size: .73rem;
        font-weight: 650;
        white-space: nowrap;
    }

    .badge-day {
        background: #f1f5f9;
        color: #52606d;
    }

    .badge-area {
        background: #f5f7f8;
        color: #596570;
    }

    .badge-center {
        background: #edf8e8;
        color: #347c0b;
    }

    /* =====================================================
       ACCIONES
    ===================================================== */

    .actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 7px;
    }

    .action-btn {
        width: 35px;
        height: 35px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        border: 1px solid #e4e8eb;
        background: white;
        color: #7a858f;
        transition: all .2s ease;
        padding: 0;
    }

    .action-btn:hover {
        border-color: #39A900;
        background: #f0f9eb;
        color: #39A900;
        transform: translateY(-1px);
    }

    .delete-btn {
        width: 35px;
        height: 35px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #fee2e2;
        background: #fff7f7;
        color: #ef4444;
        cursor: pointer;
        padding: 0;
        transition: all .2s ease;
    }

    .delete-btn:hover {
        background: #ef4444;
        color: white;
        border-color: #ef4444;
        transform: translateY(-1px);
    }

    /* =====================================================
       ESTADO VACÍO
    ===================================================== */

    .empty-state {
        padding: 65px 20px !important;
        text-align: center;
    }

    .empty-icon {
        width: 65px;
        height: 65px;
        border-radius: 18px;
        background: #f2f5f7;
        color: #9aa4ad;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        font-size: 27px;
    }

    .empty-title {
        color: #4c5862;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .empty-text {
        color: #9aa3ab;
        font-size: .82rem;
        margin: 0;
    }

    /* =====================================================
       PAGINACIÓN
    ===================================================== */

    .pagination-wrapper {
        padding: 17px 24px;
        border-top: 1px solid #edf0f2;
        background: #fafbfc;
        display: flex;
        justify-content: center;
    }

    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 900px) {

        .page-header {
            align-items: flex-start;
        }

        .courses-toolbar {
            align-items: stretch;
            flex-direction: column;
        }

        .search-wrapper {
            width: 100%;
        }

        .course-summary {
            overflow-x: auto;
        }

        .courses-table {
            min-width: 850px;
        }
    }

    @media (max-width: 576px) {

        .courses-page {
            padding: 20px 0 35px;
        }

        .page-header {
            flex-direction: column;
        }

        .btn-new-course {
            width: 100%;
            justify-content: center;
        }

        .page-title {
            font-size: 1.45rem;
        }

        .page-icon {
            width: 45px;
            height: 45px;
        }
    }
</style>

<div class="container courses-page">


<!-- =====================================================
     ENCABEZADO
====================================================== -->

<div class="page-header">

    <div class="page-title-wrapper">

        <div class="page-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div>

        <div>
            <h1 class="page-title">Programas y Fichas</h1>

            <p class="page-subtitle">
                Gestiona los programas de formación y sus fichas.
            </p>
        </div>

    </div>

    <a href="{{ url('course/create') }}" class="btn-new-course">
        <i class="bi bi-plus-lg"></i>
        Nueva ficha
    </a>

</div>


<!-- =====================================================
     RESUMEN
====================================================== -->

<div class="course-summary">

    <div class="summary-card">

        <div class="summary-icon">
            <i class="bi bi-collection"></i>
        </div>

        <div>
            <p class="summary-label">Total de fichas</p>

            <p class="summary-number">
                {{ count($courses) }}
            </p>
        </div>

    </div>

</div>


<!-- =====================================================
     CONTENEDOR
====================================================== -->

<div class="courses-card">

    <!-- Barra superior -->

    <div class="courses-toolbar">

        <div>
            <h5 class="toolbar-title">
                Listado de programas
            </h5>

            <p class="toolbar-description">
                Consulta y administra las fichas registradas.
            </p>
        </div>


        <form action="{{ route('course.index') }}"
              method="GET"
              class="search-wrapper">

            <i class="bi bi-search"></i>

            <input
                type="search"
                name="search"
                class="search-input"
                placeholder="Buscar ficha, área o centro..."
                value="{{ request('search') }}"
            >

        </form>

    </div>


    <!-- =================================================
         TABLA
    ================================================== -->

    <div class="table-responsive">

        <table class="courses-table">

            <thead>

                <tr>

                    <th style="width: 75px;">
                        ID
                    </th>

                    <th>
                        Ficha
                    </th>

                    <th>
                        Jornada
                    </th>

                    <th>
                        Área
                    </th>

                    <th>
                        Centro de formación
                    </th>

                    <th class="text-end" style="width: 150px;">
                        Acciones
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($courses as $course)

                    <tr>

                        <!-- ID -->

                        <td>
                            <span class="course-id">
                                #{{ $course['id'] }}
                            </span>
                        </td>


                        <!-- FICHA -->

                        <td>

                            <div class="course-number-wrapper">

                                <div class="course-number-icon">
                                    <i class="bi bi-journal-text"></i>
                                </div>

                                <div>

                                    <a
                                        href="{{ route('course.show', $course['id']) }}"
                                        class="course-number"
                                    >
                                        {{ $course['course_number'] }}
                                    </a>

                                    <span class="course-label">
                                        Número de ficha
                                    </span>

                                </div>

                            </div>

                        </td>


                        <!-- JORNADA -->

                        <td>

                            <span class="info-badge badge-day">

                                <i class="bi bi-clock"></i>

                                {{ $course['day'] }}

                            </span>

                        </td>


                        <!-- ÁREA -->

                        <td>

                            @if($course['area']?? null)

                                <span class="info-badge badge-area">

                                    <i class="bi bi-diagram-3"></i>

                                    {{ $course['area']['name'] }}

                                </span>

                            @else

                                <span class="text-muted small">
                                    Sin área
                                </span>

                            @endif

                        </td>


                        <!-- CENTRO -->

                        <td>

                            @if($course['training_center']?? null)

                                <span class="info-badge badge-center">

                                    <i class="bi bi-building"></i>

                                    {{ $course['training_center']['name'] }}

                                </span>

                            @else

                                <span class="text-muted small">
                                    Sin centro
                                </span>

                            @endif

                        </td>


                        <!-- ACCIONES -->

                        <td>

                            <div class="actions">

                                <!-- VER -->

                                <a
                                    href="{{ route('course.show', $course['id']) }}"
                                    class="action-btn"
                                    title="Ver detalles"
                                >
                                    <i class="bi bi-eye"></i>
                                </a>


                                <!-- EDITAR -->

                                <a
                                    href="{{ route('course.edit', $course['id']) }}"
                                    class="action-btn"
                                    title="Editar ficha"
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>


                                <!-- ELIMINAR -->

                                <form
                                    action="{{ route('course.destroy', $course['id']) }}"
                                    method="POST"
                                    class="d-inline"
                                >

                                    @csrf
                                    @method('delete')

                                    <button
                                        type="submit"
                                        class="delete-btn"
                                        title="Eliminar ficha"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta ficha?')"
                                    >

                                        <i class="bi bi-trash3"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="empty-state">

                            <div class="empty-icon">
                                <i class="bi bi-journal-x"></i>
                            </div>

                            <div class="empty-title">
                                No hay fichas registradas
                            </div>

                            <p class="empty-text">
                                Cuando registres una nueva ficha aparecerá aquí.
                            </p>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <!-- =================================================
         PAGINACIÓN
    ================================================== -->

    @if(is_object($courses) && method_exists($courses, 'links'))

        <div class="pagination-wrapper">

            {{ $courses->links() }}

        </div>

    @endif

</div>


</div>

@endsection
