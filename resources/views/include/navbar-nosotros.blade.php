<nav class="navbar-nosotros">

    <div class="navbar-nosotros-container">

        <!-- Logotipo Institucional SENA -->
        <a class="navbar-brand d-flex align-items-center fw-bold m-0 text-dark" href="{{ url('/') }}" style="font-size: 1.4rem;">
            <img src="{{asset ('img/logoSENA2.png')}}" alt="Logo SENA" style="height: 40px;" class="me-2">
            <span>Admin<span style="color: #39A900;">SENA</span></span>
        </a>

        <!-- BOTONES -->
        <div class="navbar-actions">

            <a href="{{ url('/login') }}" class="btn-login-nav">
                Iniciar sesión
            </a>

            <a href="{{ url('/register') }}" class="btn-register-nav">
                Registrarse
            </a>

        </div>

    </div>
<style>

.navbar-nosotros {
    width: 100%;
    background: white;
    border-bottom: 1px solid #e8eee5;
    position: sticky;
    top: 0;
    z-index: 1000;
}

.navbar-nosotros-container {
    max-width: 1200px;
    margin: auto;
    padding: 15px 24px;

    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 30px;
}

/* LOGO */

.navbar-logo {
    display: flex;
    align-items: center;
    gap: 10px;

    text-decoration: none;
    color: #276f00;

    font-size: 20px;
    font-weight: 800;
}

.logo-circle {
    width: 40px;
    height: 40px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 12px;

    background: #39a900;
    color: white;

    font-weight: 800;
}

/* ENLACES */

.navbar-links {
    display: flex;
    align-items: center;
    gap: 28px;
}

.navbar-links a {
    color: #4d554b;
    text-decoration: none;

    font-size: 14px;
    font-weight: 600;

    transition: .2s;
}

.navbar-links a:hover,
.navbar-links a.active {
    color: #39a900;
}

/* BOTONES */

.navbar-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}

.btn-login-nav,
.btn-register-nav {
    text-decoration: none;
    padding: 10px 18px;
    border-radius: 10px;

    font-size: 14px;
    font-weight: 700;

    transition: .2s;
}

.btn-login-nav {
    color: #39a900;
    border: 1px solid #39a900;
    background: white;
}

.btn-login-nav:hover {
    background: #eef8eb;
}

.btn-register-nav {
    background: #39a900;
    color: white;
}

.btn-register-nav:hover {
    background: #276f00;
}

/* CELULAR */

@media (max-width: 768px) {

    .navbar-nosotros-container {
        flex-wrap: wrap;
        justify-content: center;
    }

    .navbar-links {
        order: 3;
        width: 100%;
        justify-content: center;
        gap: 18px;
        flex-wrap: wrap;
    }

    .navbar-actions {
        gap: 6px;
    }

}

</style>
</nav>