
## About Laravel-chat

A simple user chat project using the [Laravel](https://laravel.com) and [vue.js](https://vuejs.org) frameworks

## Requirements

first, you need to install :

- pleas install [composer](https://nodejs.org)
- pleas install [npm](https://nodejs.org)

## Installation

first, you should clone the project and go to the root directory and run command :
 
1. install laravel packages

``` sh
composer install
```

2. then, you should run command to install npm packages

``` shell
npm install
```
3. copy .env.example to .env 


4. please set the change broadcast driver to pusher:

```dotenv
BROADCAST_DRIVER=pusher
```
5. you need sign in or sign up [pusher](https://pusher.com/) account ,
you create a new app and get the app id, app key and app secret and set it to .env file :

```dotenv
PUSHER_APP_ID= 
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=ap4

```
6. you need run command to create database in your mysql server

7. set the database name and username and password to .env file :

 ```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=chat
DB_USERNAME=root
DB_PASSWORD=
```
8. run command to migrate database

``` sh
php artisan migrate
```
9. you need run command npm  :

``` sh
npm run dev
```
10. Click the following command to run the project :

``` sh
php artisan serve
```
11. finally you can visit the project in your browser 
# Thank you for your attention







