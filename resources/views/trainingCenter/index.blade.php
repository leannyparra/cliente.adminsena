@extends('Layout.app')

@section('content')

<div class="centers-page">

```
<div class="container py-5">

    <!-- =====================================================
         ENCABEZADO
    ====================================================== -->

    <div class="page-header">

        <div class="page-title">

            <div class="title-icon">
                <i class="bi bi-buildings"></i>
            </div>

            <div>
                <span class="section-label">
                    ADMINISTRACIÓN
                </span>

                <h1>Centros de Formación</h1>

                <p>
                    Gestiona las sedes y centros de aprendizaje registrados en AdminSENA.
                </p>
            </div>

        </div>


        <!-- BOTÓN NUEVO -->

        <a
            href="{{ url('training-center/create') }}"
            class="btn-new-center"
        >
            <span class="new-icon">
                <i class="bi bi-plus-lg"></i>
            </span>

            <span>Nuevo centro</span>
        </a>

    </div>


    <!-- =====================================================
         TARJETA PRINCIPAL
    ====================================================== -->

    <div class="centers-card">

        <!-- =================================================
             BARRA SUPERIOR
        ================================================== -->

        <div class="centers-toolbar">

            <div class="toolbar-title">

                <div class="toolbar-icon">
                    <i class="bi bi-building"></i>
                </div>

                <div>
                    <h2>Centros registrados</h2>

                    <span>
                        Administra la información de tus sedes
                    </span>
                </div>

            </div>


            <!-- BUSCADOR -->

            <form
                action="{{ url('training-center/list') }}"
                method="GET"
                class="search-box"
            >

                <i class="bi bi-search"></i>

                <input
                    type="search"
                    name="search"
                    placeholder="Buscar centro o ubicación..."
                    value="{{ request('search') }}"
                >

                @if(request('search'))
                    <a
                        href="{{ url('training-center/list') }}"
                        class="clear-search"
                        title="Limpiar búsqueda"
                    >
                        <i class="bi bi-x"></i>
                    </a>
                @endif

            </form>

        </div>


        <!-- =================================================
             TABLA
        ================================================== -->

        <div class="table-container">

            <table class="centers-table">

                <thead>

                    <tr>

                        <th class="id-column">
                            #
                        </th>

                        <th>
                            Centro de formación
                        </th>

                        <th>
                            Ubicación
                        </th>

                        <th class="actions-column">
                            Acciones
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($trainingCenters as $center)

                        <tr>

                            <!-- ID -->

                            <td class="id-cell">

                                <span class="center-id">
                                    {{ str_pad($center['id'], 2, '0', STR_PAD_LEFT) }}
                                </span>

                            </td>


                            <!-- CENTRO -->

                            <td>

                                <a
                                    href="{{ url('training-center/' . $center['id']) }}"
                                    class="center-name"
                                >

                                    <span class="center-avatar">
                                        <i class="bi bi-building"></i>
                                    </span>

                                    <span class="center-info">

                                        <strong>
                                            {{ $center['name'] }}
                                        </strong>

                                        <small>
                                            Centro de Formación SENA
                                        </small>

                                    </span>

                                </a>

                            </td>


                            <!-- UBICACIÓN -->

                            <td>

                                <div class="location-info">

                                    <span class="location-icon">
                                        <i class="bi bi-geo-alt-fill"></i>
                                    </span>

                                    <span>
                                        {{ $center['location'] }}
                                    </span>

                                </div>

                            </td>


                            <!-- ACCIONES -->

                            <td>

                                <div class="actions">

                                    <!-- VER -->

                                    <a
                                        href="{{ route('trainingCenter.show', $center['id']) }}"
                                        class="action-btn action-view"
                                        title="Ver centro"
                                    >
                                        <i class="bi bi-eye"></i>
                                        <span>Ver</span>
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <!-- =================================================
                             ESTADO VACÍO
                        ================================================== -->

                        <tr>

                            <td colspan="4">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        <i class="bi bi-building-x"></i>
                                    </div>

                                    <h3>
                                        No hay centros registrados
                                    </h3>

                                    <p>
                                        No encontramos centros que coincidan con tu búsqueda.
                                    </p>

                                    @if(request('search'))

                                        <a
                                            href="{{ url('training-center/list') }}"
                                            class="empty-link"
                                        >
                                            Limpiar búsqueda
                                        </a>

                                    @else

                                        <a
                                            href="{{ url('training-center/create') }}"
                                            class="empty-link"
                                        >
                                            <i class="bi bi-plus-lg"></i>
                                            Registrar primer centro
                                        </a>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <!-- =================================================
             PAGINACIÓN
        ================================================== -->

        @if(is_object($trainingCenters) && method_exists($trainingCenters, 'links') && $trainingCenters->hasPages())

            <div class="pagination-area">

                <div class="pagination-info">
                    Mostrando centros registrados
                </div>

                <div>
                    {{ $trainingCenters->links() }}
                </div>

            </div>

        @endif

    </div>

</div>
```

