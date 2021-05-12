<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Getting started

<<<<<<< HEAD
To setp the api up and running, start by creating a mysql database. Edit the file /config/database.php to suit your database connection details.
After database is setup run `php artisan migrate` to finish setting up database.

To populate the database in a quick way for testing, run `php artisan db:seed`.

To start the server, run `php artisan serve`.

After everything is done, you should be able to do calls to the api

## Endpoints

\[POST\] 127.0.0.1:8000/api/key/activate
    body: {
        email: '[user email]',
        key: '[user activation key]'
    }

=======
Clone the repository and run `composer install` to install all the project dependencies.

Then, to set the api up and running, start by creating a mysql database. Edit the file /config/database.php to suit your database connection details.
After database is setup, run `php artisan migrate` to finish setting up database.

To populate the database for testing, run `php artisan db:seed`.

To start the server, run `php artisan serve`.

After everything is done, you should be able to make requests to the api.

## Endpoints

\[POST\] /api/key/activate
```
    body: {
        email: '[user_email]',
        key: '[user_activation_key]'
    }
```
\[POST\] /api/key/check
```
    body: {
        key: '[user_activation_key]'
    }
```
>>>>>>> main

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
