Course from Udemy https://udemy.com/course/php-unit-testing
phpunit lives in ./vendor/phpunit/phpunit/phpunit
we added aliase for this location with command alias phpunit="./vendor/phpunit/phpunit/phpunit"
now we can simply run phpunit in terminal
to run test from one file simple put in the terminal "phpunit path_to_the_test_file.php"
or "phpunit path_to_the_test_file" or "phpunit path_to_folder_with_tests"
or "phpunit path_to_folder_with_tests --filter=name_of_test_method"
or "phpunit path_to_folder_with_tasts --color"

For our example:
    phpunit tests/ExampleTest.php
    phpunit tests/ExampleTest
    phpunit tests/
    phpunit tests/ --filter=testReturnsFullName

PHPUnit will run only methonds which names are begin with "test" word
but there are alternative for this, in annotation to methods you should add "@test"

