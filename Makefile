init:
	echo "Start"
up:
	docker compose up
down:
	docker compose down -v
php:
	docker exec -it hyperf-example-app bash
k6-main:
	docker compose run k6 run /scripts/main.js
run:
	docker compose run -p "9501:9501" --rm app bash -c "composer install && composer start"
build:
	docker build -t reinanhs/poc-hyperf-observability .
push:
	docker push reinanhs/poc-hyperf-observability