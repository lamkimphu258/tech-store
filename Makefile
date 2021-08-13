up:
	./vendor/bin/sail up -d

down:
	./vendor/bin/sail down

build:
	docker-compose build

restart:
	$(MAKE) down
	$(MAKE) up

composer-require:
	docker-compose exec app
	composer require $(pkg)

npm-install:
	docker-compose exec app
	npm install $(pkg)

npm-dev:
	docker-compose exec app
	npm run dev

npm-watch:
	docker-compose exec app
	npm run watch

npx:
	docker-compose exec app
	npx $(cmd)

artisan-run:
	docker-compose exec app
	php artisan $(cmd)

reseed:
	$(MAKE) artisan-run cmd=migrate:refresh
	$(MAKE) artisan-run cmd=db:seed

generate-coverage:
	docker-compose exec app
	./vendor/bin/phpunit --coverage-html reports/
