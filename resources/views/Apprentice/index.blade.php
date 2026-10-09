@extends('Layout.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/apprentice/ApprenticeIndex.css') }}">
@endsection

@section('content')

<div class="apprentice-index-page">

    <!-- =========================
         ENCABEZADO
    ========================== -->

    <div class="apprentice-index-page-header">

        <div class="apprentice-index-header-info">

            <div class="apprentice-index-header-icon">
                <i class="bi bi-people-fill"></i>
            </div>

            <div>
                <h1>Aprendices</h1>

                <p>
                    Administra y consulta la información de los aprendices
                    registrados.
                </p>
            </div>

        </div>

        <a href="{{ route('apprentice.create') }}" class="apprentice-index-btn-new">
            <i class="bi bi-plus-lg"></i>

            <span>Nuevo aprendiz</span>
        </a>

    </div>


    <!-- =========================
         ESTADÍSTICAS
    ========================== -->

    <div class="apprentice-index-stats-grid">

        <div class="apprentice-index-stat-card">

            <div class="apprentice-index-stat-icon apprentice-index-green">
                <i class="bi bi-people-fill"></i>
            </div>

            <div>
                <span class="apprentice-index-stat-label">
                    Total aprendices
                </span>

                <strong>{{ count($apprentices) }}</strong>
            </div>

        </div>


        <div class="apprentice-index-stat-card">

            <div class="apprentice-index-stat-icon apprentice-index-blue">
                <i class="bi bi-mortarboard-fill"></i>
            </div>

            <div>
                <span class="apprentice-index-stat-label">
                    Aprendices registrados
                </span>

                <strong>{{ count($apprentices) }}</strong>
            </div>

        </div>


        <div class="apprentice-index-stat-card">

            <div class="apprentice-index-stat-icon apprentice-index-purple">
                <i class="bi bi-laptop-fill"></i>
            </div>

            <div>
                <span class="apprentice-index-stat-label">
                    Equipos asignados
                </span>

                <strong>{{ collect($apprentices)->whereNotNull('computer_id')->count() }}</strong>
            </div>

        </div>

    </div>


    <!-- =========================
         CONTENEDOR PRINCIPAL
    ========================== -->

    <div class="apprentice-index-content-card">

        <!-- Barra superior -->

        <div class="apprentice-index-table-toolbar">

            <div>
                <h2>Lista de aprendices</h2>

                <p>Consulta, edita o elimina aprendices.</p>
            </div>


            <div class="apprentice-index-toolbar-actions">

                <div class="apprentice-index-search-box">
                    <i class="bi bi-search"></i>

                    <input
                        type="text"
                        id="searchApprentice"
                        placeholder="Buscar aprendiz..."
                    >
                </div>

            </div>

        </div>


        <!-- =========================
             TABLA
        ========================== -->

        <div class="apprentice-index-table-wrapper">

            <table class="apprentice-index-modern-table" id="apprenticesTable">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>APRENDIZ</th>
                        <th>CONTACTO</th>
                        <th>CURSO</th>
                        <th>EQUIPO</th>
                        <th class="apprentice-index-text-center">ACCIONES</th>
                    </tr>
                </thead>


                <tbody>

                @forelse ($apprentices as $apprentice)

                    @php
                        $initials = strtoupper(
                            collect(explode(' ', trim($apprentice['name'] ?? '')))
                                ->filter()
                                ->take(2)
                                ->map(fn ($part) => mb_substr($part, 0, 1))
                                ->implode('')
                        );
                    @endphp

                    <tr class="apprentice-index-apprentice-row">

                        <!-- ID -->
                        <td>
                            <span class="apprentice-index-id-badge">
                                #{{ $apprentice['id'] }}
                            </span>
                        </td>


                        <!-- APRENDIZ -->
                        <td>
                            <div class="apprentice-index-apprentice-info">

                                <div class="apprentice-index-avatar">
                                    {{ $initials }}
                                </div>

                                <div class="apprentice-index-name-container">
                                    <strong>{{ $apprentice['name'] }}</strong>

                                    <span>Aprendiz SENA</span>
                                </div>

                            </div>
                        </td>


                        <!-- CONTACTO -->
                        <td>
                            <div class="apprentice-index-contact-info">

                                <div>
                                    <i class="bi bi-envelope"></i>
                                    {{ $apprentice['email'] }}
                                </div>

                                <div>
                                    <i class="bi bi-telephone"></i>
                                    {{ $apprentice['cell_number'] }}
                                </div>

                            </div>
                        </td>


                        <!-- CURSO -->
                        <td>
                            <span class="apprentice-index-course-badge">
                                <i class="bi bi-book"></i>
                                Ficha {{ $apprentice['course_id'] }}
                            </span>
                        </td>


                        <!-- EQUIPO -->
                        <td>
                            @if($apprentice['computer_id'] ?? null)

                                <span class="apprentice-index-equipment-badge">
                                    <i class="bi bi-laptop"></i>
                                    PC {{ $apprentice['computer_id'] }}
                                </span>

                            @else

                                <span class="apprentice-index-no-equipment">
                                    Sin equipo
                                </span>

                            @endif
                        </td>


                        <!-- ACCIONES -->
                        <td>
                            <div class="apprentice-index-actions">

                                <!-- Ver -->
                                <a
                                    href="{{ route('apprentice.show', $apprentice['id']) }}"
                                    class="apprentice-index-action apprentice-index-view"
                                    title="Ver aprendiz"
                                >
                                    <i class="bi bi-eye"></i>
                                </a>


                                <!-- Editar -->
                                <a
                                    href="{{ route('apprentice.edit', $apprentice['id']) }}"
                                    class="apprentice-index-action apprentice-index-edit"
                                    title="Editar aprendiz"
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>


                                <!-- Eliminar -->
                                <form
                                    action="{{ route('apprentice.destroy', $apprentice['id']) }}"
                                    method="POST"
                                    style="margin: 0;"
                                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar este aprendiz?')"
                                >
                                    @csrf
                                    @method('delete')

                                    <button
                                        type="submit"
                                        class="apprentice-index-action apprentice-index-delete"
                                        title="Eliminar aprendiz"
                                    >
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6">

                            <div class="apprentice-index-empty-state">

                                <div class="apprentice-index-empty-icon">
                                    <i class="bi bi-people"></i>
                                </div>

                                <h3>No hay aprendices registrados</h3>

                                <p>Comienza agregando el primer aprendiz.</p>

                                <a
                                    href="{{ route('apprentice.create') }}"
                                    class="apprentice-index-btn-empty"
                                >
                                    <i class="bi bi-plus-lg"></i>
                                    Agregar aprendiz
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

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const searchInput = document.getElementById('searchApprentice');

        if (!searchInput) return;

        searchInput.addEventListener('keyup', function () {

            const search = this.value.toLowerCase();

            const rows = document.querySelectorAll(
                '#apprenticesTable tbody .apprentice-index-apprentice-row'
            );

            rows.forEach(function (row) {

                const text = row.textContent.toLowerCase();

                row.style.display = text.includes(search) ? '' : 'none';

            });

        });

    });
</script>
@endsection
