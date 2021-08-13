up:
	docker-compose up -d

down:
	docker-compose down

restart:
	$(MAKE) down
	$(MAKE) up

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