</div>

<!-- =========================================================
     ESTILOS
========================================================= -->

<style>

    /* =====================================================
       GENERAL
    ====================================================== */

    .centers-page {

        min-height: calc(100vh - 80px);

        background:
            radial-gradient(
                circle at 90% 0%,
                rgba(57,169,0,.08),
                transparent 30%
            ),
            #f5f7f6;

    }


    /* =====================================================
       HEADER
    ====================================================== */

    .page-header {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 25px;

        margin-bottom: 30px;

    }


    .page-title {

        display: flex;

        align-items: center;

        gap: 17px;

    }


    .title-icon {

        width: 58px;
        height: 58px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 18px;

        background: #39A900;

        color: white;

        font-size: 25px;

        box-shadow:
            0 10px 25px rgba(57,169,0,.20);

    }


    .section-label {

        display: block;

        margin-bottom: 3px;

        color: #39A900;

        font-size: 10px;

        font-weight: 800;

        letter-spacing: 1.5px;

    }


    .page-title h1 {

        margin: 0;

        color: #202824;

        font-size: 28px;

        font-weight: 800;

        letter-spacing: -.7px;

    }


    .page-title p {

        margin: 5px 0 0;

        color: #7b857f;

        font-size: 13px;

    }


    /* =====================================================
       NUEVO CENTRO
    ====================================================== */

    .btn-new-center {

        display: inline-flex;

        align-items: center;

        gap: 10px;

        height: 48px;

        padding: 0 18px;

        border-radius: 13px;

        background: #39A900;

        color: white;

        text-decoration: none;

        font-size: 13px;

        font-weight: 750;

        box-shadow:
            0 8px 20px rgba(57,169,0,.20);

        transition: .2s ease;

    }


    .btn-new-center:hover {

        background: #2f8e00;

        color: white;

        transform: translateY(-2px);

        box-shadow:
            0 12px 25px rgba(57,169,0,.28);

    }


    .new-icon {

        width: 25px;
        height: 25px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 7px;

        background: rgba(255,255,255,.18);

    }


    /* =====================================================
       CARD
    ====================================================== */

    .centers-card {

        overflow: hidden;

        background: white;

        border: 1px solid #e6ebe8;

        border-radius: 20px;

        box-shadow:
            0 15px 40px rgba(28,43,34,.06);

    }


    /* =====================================================
       TOOLBAR
    ====================================================== */

    .centers-toolbar {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 25px;

        padding: 22px 25px;

        border-bottom: 1px solid #edf0ee;

        background: #fff;

    }


    .toolbar-title {

        display: flex;

        align-items: center;

        gap: 12px;

    }


    .toolbar-icon {

        width: 42px;
        height: 42px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background: #f0f8ed;

        color: #39A900;

        font-size: 18px;

    }


    .toolbar-title h2 {

        margin: 0;

        color: #29342e;

        font-size: 15px;

        font-weight: 750;

    }


    .toolbar-title span {

        display: block;

        margin-top: 3px;

        color: #939b96;

        font-size: 11px;

    }


    /* =====================================================
       BUSCADOR
    ====================================================== */

    .search-box {

        position: relative;

        width: 330px;

        height: 43px;

    }


    .search-box > i {

        position: absolute;

        left: 15px;

        top: 50%;

        transform: translateY(-50%);

        color: #9aa39e;

        font-size: 15px;

        pointer-events: none;

    }


    .search-box input {

        width: 100%;
        height: 100%;

        padding: 0 42px 0 42px;

        border: 1px solid #e0e6e2;

        border-radius: 12px;

        outline: none;

        background: #f8faf8;

        color: #303a35;

        font-size: 12px;

        transition: .2s ease;

    }


    .search-box input::placeholder {

        color: #a5ada8;

    }


    .search-box input:focus {

        background: white;

        border-color: #39A900;

        box-shadow:
            0 0 0 4px rgba(57,169,0,.09);

    }


    .clear-search {

        position: absolute;

        right: 12px;

        top: 50%;

        transform: translateY(-50%);

        color: #8d9691;

        text-decoration: none;

        font-size: 17px;

    }


    .clear-search:hover {

        color: #39A900;

    }


    /* =====================================================
       TABLA
    ====================================================== */

    .table-container {

        overflow-x: auto;

    }


    .centers-table {

        width: 100%;

        margin: 0;

        border-collapse: collapse;

    }


    .centers-table thead {

        background: #f8faf8;

    }


    .centers-table th {

        padding: 14px 22px;

        border-bottom: 1px solid #e7ebe8;

        color: #8a938e;

        font-size: 10px;

        font-weight: 800;

        letter-spacing: .8px;

        text-transform: uppercase;

        white-space: nowrap;

    }


    .centers-table td {

        padding: 17px 22px;

        border-bottom: 1px solid #f0f2f1;

        vertical-align: middle;

    }


    .centers-table tbody tr {

        transition: .18s ease;

    }


    .centers-table tbody tr:hover {

        background: #fbfdfb;

    }


    .centers-table tbody tr:last-child td {

        border-bottom: none;

    }


    .id-column {

        width: 70px;

    }


    .actions-column {

        width: 170px;

        text-align: right;

    }


    /* =====================================================
       ID
    ====================================================== */

    .center-id {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        min-width: 36px;

        height: 27px;

        padding: 0 8px;

        border-radius: 8px;

        background: #f1f4f2;

        color: #7b857f;

        font-size: 10px;

        font-weight: 800;

    }


    /* =====================================================
       CENTRO
    ====================================================== */

    .center-name {

        display: flex;

        align-items: center;

        gap: 12px;

        color: #28322d;

        text-decoration: none;

    }


    .center-avatar {

        flex-shrink: 0;

        width: 43px;
        height: 43px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background: #edf8e9;

        color: #39A900;

        font-size: 17px;

        transition: .2s ease;

    }


    .center-name:hover .center-avatar {

        background: #39A900;

        color: white;

        transform: scale(1.05);

    }


    .center-info {

        display: flex;

        flex-direction: column;

        gap: 3px;

        min-width: 180px;

    }


    .center-info strong {

        color: #303a35;

        font-size: 13px;

        font-weight: 750;

    }


    .center-info small {

        color: #9aa29d;

        font-size: 10px;

    }


    .center-name:hover .center-info strong {

        color: #39A900;

    }


    /* =====================================================
       UBICACIÓN
    ====================================================== */

    .location-info {

        display: flex;

        align-items: center;

        gap: 9px;

        max-width: 350px;

        color: #727c76;

        font-size: 12px;

        line-height: 1.4;

    }


    .location-icon {

        flex-shrink: 0;

        width: 29px;
        height: 29px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 9px;

        background: #f4f6f5;

        color: #87918b;

        font-size: 11px;

    }


    /* =====================================================
       ACCIONES
    ====================================================== */

    .actions {

        display: flex;

        align-items: center;

        justify-content: flex-end;

        gap: 6px;

    }


    .action-btn {

        height: 35px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 6px;

        padding: 0 10px;

        border: 1px solid #e2e7e4;

        border-radius: 9px;

        background: white;

        color: #727b76;

        text-decoration: none;

        font-size: 10px;

        font-weight: 700;

        transition: .2s ease;

    }


    .action-btn i {

        font-size: 12px;

    }


    .action-view:hover {

        color: #39A900;

        border-color: #39A900;

        background: #f5faF3;

    }


    .action-edit:hover {

        color: #555;

        border-color: #b8c0bb;

        background: #f5f6f5;

    }


    .delete-form {

        margin: 0;

    }


    .action-delete {

        width: 35px;
        height: 35px;

        display: inline-flex;

        align-items: center;
        justify-content: center;

        border: 1px solid #f4dddd;

        border-radius: 9px;

        background: #fff7f7;

        color: #e05252;

        cursor: pointer;

        transition: .2s ease;

    }


    .action-delete:hover {

        background: #e05252;

        border-color: #e05252;

        color: white;

        transform: translateY(-1px);

    }


    /* =====================================================
       ESTADO VACÍO
    ====================================================== */

    .empty-state {

        display: flex;

        align-items: center;

        flex-direction: column;

        justify-content: center;

        padding: 65px 25px;

        text-align: center;

    }


    .empty-icon {

        width: 70px;
        height: 70px;

        display: flex;

        align-items: center;
        justify-content: center;

        margin-bottom: 17px;

        border-radius: 20px;

        background: #f1f6ef;

        color: #73b94e;

        font-size: 28px;

    }


    .empty-state h3 {

        margin: 0 0 6px;

        color: #354039;

        font-size: 16px;

        font-weight: 750;

    }


    .empty-state p {

        margin: 0 0 15px;

        color: #939c97;

        font-size: 12px;

    }


    .empty-link {

        display: inline-flex;

        align-items: center;

        gap: 6px;

        color: #39A900;

        text-decoration: none;

        font-size: 12px;

        font-weight: 750;

    }


    .empty-link:hover {

        color: #2f8e00;

    }


    /* =====================================================
       PAGINACIÓN
    ====================================================== */

    .pagination-area {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        padding: 17px 25px;

        border-top: 1px solid #edf0ee;

        background: #fafbfa;

    }


    .pagination-info {

        color: #929a95;

        font-size: 11px;

    }


    .pagination-area .pagination {

        margin: 0;

    }


    .pagination-area .page-link {

        border-radius: 8px !important;

        margin: 0 2px;

        border: 1px solid #e1e6e3;

        color: #69736d;

        font-size: 11px;

    }


    .pagination-area .page-item.active .page-link {

        background: #39A900;

        border-color: #39A900;

        color: white;

    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 900px) {

        .page-header {

            align-items: flex-start;

            flex-direction: column;

        }

        .btn-new-center {

            width: 100%;

            justify-content: center;

        }

        .centers-toolbar {

            align-items: stretch;

            flex-direction: column;

        }

        .search-box {

            width: 100%;

        }

    }


    @media (max-width: 650px) {

        .centers-page .container {

            padding-left: 15px;

            padding-right: 15px;

        }

        .page-title {

            align-items: flex-start;

        }

        .title-icon {

            width: 48px;
            height: 48px;

            border-radius: 14px;

            font-size: 20px;

        }

        .page-title h1 {

            font-size: 22px;

        }

        .page-title p {

            font-size: 11px;

        }

        .centers-toolbar {

            padding: 18px;

        }

        .centers-table th,
        .centers-table td {

            padding-left: 15px;

            padding-right: 15px;

        }

        .center-info small {

            display: none;

        }

        .action-btn span {

            display: none;

        }

        .action-btn {

            width: 35px;

            padding: 0;

        }

        .pagination-area {

            flex-direction: column;

            align-items: center;

        }

    }

</style>

@endsection
