@extends('Layout.app')

@section('content')

<div class="areas-page">


<!-- =========================
     ENCABEZADO
========================== -->

<div class="areas-header">

    <div class="header-info">

        <div class="header-icon">
            <i class="bi bi-diagram-3-fill"></i>
        </div>

        <div>
            <h1>Áreas del centro</h1>
            <p>Gestiona las áreas de formación y administración.</p>
        </div>

    </div>

    <a href="{{ url('area/create') }}" class="create-area-btn">
        <i class="bi bi-plus-lg"></i>
        Nueva área
    </a>

</div>


<!-- =========================
     TARJETA DE RESUMEN
========================== -->

<div class="areas-summary">

    <div class="summary-icon">
        <i class="bi bi-buildings"></i>
    </div>

    <div class="summary-content">
        <span>TOTAL DE ÁREAS</span>
        
        <strong>{{ count($areas) }}</strong>

    </div>

    <div class="summary-decoration">
        <i class="bi bi-grid-3x3-gap"></i>
    </div>

</div>


<!-- =========================
     CONTENEDOR PRINCIPAL
========================== -->

<div class="areas-container">

    <!-- Barra superior -->

    <div class="areas-toolbar">

        <div>
            <h2>Áreas registradas</h2>

            <p>
                Consulta y administra las áreas disponibles.
            </p>
        </div>


        <!-- BUSCADOR -->

        <form
            action="{{ route('area.index') }}"
            method="GET"
            class="search-form"
        >

            <div class="search-wrapper">

                <i class="bi bi-search"></i>

                <input
                    type="search"
                    name="search"
                    placeholder="Buscar área..."
                    value="{{ request('search') }}"
                >

                @if(request('search'))

                    <a
                        href="{{ route('area.index') }}"
                        class="clear-search"
                        title="Limpiar búsqueda"
                    >
                        <i class="bi bi-x"></i>
                    </a>

                @endif

            </div>

        </form>

    </div>


    <!-- =========================
         TABLA
    ========================== -->

    <div class="table-wrapper">

        <table class="areas-table">

            <thead>

                <tr>

                    <th class="id-column">
                        ID
                    </th>

                    <th>
                        Área
                    </th>

                    <th class="status-column">
                        Estado
                    </th>

                    <th class="actions-column">
                        Acciones
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($areas as $area)

                    <tr>

                        <!-- ID -->

                        <td>

                            <span class="area-id">
                                #{{ $area['id'] }}
                            </span>

                        </td>


                        <!-- NOMBRE DEL ÁREA -->

                        <td>

                            <div class="area-name-wrapper">

                                <div class="area-mini-icon">
                                    <i class="bi bi-building"></i>
                                </div>

                                <div>

                                    <a
                                        href="{{ url('area/' . $area['id']) }}"
                                        class="area-name"
                                    >
                                        {{ $area['name'] }}
                                    </a>

                                    <span class="area-subtitle">
                                        Área registrada en el centro
                                    </span>

                                </div>

                            </div>

                        </td>


                        <!-- ESTADO -->

                        <td>

                            <span class="status-badge">

                                <i class="bi bi-check-circle-fill"></i>

                                Activa

                            </span>

                        </td>


                        <!-- ACCIONES -->

                        <td>

                            <div class="action-buttons">

                                <!-- VER -->

                                <a
                                    href="{{ route('area.show', $area['id']) }}"
                                    class="action-btn view-btn"
                                    title="Ver detalles"
                                >
                                    <i class="bi bi-eye"></i>
                                </a>

                                
                                <!-- EDITAR -->

                                <a
                                    href="{{ route('area.edit', $area['id']) }}"
                                    class="action-btn edit-btn"
                                    title="Editar área"
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>


                                <!-- ELIMINAR -->

                                <form
                                    action="{{ route('area.destroy', $area['id']) }}"
                                    method="POST"
                                    class="delete-form"
                                >

                                    @csrf
                                    @method('delete')

                                    <button
                                        type="submit"
                                        class="action-btn delete-btn"
                                        title="Eliminar área"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta área?')"
                                    >

                                        <i class="bi bi-trash3"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="4"
                            class="empty-cell"
                        >

                            <div class="empty-state">

                                <div class="empty-icon">
                                    <i class="bi bi-building-x"></i>
                                </div>

                                <h3>
                                    No hay áreas registradas
                                </h3>

                                <p>
                                    No se encontraron áreas con los criterios de búsqueda.
                                </p>

                                <a
                                    href="{{ url('area/create') }}"
                                    class="empty-button"
                                >
                                    <i class="bi bi-plus-lg"></i>
                                    Registrar primera área
                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


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

    .areas-page {
        max-width: 1100px;
        margin: 0 auto;
        padding: 35px 25px 60px;
    }


    /* =========================
       HEADER
    ========================== */

    .areas-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
    }

    .header-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .header-icon {
        width: 55px;
        height: 55px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 16px;

        background: linear-gradient(
            135deg,
            #39A900,
            #2d8500
        );

        color: white;

        font-size: 22px;

        box-shadow:
            0 8px 20px rgba(57,169,0,.18);
    }

    .header-info h1 {
        margin: 0;
        color: #202922;
        font-size: 28px;
        font-weight: 750;
        letter-spacing: -.7px;
    }

    .header-info p {
        margin: 4px 0 0;
        color: #858e88;
        font-size: 13px;
    }


    /* =========================
       BOTÓN NUEVA ÁREA
    ========================== */

    .create-area-btn {

        height: 44px;

        padding: 0 18px;

        display: inline-flex;

        align-items: center;
        justify-content: center;

        gap: 8px;

        border-radius: 11px;

        background: #39A900;

        color: white;

        text-decoration: none;

        font-size: 12px;

        font-weight: 700;

        box-shadow:
            0 6px 15px rgba(57,169,0,.18);

        transition: .25s;
    }

    .create-area-btn:hover {

        background: #2d8b00;

        color: white;

        transform: translateY(-2px);

        box-shadow:
            0 9px 20px rgba(57,169,0,.24);
    }


    /* =========================
       RESUMEN
    ========================== */

    .areas-summary {

        position: relative;

        display: flex;

        align-items: center;

        overflow: hidden;

        width: 260px;

        height: 82px;

        margin-bottom: 20px;

        padding: 15px 18px;

        border-radius: 15px;

        background: white;

        border: 1px solid #e6ebe6;

        box-shadow:
            0 5px 20px rgba(30,50,35,.04);
    }

    .summary-icon {

        width: 45px;
        height: 45px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 13px;

        background: #eaf7e3;

        color: #39A900;

        font-size: 19px;
    }

    .summary-content {
        margin-left: 12px;
    }

    .summary-content span {

        display: block;

        color: #929a94;

        font-size: 8px;

        font-weight: 750;

        letter-spacing: 1px;
    }

    .summary-content strong {

        display: block;

        margin-top: 2px;

        color: #283129;

        font-size: 24px;

        line-height: 1;
    }

    .summary-decoration {

        position: absolute;

        right: -10px;

        bottom: -13px;

        color: #f1f6ef;

        font-size: 75px;
    }


    /* =========================
       CONTENEDOR
    ========================== */

    .areas-container {

        overflow: hidden;

        background: white;

        border: 1px solid #e5eae6;

        border-radius: 18px;

        box-shadow:
            0 8px 30px rgba(30,50,35,.05);
    }


    /* =========================
       TOOLBAR
    ========================== */

    .areas-toolbar {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        padding: 21px 24px;

        background: #fff;

        border-bottom: 1px solid #edf0ed;
    }

    .areas-toolbar h2 {

        margin: 0;

        color: #29322c;

        font-size: 15px;

        font-weight: 720;
    }

    .areas-toolbar p {

        margin: 4px 0 0;

        color: #9aa19c;

        font-size: 10px;
    }


    /* =========================
       BUSCADOR
    ========================== */

    .search-form {
        width: 280px;
    }

    .search-wrapper {
        position: relative;
    }

    .search-wrapper > i {

        position: absolute;

        left: 13px;

        top: 50%;

        transform: translateY(-50%);

        color: #9ba39d;

        font-size: 14px;

        pointer-events: none;
    }

    .search-wrapper input {

        width: 100%;

        height: 40px;

        padding: 0 38px;

        border: 1px solid #e1e6e2;

        border-radius: 10px;

        outline: none;

        background: #f9faf9;

        color: #404840;

        font-size: 11px;

        transition: .2s;
    }

    .search-wrapper input:focus {

        background: white;

        border-color: #8acb68;

        box-shadow:
            0 0 0 3px rgba(57,169,0,.07);
    }

    .clear-search {

        position: absolute;

        right: 10px;

        top: 50%;

        transform: translateY(-50%);

        color: #9ba39d;

        text-decoration: none;

        font-size: 14px;
    }

    .clear-search:hover {
        color: #ef4444;
    }


    /* =========================
       TABLA
    ========================== */

    .table-wrapper {
        overflow-x: auto;
    }

    .areas-table {

        width: 100%;

        border-collapse: collapse;

        min-width: 700px;
    }

    .areas-table thead {
        background: #f8faf8;
    }

    .areas-table th {

        height: 46px;

        padding: 0 22px;

        color: #929a94;

        font-size: 9px;

        font-weight: 750;

        letter-spacing: .7px;

        text-transform: uppercase;

        text-align: left;

        border-bottom: 1px solid #e9ede9;
    }

    .areas-table th.id-column {
        width: 90px;
    }

    .areas-table th.status-column {
        width: 150px;
    }

    .areas-table th.actions-column {

        width: 150px;

        text-align: center;
    }


    /* =========================
       FILAS
    ========================== */

    .areas-table tbody tr {

        transition: .2s;

        border-bottom: 1px solid #f0f2f0;
    }

    .areas-table tbody tr:last-child {
        border-bottom: none;
    }

    .areas-table tbody tr:hover {
        background: #fbfdfb;
    }

    .areas-table td {

        padding: 16px 22px;

        color: #454d47;

        font-size: 12px;

        vertical-align: middle;
    }


    /* =========================
       ID
    ========================== */

    .area-id {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        min-width: 42px;

        height: 27px;

        padding: 0 8px;

        border-radius: 8px;

        background: #f3f5f3;

        color: #788079;

        font-size: 10px;

        font-weight: 700;
    }


    /* =========================
       NOMBRE
    ========================== */

    .area-name-wrapper {

        display: flex;

        align-items: center;

        gap: 12px;
    }

    .area-mini-icon {

        width: 40px;

        height: 40px;

        flex-shrink: 0;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 11px;

        background: #eaf7e3;

        color: #39A900;

        font-size: 16px;
    }

    .area-name {

        display: block;

        color: #29312c;

        text-decoration: none;

        font-size: 12px;

        font-weight: 700;

        transition: .2s;
    }

    .area-name:hover {
        color: #39A900;
    }

    .area-subtitle {

        display: block;

        margin-top: 3px;

        color: #a0a7a2;

        font-size: 9px;
    }


    /* =========================
       ESTADO
    ========================== */

    .status-badge {

        display: inline-flex;

        align-items: center;

        gap: 6px;

        padding: 6px 10px;

        border-radius: 20px;

        background: #eef8e9;

        color: #43872b;

        font-size: 9px;

        font-weight: 650;
    }

    .status-badge i {
        font-size: 9px;
    }


    /* =========================
       ACCIONES
    ========================== */

    .action-buttons {

        display: flex;

        align-items: center;

        justify-content: center;

        gap: 7px;
    }

    .action-btn {

        width: 35px;

        height: 35px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        padding: 0;

        border-radius: 9px;

        text-decoration: none;

        border: 1px solid transparent;

        cursor: pointer;

        transition: .2s;
    }


    /* VER */

    .view-btn {

        background: #f2f5f8;

        border-color: #e3e8ed;

        color: #64748b;
    }

    .view-btn:hover {

        background: #64748b;

        border-color: #64748b;

        color: white;

        transform: translateY(-2px);
    }


    /* EDITAR */

    .edit-btn {

        background: #eaf7e3;

        border-color: #d9edcf;

        color: #39A900;
    }

    .edit-btn:hover {

        background: #39A900;

        border-color: #39A900;

        color: white;

        transform: translateY(-2px);

        box-shadow:
            0 4px 10px rgba(57,169,0,.2);
    }


    /* ELIMINAR */

    .delete-form {

        margin: 0;

        padding: 0;
    }

    .delete-btn {

        background: #fff3f3;

        border-color: #f9dddd;

        color: #ef4444;
    }

    .delete-btn:hover {

        background: #ef4444;

        border-color: #ef4444;

        color: white;

        transform: translateY(-2px);

        box-shadow:
            0 4px 10px rgba(239,68,68,.18);
    }


    /* =========================
       SIN RESULTADOS
    ========================== */

    .empty-cell {
        padding: 0 !important;
    }

    .empty-state {

        display: flex;

        flex-direction: column;

        align-items: center;

        justify-content: center;

        padding: 60px 20px;
    }

    .empty-icon {

        width: 65px;

        height: 65px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 18px;

        background: #f2f6f1;

        color: #9ba59c;

        font-size: 28px;

        margin-bottom: 15px;
    }

    .empty-state h3 {

        margin: 0;

        color: #4b544e;

        font-size: 15px;

        font-weight: 700;
    }

    .empty-state p {

        margin: 6px 0 17px;

        color: #9ba19d;

        font-size: 11px;
    }

    .empty-button {

        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 9px 14px;

        border-radius: 9px;

        background: #39A900;

        color: white;

        text-decoration: none;

        font-size: 10px;

        font-weight: 650;

        transition: .2s;
    }

    .empty-button:hover {

        background: #2d8b00;

        color: white;
    }


    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 700px) {

        .areas-page {
            padding: 25px 15px 40px;
        }

        .areas-header {

            align-items: flex-start;

            flex-direction: column;
        }

        .create-area-btn {
            width: 100%;
        }

        .areas-summary {
            width: 100%;
        }

        .areas-toolbar {

            align-items: stretch;

            flex-direction: column;
        }

        .search-form {
            width: 100%;
        }

    }

</style>

@endsection
