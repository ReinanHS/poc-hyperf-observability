init:
	echo "Start"
up:
	docker compose up
down:
	docker compose down -v
php:
	docker exec -it hyperf-example-app bash
run:
	docker compose run -p "9501:9501" --rm app bash -c "composer install && composer start"