<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## TODO Application

Running the application is very easy if below steps are followed correctly
- It is assumed that Apache is installed to run PHP application
- First update composer.json file to get the dependencies required to run the app
- The application uses MYSQL database - ensure the DB server is installed - simply modify the .env file to match your database credentials
- When finished with composer, run php artisan migrate to create the database structure
- Edit the .env file to match your database credentials
- You can artisan serve the application to test in dev

  ## Docker container
- We create Dockerfile with contents to create a custom image
- By using the docker hub image we can customize it to our website based on one from docker hub
- Build the image and copy all local files to docker hub image using commands as defined in the Dockerfile
- To deploy in Docker container locally type -> docker run -p 80:80 demo/laravel:01 and you can access the app on localhost:80
