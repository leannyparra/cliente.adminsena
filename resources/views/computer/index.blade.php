@extends('Layout.app')

@section('content')

<div class="computers-page">

```
<!-- =========================
     ENCABEZADO
========================== -->

<div class="computers-header">

    <div class="header-info">

        <div class="header-icon">
            <i class="bi bi-pc-display"></i>
        </div>

        <div>
            <h1>Equipos de cómputo</h1>

            <p>
                Administra y controla los computadores asignados al centro.
            </p>
        </div>

    </div>


    <a
        href="{{ url('computer/create') }}"
        class="create-computer-btn"
    >
        <i class="bi bi-plus-lg"></i>
        Nuevo computador
    </a>

</div>


<!-- =========================
     TARJETA DE RESUMEN
========================== -->

<div class="computers-summary">

    <div class="summary-icon">
        <i class="bi bi-laptop"></i>
    </div>

    <div class="summary-content">

        <span>TOTAL DE EQUIPOS</span>

        <strong>{{ count($computers) }}</strong>

    </div>

    <div class="summary-decoration">
        <i class="bi bi-pc-display-horizontal"></i>
    </div>

</div>


<!-- =========================
     CONTENEDOR PRINCIPAL
========================== -->

<div class="computers-container">

    <!-- Barra superior -->

    <div class="computers-toolbar">

        <div>

            <h2>
                Inventario de equipos
            </h2>

            <p>
                Consulta y administra los computadores registrados.
            </p>

        </div>


        <!-- BUSCADOR -->

        <form
            action="{{ route('computer.index') }}"
            method="GET"
            class="search-form"
        >

            <div class="search-wrapper">

                <i class="bi bi-search"></i>

                <input
                    type="search"
                    name="search"
                    placeholder="Buscar equipo o marca..."
                    value="{{ request('search') }}"
                >

                @if(request('search'))

                    <a
                        href="{{ route('computer.index') }}"
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

        <table class="computers-table">

            <thead>

                <tr>

                    <th class="id-column">
                        ID
                    </th>

                    <th>
                        Equipo
                    </th>

                    <th>
                        Marca
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

                @forelse($computers as $computer)

                    <tr>

                        <!-- ID -->

                        <td>

                            <span class="computer-id">
                                #{{ $computer['id'] }}
                            </span>

                        </td>


                        <!-- EQUIPO -->

                        <td>

                            <div class="computer-name-wrapper">

                                <div class="computer-mini-icon">
                                    <i class="bi bi-laptop"></i>
                                </div>

                                <div>

                                    <a
                                        href="{{ url('computer/' . $computer['id']) }}"
                                        class="computer-name"
                                    >
                                        Computador {{ $computer['number'] }}
                                    </a>

                                    <span class="computer-subtitle">
                                        Equipo registrado en el inventario
                                    </span>

                                </div>

                            </div>

                        </td>


                        <!-- MARCA -->

                        <td>

                            <span class="brand-badge">

                                <i class="bi bi-tag"></i>

                                {{ $computer['brand'] }}

                            </span>

                        </td>


                        <!-- ESTADO -->

                        <td>

                            <span class="status-badge">

                                <i class="bi bi-check-circle-fill"></i>

                                Disponible

                            </span>

                        </td>


                        <!-- ACCIONES -->

                        <td>

                            <div class="action-buttons">

                                <!-- VER -->

                                <a
                                    href="{{ route('computer.show', $computer['id']) }}"
                                    class="action-btn view-btn"
                                    title="Ver detalles"
                                >
                                    <i class="bi bi-eye"></i>
                                </a>

                                <!-- EDITAR -->

                                <a
                                    href="{{ route('computer.edit', $computer['id']) }}"
                                    class="action-btn edit-btn"
                                    title="Editar equipo"
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>


                                <!-- ELIMINAR -->

                                <form
                                    action="{{ route('computer.destroy', $computer['id']) }}"
                                    method="POST"
                                    class="delete-form"
                                >

                                    @csrf
                                    @method('delete')

                                    <button
                                        type="submit"
                                        class="action-btn delete-btn"
                                        title="Eliminar equipo"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este equipo?')"
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
                            colspan="5"
                            class="empty-cell"
                        >

                            <div class="empty-state">

                                <div class="empty-icon">
                                    <i class="bi bi-pc-display"></i>
                                </div>

                                <h3>
                                    No hay equipos registrados
                                </h3>

                                <p>
                                    No se encontraron computadores con los criterios de búsqueda.
                                </p>

                                <a
                                    href="{{ url('computer/create') }}"
                                    class="empty-button"
                                >
                                    <i class="bi bi-plus-lg"></i>
                                    Registrar primer equipo
                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

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

    .computers-page {

        max-width: 1100px;

        margin: 0 auto;

        padding: 35px 25px 60px;

    }


    /* =========================
       HEADER
    ========================== */

    .computers-header {

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
       BOTÓN NUEVO
    ========================== */

    .create-computer-btn {

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

    .create-computer-btn:hover {

        background: #2d8b00;

        color: white;

        transform: translateY(-2px);

        box-shadow:
            0 9px 20px rgba(57,169,0,.24);

    }


    /* =========================
       RESUMEN
    ========================== */

    .computers-summary {

        position: relative;

        display: flex;

        align-items: center;

        overflow: hidden;

        width: 270px;

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

    .computers-container {

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

    .computers-toolbar {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        padding: 21px 24px;

        background: #fff;

        border-bottom: 1px solid #edf0ed;

    }

    .computers-toolbar h2 {

        margin: 0;

        color: #29322c;

        font-size: 15px;

        font-weight: 720;

    }

    .computers-toolbar p {

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

    .search-wrapper input::placeholder {

        color: #aab0ac;

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

    .computers-table {

        width: 100%;

        border-collapse: collapse;

        min-width: 800px;

    }

    .computers-table thead {

        background: #f8faf8;

    }

    .computers-table th {

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

    .computers-table th.id-column {
        width: 80px;
    }

    .computers-table th.status-column {
        width: 150px;
    }

    .computers-table th.actions-column {

        width: 150px;

        text-align: center;

    }


    /* =========================
       FILAS
    ========================== */

    .computers-table tbody tr {

        transition: .2s;

        border-bottom: 1px solid #f0f2f0;

    }

    .computers-table tbody tr:last-child {
        border-bottom: none;
    }

    .computers-table tbody tr:hover {
        background: #fbfdfb;
    }

    .computers-table td {

        padding: 16px 22px;

        color: #454d47;

        font-size: 12px;

        vertical-align: middle;

    }


    /* =========================
       ID
    ========================== */

    .computer-id {

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
       EQUIPO
    ========================== */

    .computer-name-wrapper {

        display: flex;

        align-items: center;

        gap: 12px;

    }

    .computer-mini-icon {

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

    .computer-name {

        display: block;

        color: #29312c;

        text-decoration: none;

        font-size: 12px;

        font-weight: 700;

        transition: .2s;

    }

    .computer-name:hover {
        color: #39A900;
    }

    .computer-subtitle {

        display: block;

        margin-top: 3px;

        color: #a0a7a2;

        font-size: 9px;

    }


    /* =========================
       MARCA
    ========================== */

    .brand-badge {

        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 7px 10px;

        border-radius: 9px;

        background: #f5f7f5;

        border: 1px solid #e8ebe8;

        color: #5e675f;

        font-size: 10px;

        font-weight: 650;

    }

    .brand-badge i {

        color: #39A900;

        font-size: 11px;

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

        text-align: center;

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

        .computers-page {

            padding: 25px 15px 40px;

        }

        .computers-header {

            align-items: flex-start;

            flex-direction: column;

        }

        .create-computer-btn {

            width: 100%;

        }

        .computers-summary {

            width: 100%;

        }

        .computers-toolbar {

            align-items: stretch;

            flex-direction: column;

        }

        .search-form {

            width: 100%;

        }

    }

</style>

@endsection
