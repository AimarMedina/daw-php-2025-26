    @vite(['resources/css/app.css', 'resources/js/app.js'])


<div class="error-wrapper">
    <h1 class="error-title">Acceso denegado</h1>

    <p class="error-message">
        No tienes permiso para acceder a esta página.<br>
        Incia sesion para acceder
    </p>

    <a href="{{ route('index') }}" class="error-btn">Volver al inicio</a>
    <a href="{{ route('loginForm') }}" class="error-btn">Inciciar Sesión</a>
</div>

