# Sistema de Gestión de Tickets - Backend Laravel

Una API RESTful completa para la gestión de tickets construida con Laravel.

## Características

- Endpoints API RESTful para gestión de tickets
- Operaciones CRUD para tickets
- Filtrado por estado, prioridad y búsqueda
- Paginación

## Instalación
composer install
cp .env.example .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tickets_db
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña

php artisan key:generate

php artisan migrate

php artisan serve

Endpoints de la API
Tickets

    GET /api/tickets - Listar todos los tickets con paginación y filtros

    POST /api/tickets - Crear un nuevo ticket

    PUT /api/tickets/{id} - Actualizar un ticket

    DELETE /api/tickets/{id} - Eliminar un ticket

Parámetros de consulta para GET /api/tickets

    page - Número de página para paginación (por defecto: 1)

    status - Filtrar por estado (open, pending, closed)

    priority - Filtrar por prioridad (low, medium, high)

    search - Buscar en títulos de tickets
