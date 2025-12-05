# Replica-Examen (Laravel) – Guía Definitiva y Visual

![Laravel](https://img.shields.io/badge/Laravel-10-red)
![PHP](https://img.shields.io/badge/PHP-8.2-blue)
![MySQL](https://img.shields.io/badge/MySQL-8-green)

Este proyecto simula la gestión de torneos de videojuegos.  
El README está pensado como un **manual completo para principiantes**, explicando **cada detalle del código, relaciones, vistas y flujo de la app**.

---

## 📂 Estructura del proyecto

```
app/
├─ Http/
│  ├─ Controllers/
│  │  ├─ TorneoUsuarioController.php  # Inscripción de usuarios
│  │  └─ TorneoController.php         # Listado y detalle de torneos
│  └─ Middleware/
│     └─ SetLocale.php                # Gestor de idioma
├─ Models/
│  ├─ User.php                        # Modelo de usuario
│  ├─ Torneo.php                       # Modelo de torneos
│  └─ TorneoUsuario.php               # Modelo pivot
database/
├─ migrations/                        # Migraciones de base de datos
resources/
├─ views/                             # Vistas Blade
routes/
└─ web.php                             # Rutas
```

---

## 🗄 Base de Datos y Relaciones

### Diagrama ER

```mermaid
erDiagram
    USERS ||--o{ TORNEO_USUARIO : inscribe
    TORNEOS ||--o{ TORNEO_USUARIO : contiene

    USERS {
        int id PK;
        string name;
        string email;
        string password;
        timestamp created_at;
        timestamp updated_at;
    }

    TORNEOS {
        int id PK;
        string titulo;
        text descripcion;
        date fecha_inicio;
        int plazas_totales;
        enum estado;
        int id_juego FK;
        timestamp created_at;
        timestamp updated_at;
    }

    TORNEO_USUARIO {
        int id PK;
        int id_Usuario FK;
        int id_Torneo FK;
        timestamp created_at;
        timestamp updated_at;
    }

```

- **users**: usuarios registrados.  
- **torneos**: torneos disponibles.  
- **torneo_usuario**: tabla pivot que guarda inscripciones y fecha de inscripción.

---

## 🔨 Migraciones Explicadas

### `create_users_table.php`

```php
Schema::create('users', function (Blueprint $table) {
    $table->id();               
    $table->string('name');     
    $table->string('email')->unique(); 
    $table->string('password'); 
    $table->rememberToken();    
    $table->timestamps();       
});
```

- Explicación:
  - `id`: clave primaria autoincremental.
  - `email->unique()`: no permite emails duplicados.
  - `timestamps()`: `created_at` y `updated_at`.

---

### `create_torneos_table.php`

```php
Schema::create('torneos', function (Blueprint $table) {
    $table->id();
    $table->string('titulo');
    $table->text('descripcion');
    $table->date('fecha_inicio');
    $table->integer('plazas_totales')->default(16);
    $table->enum('estado',['abierto','cerrado'])->default('abierto');
    $table->timestamps();
    $table->foreignId('id_juego')->constrained('juegos')->cascadeOnDelete();
});
```

- `enum estado`: solo `'abierto'` o `'cerrado'`.  
- `foreignId('id_juego')`: relación con tabla `juegos`.

---

### `create_torneo_usuario_table.php`

```php
Schema::create('torneo_usuario', function (Blueprint $table) {
    $table->id();
    $table->foreignId('id_Torneo')->constrained('torneos')->cascadeOnDelete()->cascadeOnUpdate();
    $table->foreignId('id_Usuario')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
    $table->timestamps();
});
```

- Tabla pivot para relación muchos a muchos entre usuarios y torneos.  
- Permite acceder a `$pivot->created_at` y `$pivot->updated_at`.

---

## 🔄 Modelos y Relaciones

### `User.php`

```php
public function torneo() {
    return $this->belongsToMany(
        Torneo::class,
        'torneo_usuario',
        'id_Usuario',
        'id_Torneo'
    );
}
```

- Cada usuario puede estar inscrito en **muchos torneos**.  
- Acceder a fecha de inscripción:

```php
$user = User::find(1);
foreach ($user->torneo as $torneo) {
    echo $torneo->pivot->created_at->format('Y/m/d');
}
```

---

### `Torneo.php`

```php
public function usuario() {
    return $this->belongsToMany(
        User::class,
        'torneo_usuario',
        'id_Torneo',
        'id_Usuario'
    );
}
```

- Cada torneo puede tener **muchos usuarios inscritos**.  
- Ejemplo en Blade:

```blade
@foreach ($torneo->usuario as $usuario)
    <li>{{ $usuario->name }} - {{ $usuario->pivot->created_at->format('Y/m/d') }}</li>
@endforeach
```

---

### `TorneoUsuario.php`

- Representa la tabla pivot.  
- Inserción directa:

```php
TorneoUsuario::create([
    'id_Usuario' => $userId,
    'id_Torneo' => $torneoId
]);
```

---

## 🧑‍💻 Controladores

### `TorneoUsuarioController`

```php
public function inscribirse($torneo_id){
    $user = Auth::user()->id;
    TorneoUsuario::create([
        'id_Usuario' => $user,
        'id_Torneo' => $torneo_id
    ]);
}
```

- Inserta la relación usuario-torneo.  
- Permite inscribirse desde la interfaz.

---

### `TorneoController`

- Listado y detalle de torneos.  
- Blade muestra usuarios inscritos:

```blade
@foreach ($torneo->usuario as $usuario)
    <li>{{ $usuario->name }} - {{ $usuario->pivot->created_at->format('Y/m/d') }}</li>
@endforeach
```

---

## 🌐 Middleware `SetLocale`

```php
app()->setLocale(session('locale','es'));
```

- Gestiona idioma automáticamente desde sesión.  
- Traducciones Blade: `{{ __('torneo.titulo') }}`.  
- Funciona incluso la **primera vez** que se visita la web.

---

## 📝 Funcionalidades Completas

1. Registro y login de usuarios.  
2. Listado de torneos.  
3. Detalle de torneo con usuarios inscritos.  
4. Inscripción a torneos (tabla pivot).  
5. Mostrar fecha de inscripción (solo día/mes/año).  
6. Cambio de idioma (Castellano / Euskera) con middleware.  
7. Blade templates dinámicos para torneos y usuarios.  
8. Validaciones en migraciones (`unique`, `enum`).  
9. Uso de `$pivot` para campos extra.  
10. Control total de relaciones muchos a muchos.  
11. Posibilidad de filtrar torneos por estado.  
12. Acceso a idioma desde sesión y cookie.

---

## 🔄 Flujo completo de la app

```mermaid
flowchart TD
    A[Usuario visita web] --> B[Registro/Login]
    B --> C[Listado de torneos]
    C --> D[Selecciona torneo]
    D --> E[Se inscribe en tabla pivot]
    E --> F[Blade muestra usuarios y fecha]
    F --> G[Selector de idioma (middleware aplica)]
```

---

## 🖥 Blade Templates Comentados

- Mostrar torneos:

```blade
@foreach ($torneos as $torneo)
    <h2>{{ $torneo->titulo }}</h2> <!-- Título del torneo -->
    <p>{{ $torneo->descripcion }}</p> <!-- Descripción -->
@endforeach
```

- Mostrar usuarios inscritos:

```blade
@foreach ($torneo->usuario as $usuario)
    <li>
        {{ $usuario->name }} <!-- Nombre usuario -->
        {{ $usuario->pivot->created_at->format('Y/m/d') }} <!-- Fecha inscripción -->
    </li>
@endforeach
```

- Selector de idioma:

```blade
<form action="{{ route('setCookie') }}" method="GET">
    <select name="idioma">
        <option value="es" {{ session('locale') == 'es' ? 'selected' : '' }}>Castellano</option>
        <option value="eus" {{ session('locale') == 'eus' ? 'selected' : '' }}>Euskera</option>
    </select>
    <input type="submit" value="Aceptar" class="btn">
</form>
```

---

## 📌 Capturas Simuladas

![Listado de torneos](screenshots/torneos.png)  
![Detalle de torneo](screenshots/torneo_detalle.png)  
![Selector de idioma](screenshots/selector_idioma.png)

> Sustituye por tus capturas reales en `screenshots/`.

---

## ⚡ Cómo Usar el Proyecto

1. Clonar repo:

```bash
git clone https://github.com/AimarMedina/daw-php-2025-26.git
cd Laravel/Replica-Examen
```

2. Instalar dependencias:

```bash
composer install
npm install
npm run dev
```

3. Configurar `.env` con la base de datos.  
4. Ejecutar migraciones:

```bash
php artisan migrate
```

5. Iniciar servidor:

```bash
php artisan serve
```

6. Abrir navegador en `http://127.0.0.1:8000`.

---

## 📄 Licencia

Proyecto educativo para **prácticas de Laravel y relaciones entre modelos**.
