main:
	composer.phar install

tests:
	vendor/bin/phpunit -c phpunit.xml tests

tests-coverage:
	vendor/bin/phpunit -c phpunit.xml --coverage-html tests-coverage tests

sniff:
	vendor/bin/phpcs --standard=PSR2 src

play:
	php runme.php
