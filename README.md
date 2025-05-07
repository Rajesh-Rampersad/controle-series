# 📦 Laravel + Docker + PostgreSQL

Este proyecto Laravel utiliza Docker y PostgreSQL como base de datos. A continuación se detallan los pasos para levantar el entorno de desarrollo y ejecutar la aplicación desde cero.

---

## 🚀 Requisitos

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

---

## ⚙️ Configuración inicial

### 1. Clona el repositorio

```bash
git clone https://github.com/tu-usuario/tu-repo.git
cd tu-repo
```

### 2. Levanta los contenedores

```bash
docker compose up -d
```

Esto iniciará los servicios `app` (Laravel) y `postgres`.

---

## 🧪 Acceder al contenedor Laravel

```bash
docker compose exec app bash
```

---

## 🛠️ Asignar permisos (solo la primera vez)

Dentro del contenedor, otorga los permisos correctos a las carpetas necesarias:

```bash
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

---

## 🧱 Ejecutar migraciones

Aún dentro del contenedor:

```bash
php artisan migrate
```

---

## 🌐 Ejecutar servidor de desarrollo

Desde el contenedor, ejecuta:

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Accede en tu navegador a:

```
http://localhost:8000
```

---

## 🧹 Limpieza de cachés (opcional)

Si realizas cambios en configuración o rutas:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

---

## 🐘 Configuración de PostgreSQL

Asegúrate de que tu archivo `.env` contiene lo siguiente:

```env
DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=postgres
DB_PASSWORD=postgres
```

---

## 📂 Estructura básica del proyecto

```
.
├── app
├── bootstrap
├── docker-compose.yml
├── public
├── resources
├── routes
├── storage
├── .env
├── composer.json
└── README.md
```

---

## ✅ Comandos útiles

```bash
# Ver el estado de los contenedores
docker compose ps

# Acceder al contenedor Laravel
docker compose exec app bash

# Ver logs del contenedor Laravel
docker compose logs -f app
```

---

## 📄 Licencia

MIT © [Tu Nombre o Usuario]