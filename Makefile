# Variables generales
APP=app
DEV_COMPOSE=docker-compose
PROD_COMPOSE=docker-compose -f docker-compose.prod.yml

# Contenedores Docker (Desarrollo)
up:
	$(DEV_COMPOSE) up -d

down:
	$(DEV_COMPOSE) down

build:
	$(DEV_COMPOSE) up -d --build

logs:
	$(DEV_COMPOSE) logs -f

bash:
	$(DEV_COMPOSE) exec app sh


# Contenedores Docker (Producción)
prod-up:
	$(PROD_COMPOSE) up -d --build

prod-down:
	$(PROD_COMPOSE) down

prod-logs:
	$(PROD_COMPOSE) logs -f

prod-bash:
	$(PROD_COMPOSE) exec $(APP) bash

# Artisan y Composer (Desarrollo)
migrate:
	$(DEV_COMPOSE) exec $(APP) php artisan migrate

key-generate:
	$(DEV_COMPOSE) exec $(APP) php artisan key:generate

composer-install:
	$(DEV_COMPOSE) exec $(APP) composer install

artisan:
	$(DEV_COMPOSE) exec $(APP) php artisan $(cmd)

# Artisan (Producción)
prod-migrate:
	$(PROD_COMPOSE) exec $(APP) php artisan migrate --force

prod-key:
	$(PROD_COMPOSE) exec $(APP) php artisan key:generate --env=production

# Node + pnpm (opcional, dentro del contenedor)
npm-install:
	$(DEV_COMPOSE) exec $(APP) pnpm install

build-assets:
	$(DEV_COMPOSE) exec $(APP) pnpm run build

# Fix permissões locais
fix-perms:
	sudo chown -R $$(id -u):$$(id -g) . && chmod -R 775 ./storage ./bootstrap/cache ./pgdata

# Alias de ayuda
help:
	@echo "Comandos disponibles:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[36m%-16s\033[0m %s\n", $$1, $$2}'

.PHONY: up down build logs bash \
        prod-up prod-down prod-logs prod-bash \
        migrate prod-migrate key-generate prod-key \
        composer-install npm-install build-assets fix-perms artisan help
