# 🚀 Laravel + Sail + PostgreSQL + Vite

Este proyecto utiliza [Laravel Sail](https://laravel.com/docs/sail) como entorno de desarrollo basado en Docker, con PostgreSQL como base de datos y Vite para la compilación de activos frontend.

---

## 📋 Requisitos

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)
- (Opcional) [pnpm](https://pnpm.io/) para manejo de dependencias JS fuera del contenedor

---

## 🛠️ Configuración del entorno

### 1️⃣ Clona el repositorio

```bash
git clone https://github.com/tu-usuario/tu-repo.git
cd tu-repo
```

### 2️⃣ Copia el archivo de entorno

```bash
cp .env.example .env
```

### 3️⃣ Levanta los servicios con Sail

```bash
vendor/bin/sail up -d
```

Esto iniciará:

- **Laravel App** (`PHP + Composer + Node.js + pnpm`)
- **PostgreSQL** (`DB_HOST=pgsql`)
- (Opcional) otros servicios definidos en `docker-compose.yml`

---

## ⚙️ Configuración dentro del contenedor

Accede al contenedor Laravel:

```bash
vendor/bin/sail shell
```

O, si prefieres:

```bash
vendor/bin/sail bash
```

### Comandos a ejecutar:

```bash
# Instalar dependencias PHP
composer install

# Generar clave de aplicación
php artisan key:generate

# Instalar dependencias frontend
pnpm install

# Compilar los assets para producción
pnpm run build

# Alternativamente: modo desarrollo
pnpm run dev -- --host
```

**Asegúrate que en tu `.env` esté definido:**

```env
APP_URL=http://localhost
VITE_HOST=0.0.0.0
```

---

## 🧱 Migraciones y configuración de permisos

```bash
php artisan migrate

# Opcionalmente:
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

---

## 🐘 Configuración PostgreSQL

En tu `.env`:

```env
DB_CONNECTION=pgsql
DB_HOST=pgsql
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```

---

## 🔍 Comandos útiles con Sail

```bash
# Ver estado de los contenedores
vendor/bin/sail ps

# Acceder al contenedor Laravel
vendor/bin/sail shell

# Ver logs del contenedor
vendor/bin/sail logs

# Ejecutar comandos Artisan
vendor/bin/sail artisan migrate
vendor/bin/sail artisan route:list

# Limpiar cachés
vendor/bin/sail artisan config:clear
vendor/bin/sail artisan cache:clear
vendor/bin/sail artisan route:clear
vendor/bin/sail artisan view:clear
```

---

## 📂 Estructura del proyecto

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

## ✅ Makefile (opcional)

Si usas `make` para automatizar comandos, puedes incluir lo siguiente:

```makefile
up:           ## Levanta entorno de desarrollo
	@vendor/bin/sail up -d

down:         ## Apaga los contenedores
	@vendor/bin/sail down

bash:         ## Entra al contenedor Laravel
	@vendor/bin/sail shell

migrate:      ## Ejecuta migraciones
	@vendor/bin/sail artisan migrate

key-generate: ## Genera la clave de la app
	@vendor/bin/sail artisan key:generate

artisan:      ## Ejecuta comando artisan (uso: make artisan cmd=route:list)
	@vendor/bin/sail artisan $(cmd)

fix-perms:    ## Corrige permisos
	@vendor/bin/sail shell -c "chown -R www-data:www-data storage bootstrap/cache && chmod -R 775 storage bootstrap/cache"
```

---

## 🌐 Acceder a la aplicación

Una vez levantado el entorno, accede desde tu navegador a:

```
http://localhost
```

---

## 📄 Licencia

MIT © [Tu Nombre o Usuario]