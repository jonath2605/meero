install: ##@Docker Build or rebuild services
	php -r "file_exists('application/.env') || copy('application/.env.local', 'application/.env');"
	docker-compose -f infrastructure/docker/docker-compose-local.yml -p meero-network up --build  -d

start: ##@Docker start container
	docker-compose -f infrastructure/docker/docker-compose-local.yml -p meero-network up -d

stop: ##@Docker stop container
	docker-compose -f infrastructure/docker/docker-compose-local.yml -p meero-network stop

migration: ##@Docker execute migration
	docker exec -it meero_php-fpm php bin/console make:migration

migrate: ##@Docker execute migration
	docker exec -it meero_php-fpm php bin/console doctrine:migrations:migrate

import: ##@Docker execute import
	docker exec -it meero_php-fpm php bin/console app:import
