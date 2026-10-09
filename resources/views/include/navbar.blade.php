<!-- Navbar completamente plano de pantalla completa (colores institucionales) -->
<nav class="navbar navbar-expand-lg bg-white border-bottom py-3 style-flat-navbar">
    <div class="container-fluid px-4 px-md-5">

        <!-- Logotipo Institucional SENA -->
        <a class="navbar-brand d-flex align-items-center fw-bold m-0 text-dark"
           href="{{ url('/') }}"
           style="font-size: 1.4rem;">

            <img src="{{ asset('img/logoSENA2.png') }}"
                 alt="Logo SENA"
                 style="height: 40px;"
                 class="me-2">

            <span>
                Admin<span style="color: #39A900;">SENA</span>
            </span>
        </a>


        <!-- Botón Móvil -->
        <button class="navbar-toggler border-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#flatNavbarSena"
                aria-controls="flatNavbarSena"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>


        <!-- Menú de Navegación -->
        <div class="collapse navbar-collapse" id="flatNavbarSena">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-5 gap-3">


                <!-- ========================= -->
                <!-- INICIO -->
                <!-- ========================= -->
                <li class="nav-item">

                    <a class="nav-link px-2
                        {{ Request::is('nosotros*')
                            ? 'active fw-bold text-dark position-relative active-green-line'
                            : 'fw-medium text-secondary hover-dark-link' }}"
                       href="#">

                        Inicio

                    </a>

                </li>



                <!-- ========================= -->
                <!-- GESTIÓN BASE -->
                <!-- ========================= -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle fw-medium px-2
                        {{ (Request::is('training-center*') ||
                            Request::is('area*') ||
                            Request::is('computer*'))
                            ? 'active fw-bold text-dark position-relative active-green-line'
                            : 'text-secondary hover-dark-link' }}"

                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

                        Gestión Base

                    </a>


                    <ul class="dropdown-menu border shadow-sm mt-2">

                        <!-- Centros -->
                        <li>

                            <a class="dropdown-item
                                {{ Request::is('training-center*')
                                    ? 'bg-light fw-bold text-success'
                                    : '' }}"

                               href="{{ route('trainingCenter.index') }}">

                                <i class="bi bi-building me-2"></i>
                                Centros de Formación

                            </a>

                        </li>


                        <!-- Áreas -->
                        <li>

                            <a class="dropdown-item
                                {{ Request::is('area*')
                                    ? 'bg-light fw-bold text-success'
                                    : '' }}"

                               href="{{ route('area.index') }}">

                                <i class="bi bi-diagram-3 me-2"></i>
                                Áreas

                            </a>

                        </li>


                        <!-- Equipos -->
                        <li>

                            <a class="dropdown-item
                                {{ Request::is('computer*')
                                    ? 'bg-light fw-bold text-success'
                                    : '' }}"

                               href="{{ route('computer.index') }}">

                                <i class="bi bi-pc-display me-2"></i>
                                Equipos

                            </a>

                        </li>

                    </ul>

                </li>



                <!-- ========================= -->
                <!-- OPERACIÓN ACADÉMICA -->
                <!-- ========================= -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle fw-medium px-2
                        {{ (Request::is('teacher*') ||
                            Request::is('course*') ||
                            Request::is('apprentice*'))
                            ? 'active fw-bold text-dark position-relative active-green-line'
                            : 'text-secondary hover-dark-link' }}"

                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

                        Operación Académica

                    </a>


                    <ul class="dropdown-menu border shadow-sm mt-2">

                        <!-- Instructores -->
                        <li>

                            <a class="dropdown-item
                                {{ Request::is('teacher*')
                                    ? 'bg-light fw-bold text-success'
                                    : '' }}"

                               href="{{ route('teacher.index') }}">

                                <i class="bi bi-person-workspace me-2"></i>
                                Instructores

                            </a>

                        </li>


                        <!-- Cursos -->
                        <li>

                            <a class="dropdown-item
                                {{ Request::is('course*')
                                    ? 'bg-light fw-bold text-success'
                                    : '' }}"

                               href="{{ route('course.index') }}">

                                <i class="bi bi-book me-2"></i>
                                Cursos / Fichas

                            </a>

                        </li>


                        <!-- Aprendices -->
                        <li>

                            <a class="dropdown-item
                                {{ Request::is('apprentice*')
                                    ? 'bg-light fw-bold text-success'
                                    : '' }}"

                               href="{{ route('apprentice.index') }}">

                                <i class="bi bi-people me-2"></i>
                                Aprendices

                            </a>

                        </li>

                    </ul>

                </li>



                <!-- ========================= -->
                <!-- OFERTAS -->
                <!-- ========================= -->
                <li class="nav-item">

                    <a class="nav-link px-2
                        {{ Request::is('offer*')
                            ? 'active fw-bold text-dark position-relative active-green-line'
                            : 'fw-medium text-secondary hover-dark-link' }}"

                       href="#">

                        <i class="bi bi-megaphone me-1"></i>
                        Ofertas

                    </a>

                </li>


            </ul>



            <!-- ========================= -->
            <!-- BUSCADOR GENERAL -->
            <!-- ========================= -->

            <form class="d-flex align-items-center justify-content-end position-relative"
                  role="search"
                  style="max-width: 320px; width: 100%;">

                <input
                    class="form-control rounded-start-pill bg-light border-0 pe-5 py-2"
                    type="search"
                    placeholder="Buscar..."
                    aria-label="Search"
                    style="font-size: 0.95rem;"
                >

                <button
                    class="btn rounded-end-pill position-absolute end-0 top-0 h-100 px-4 d-flex align-items-center justify-content-center text-white"
                    type="submit"
                    style="background-color: #39A900;">

                    <i class="bi bi-search"></i>

                </button>

            </form>

        </div>

    </div>
</nav>



<!-- ========================= -->
<!-- ESTILOS -->
<!-- ========================= -->

<style>

    /* Navbar de pantalla completa */
    .style-flat-navbar {

        width: 100vw !important;

        position: relative !important;

        left: 50% !important;

        right: 50% !important;

        margin-left: -50vw !important;

        margin-right: -50vw !important;

        box-shadow: none !important;

    }


    /* Línea verde del elemento activo */
    .active-green-line::after {

        content: '';

        position: absolute;

        bottom: -6px;

        left: 0;

        width: 100%;

        height: 3px;

        background-color: #39A900;

        border-radius: 2px;

    }


    /* Efecto hover */
    .hover-dark-link:hover {

        color: #212529 !important;

    }


    /* Dropdown */
    .dropdown-menu {

        border-radius: 10px;

        padding: 8px;

    }


    /* Elementos del dropdown */
    .dropdown-item {

        border-radius: 7px;

        padding: 9px 12px;

        transition: all 0.2s ease;

    }


    .dropdown-item:hover {

        background-color: #f1f8ed;

        color: #39A900;

    }


    /* Flecha del dropdown */
    .dropdown-toggle::after {

        vertical-align: middle;

        margin-left: 5px;

    }


    /* Iconos */
    .dropdown-item i {

        width: 20px;

        text-align: center;

    }

</style>