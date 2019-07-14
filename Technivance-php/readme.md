1-install composer from laravel docs.
2-cd Technivance.
3-composer install
4-install mysql.
5-create database with name "tech" and edit .env file :
    DB_DATABASE=tech
    DB_USERNAME=root
    DB_PASSWORD=password

6-run :
 **php artisan cache:clear
 **php artisan config:cache
 **php artisan migrate:refresh --seed
 
 **php artisan serve

 
 