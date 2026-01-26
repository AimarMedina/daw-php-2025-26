<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="form">


        <h1 class="login-title">Iniciar sesión</h1>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <label for="email">Correo:</label>
            <input type="email" name="email" id="email" required value="{{ old('email') }}">

            @error('email')
                <div class="error-msg">{{ $message }}</div>
            @enderror

            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>

            @error('password')
                <div class="error-msg">{{ $message }}</div>
            @enderror

            <button type="submit" class="login-btn">Entrar</button>
            <a href="{{ route('index') }}" class="btn">Volver al inicio</a>
        </form>
    </div>

</body>

</html>
