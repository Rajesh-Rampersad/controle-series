# 📦 Laravel + Docker + PostgreSQL + Vite

Este proyecto Laravel utiliza Docker y PostgreSQL como base de datos, y emplea Vite para la gestión de activos front-end. A continuación se detallan los pasos para levantar el entorno de desarrollo y ejecutar la aplicación desde cero.

---

## 🚀 Requisitos

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)
- (Opcional) [pnpm](https://pnpm.io/) si deseas usarlo fuera del contenedor

---

## ⚙️ Configuración inicial

### 1. Clona el repositorio


git clone https://github.com/tu-usuario/tu-repo.git
cd tu-repo


### 2. Levanta los contenedores
# 🧪 Para desarrollo:

docker compose up -d --build
docker-compose up -d


Esto iniciará los servicios:

app → Contenedor de Laravel con PHP + Node + pnpm

postgres → Base de datos PostgreSQL

nginx → Servidor web

# 🧪 Acceder al contenedor Laravel
docker exec -it laravel_app bash  

# 🔧 Configuración de Laravel dentro del contenedor
Una vez dentro del contenedor:

# Instala dependencias PHP
composer install

# Copia archivo de entorno
cp .env.example .env

# Genera la clave de la app
php artisan key:generate

# Instala dependencias JS
pnpm install

# Compila los assets
pnpm run build

# Si prefieres usar Vite en modo desarrollo con recarga automática:
pnpm run dev -- --host

# Y asegúrate de tener en tu .env:
VITE_HOST=0.0.0.0
APP_URL=http://localhost:8000

# 🛠️ Asignar permisos (solo la primera vez) Dentro del contenedor:
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

##  🧱 Ejecutar migraciones
php artisan migrate

## 🌐 Acceder a la aplicación Abre tu navegador en:
php artisan serve --host=0.0.0.0 --port=8000

## 🧹 Limpieza de cachés (opcional)
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

## 🐘 Configuración de PostgreSQL Verifica que tu archivo .env tenga lo siguiente:
DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret


## 📂 Estructura básica del proyecto
.
├── app
├── bootstrap
├── docker-compose.yml
├── nginx/
│   └── conf.d/
├── public
├── resources
├── routes
├── storage
├── .env
├── composer.json
└── README.md

## ✅ Comandos útiles
# Ver el estado de los contenedores
docker compose ps

# Acceder al contenedor Laravel
docker compose exec app bash

# Ver logs del contenedor Laravel
docker compose logs -f app


## ✅  Build y Run

# 🌐 Para producción:
docker-compose -f docker-compose.prod.yml up -d --build

Esto iniciará los servicios:

app → Contenedor de Laravel con PHP + Node + pnpm

postgres → Base de datos PostgreSQL

nginx → Servidor web

# Compila frontend localmente
pnpm run build   # o npm run build

# Genera clave APP_KEY si es necesario
docker-compose -f docker-compose.prod.yml run --rm app php artisan key:generate --env=production

# Crea el contenedor y levanta servicios
docker-compose -f docker-compose.prod.yml up -d --build

# Corre migraciones
docker-compose -f docker-compose.prod.yml exec app php artisan migrate --force



### ✅ Cómo usar
# 🔧 Desarrollo:

make up             # Levanta entorno de desarrollo
make down           # Lo detiene
make bash           # Entra al contenedor
make migrate        # Ejecuta migraciones
make key-generate   # Genera clave APP_KEY
make artisan cmd=route:list
make fix-perms    

# 🚀 Producción:

make prod-up        # Build y levantar producción
make prod-down      # Apaga servicios producción
make prod-bash      # Bash dentro del contenedor app prod
make prod-migrate   # Migraciones en producción
make prod-key       # Generar APP_KEY en producción
make artisan cmd=route:list
make fix-perms    


## 📄 Licencia
MIT © [Tu Nombre o Usuario]