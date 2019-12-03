# CODAC-EndTrainingProject
 <img src="https://img.shields.io/github/languages/count/YenByNigao/codac-pff" /> <img src="https://img.shields.io/github/languages/top/YenByNigao/codac-pff" /> <img src="https://img.shields.io/github/repo-size/YenByNigao/codac-pff" /> <img src="https://img.shields.io/github/v/tag/YenByNigao/codac-pff" /> <img src="https://img.shields.io/website?url=https%3A%2F%2Fwww.clikeat.re" /> <img src="https://img.shields.io/github/commit-activity/w/YenByNigao/codac-pff" />  <img src="https://img.shields.io/github/last-commit/YenByNigao/codac-pff" /> <img src="https://img.shields.io/github/contributors/YenByNigao/codac-pff" />

---

# The project's aim

ClikEat is a project written in symfony. Ap'Hero is a Proof Of Concept of a eCommerce in Symfony4 without using sylius.
You can view all commits history and insight in GitHub via https://github.com/YenByNigao/codac-pff.
We make only a final push to Marvin@epitech, so no history will be available.


---

# Technologies & dependencies

- ## Download
Start by downloading or cloning the project files on GitHub
```shell
git clone https://github.com/YenByNigao/codac-pff.git
```
Before you can start the servers, it is essential to install the dependencies and the database
- ## Dependencies
```shell
cd codac-pff
cd ap_hero
composer install
```
- ## Database
Please, update `ap_hero\.env` file with your MariaDB credientials in order to initiate database.
```
DATABASE_URL=mysql://root:root@127.0.0.1:1234/azerty
```
Then you can create the database and associated tables.
```shell
cd codac-pff
cd ap_hero
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```
- ## Running the project
```shell
php bin/console server:run
```
You will have an output like this on your terminal
> [OK] Server listening on http://127.0.0.1:8000
> // Quit the server with CONTROL-C.
- ## Autorun Script
An autoinstall script is available at repository root.
```shell
#!/bin/bash

# change directory to symfony project
cd ap_hero

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

#launch a debugger server; in your controller use ```dump( $var );``` to obtain a var_dump
php bin/console server:dump
```
---

# Project status
Work in progress.

---

# Contributing
Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are greatly appreciated.

- Fork the Project
- Create your Feature Branch (git checkout -b feature/AmazingFeature)
- Commit your Changes (git commit -m 'Add some AmazingFeature')
- Push to the Branch (git push origin feature/AmazingFeature)
- Open a Pull Request
