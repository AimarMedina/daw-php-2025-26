<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>

    <div class="login-box">
        <h1 class="login-title">Crear cuenta</h1>

        <form action="{{ route('register') }}" method="POST">
            @csrf

                <label for="name">Nombre</label>
                <input type="text" name="name" value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <label for="email">Correo</label>
                <input type="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <span class="error-msg">{{ $message }}</span>
                @enderror

                <label for="password">Contraseña</label>
                <input type="password" name="password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <label for="password_confirmation">Confirmar contraseña</label>
                <input type="password" name="password_confirmation">

                <button type="submit">Crear cuenta</button>
                <a href="{{ route('index') }}" class="btn">Volver al inicio</a>

        </form>
    </div>

</body>
</html>
