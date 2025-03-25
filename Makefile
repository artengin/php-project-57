start:
	php artisan serve

setup:
	composer install
	cp -n .env.example .env
	npm ci
	npm run build

migrate:
	php artisan migrate

console:
	php artisan tinker

test:
	php artisan test

test-coverage:
	XDEBUG_MODE=coverage php artisan test --coverage-clover build/logs/clover.xml

lint:
	composer exec -- phpcs --standard=PSR12 app

lint-fix:
	composer exec -- phpcbf --standard=PSR12 app