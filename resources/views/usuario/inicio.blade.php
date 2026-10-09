@extends('layout.app')

@section('content')

<div class="container py-5">

    {{-- Bienvenida principal --}}
    <div class="position-relative overflow-hidden bg-success rounded-4 shadow-sm text-white p-4 p-md-5">

        {{-- Elementos decorativos --}}
        <div 
            class="position-absolute rounded-circle bg-white opacity-10"
            style="width: 250px; height: 250px; right: -80px; top: -100px;"
        ></div>

        <div 
            class="position-absolute rounded-circle bg-white opacity-10"
            style="width: 180px; height: 180px; right: 100px; bottom: -100px;"
        ></div>


        <div class="row align-items-center position-relative">

            {{-- Texto --}}
            <div class="col-md-8">

                <span class="badge bg-white text-success px-3 py-2 rounded-pill mb-3">
                    Sistema de Administración
                </span>

                <h1 class="display-5 fw-bold mb-3">
                    ¡Bienvenido!
                </h1>

                <p class="fs-5 mb-3" style="max-width: 650px;">
                    Nos alegra tenerte aquí. Desde este espacio podrás
                    acceder de manera sencilla a las diferentes funciones
                    del sistema.
                </p>

                <p class="mb-0 opacity-75">
                    Explora el menú superior para comenzar a utilizar
                    el aplicativo y consultar la información disponible.
                </p>

            </div>


            {{-- Icono --}}
            <div class="col-md-4 text-center mt-4 mt-md-0">

                <div
                    class="bg-white bg-opacity-10 rounded-circle
                           d-inline-flex align-items-center justify-content-center"
                    style="width: 170px; height: 170px;"
                >

                    <i class="bi bi-mortarboard-fill"
                       style="font-size: 6rem;">
                    </i>

                </div>

            </div>

        </div>

    </div>


    {{-- Mensaje inferior --}}
    <div class="text-center mt-5">

        <h4 class="fw-bold">
            Todo lo que necesitas, en un solo lugar.
        </h4>

        <p class="text-muted mb-0">
            Utiliza las opciones del menú para navegar por el sistema.
        </p>

    </div>

</div>

@endsection