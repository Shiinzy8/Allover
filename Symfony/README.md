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


    connect ot postgesql docker-compose run database bash
    connect to db  psql --host=database --username=admin_user --dbname=symfony_workflow_db