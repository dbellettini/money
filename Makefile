.PHONY: pipeline
pipeline: | build composer-install unit phpstan cs-fixer

.PHONY: build
build:
	docker-compose build

.PHONY: bash
bash:
	docker-compose run php bash

.PHONY: interactive
interactive:
	docker-compose run php php -a

.PHONY: composer
composer:
	docker-compose run php composer $(args)

.PHONY: composer-install
composer-install:
	docker-compose run php composer install

.PHONY: unit
unit:
	docker-compose run php vendor/bin/phpunit --testsuite=unit

.PHONY: phpunit
phpunit:
	docker-compose run php vendor/bin/phpunit $(args)

.PHONY: phpstan
phpstan:
	docker-compose run php vendor/bin/phpstan analyze -v src

.PHONY: cs-fixer
cs-fixer:
	docker-compose run php vendor/bin/php-cs-fixer fix -v

.PHONY: cs-fixer-dry
cs-fixer-dry:
	docker-compose run php vendor/bin/php-cs-fixer fix -v --dry-run
