#!/bin/bash

#passage à PHP7.3
export PATH=/opt/plesk/php/7.3/bin/:$PATH

#remove old migrations
cd src/Migrations
rm *.php
cd ../..

# force to install dependencies if some is missing
composer install

# force drop database
php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create

# prepare database schema
php bin/console make:migration

# replace ALL JSOPN by LONGTEXT
cd src/Migrations
file=$(ls)
echo "********** SED **********"
sed 's/JSON/LONGTEXT/g' $file
echo "********** END SED **********"
cd ../..

# populate database
yes | php bin/console doctrine:migrations:migrate

# load data samples
yes | php bin/console doctrine:fixtures:load

# php bin/console cron:start

# launch http server
symfony local:server:stop
symfony local:server:start --no-tls

#launch a debugger server; in your controller use ```dump( $var );``` to obtain a var_dump
#php bin/console server:dump
