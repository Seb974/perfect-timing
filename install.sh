#!/bin/bash

#passage à PHP7.3
export PATH=/opt/plesk/php/7.3/bin/:$PATH

# force to install dependencies if some is missing
composer install

# force drop database
php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create

# prepare database schema
yes | php bin/console doctrine:migrations:migrate

# load data samples
yes | php bin/console doctrine:fixtures:load

# launch http server
php bin/console server:stop
php bin/console server:start

php bin/console cron:start

#launch a debugger server; in your controller use ```dump( $var );``` to obtain a var_dump
php bin/console server:dump