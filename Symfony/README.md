# For all symfony projects #

1. install symfony cli
    wget https://get.symfony.com/chi/installer -O - | bash
2. check requirements
    symfony check:requirements
3. install php-intl because I didn't have it
    sudo apt-get install php7.2-intl
        this also helped: apt-cache search php-intl
                          apt-cache search php7-intl
4. check in phpinfo()
5. install symfony project in new folder
    symfony new my_project_name --full
6. now we can run symfony
    symfony server:start
7. check for security problems
    symfony check:security
8. also installed drivers for postgresql
    apt-get intall php-pgsql

    now we can run doctrine cli commands such as
        php bin/console doctrine:database:create
        php bin/console doctrine:schema:update --force

    php bin/console config:dump-reference framework

    php bin/console workflow:dump name_of_a_workflow > out.dot

9. installed gravzip
    sudo apt-get install graphviz

    To work with migrations:
        If we create entity and want generate migrations from it - php bin/console make:migration 



    connect ot postgesql docker-compose run database bash
    connect to db  psql --host=database --username=admin_user --dbname=symfony_workflow_db