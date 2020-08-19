<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## About Data import

This project is a simple API to list videoclub films and calculate its booking price.

##  Steps to get project running 🛠

1. Create `.env` file: copy or rename `.env.example` located in project root folder. Run `php artisan key:generate` 
to generate a new application key.

2. Install dependencies: to install all app dependencies, run `composer install`.

3. Setup database: create the database on your system and set corresponding connection parameters in the `.env` file.

4. migrate & seed: to generate migrations run command `php artisan migrate`. Then run seeds with `php artisan db:seed`.

## Running project 🚀

To serve the app on to a virtual dev server, run `php artisan serve` and app will start. 
You can find the url address in the response if this command.

It's recommended [Postman](https://www.postman.com/) to check API endpoints.

## API DOCS 

API Documentation is built with [Swagger](https://swagger.io/).

Docs are available under [/api/documentation](http://127.0.0.1:8000/api/documentation).

## TODOS ⚠
- Testing API
- Dockerize this

## Vulnerabilities & contributions

If you discover a security vulnerability, please send an e-mail to Sergio Martín via [sergyzen@gmail.com](mailto:sergyzen@gmail.com). 
All security vulnerabilities will be promptly addressed.

## License

This software is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
