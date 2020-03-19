Course from Udemy https://udemy.com/course/php-unit-testing
phpunit lives in ./vendor/phpunit/phpunit/phpunit
we added aliase for this location with command alias phpunit="./vendor/phpunit/phpunit/phpunit"
now we can simply run phpunit in terminal
to run test from one file simple put in the terminal "phpunit path_to_the_test_file"

PHPUnit will run only methonds which names are begin with "test" word
but there are alternative for this, in annotation to methods you should add "@test"