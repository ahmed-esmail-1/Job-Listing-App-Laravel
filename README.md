    Check the live version:- 
    https://jobs.ahmedesmail.tech/
    
    To run it on your machine:-
1) You will need php
2) composer
3) localdb

Set up localdb, run migrations, then php artisan serve.



If you have any issues feel free to reach out.



Integrating Filament:-

- Installing:-
composer require filament/filament

- Creating a new panel
php artisan filament:install --panels
Id: admin

- Creating a user
php artisan make:filament-user
Ahmed
info@ahmedesmail.tech
Password
Success! info@ahmedesmail.tech may now log in at http://localhost/admin/login.

- Creating a new resource (Core concept)
php artisan make:filament-resource Listing

- For file uploading
php artisan storage:link
http://127.0.0.1:8000/storage/01J5XS72YXHTYXD4TGZ2VM085B.svg

