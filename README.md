Check the live version:- 

    https://jobs.ahmedesmail.tech



To run it on your machine:-
1) You will need php
2) composer
3) localdb

Set up localdb, run migrations, then php artisan serve.



If you have any issues feel free to reach out.



Integrating Filament:-


- Installing<br>
composer require filament/filament


- Creating a new panel<br>
php artisan filament:install --panels<br>
Id: admin


- Creating a user<br>
php artisan make:filament-user<br>
Ahmed<br>
info@ahmedesmail.tech<br>
Password<br>
Success! info@ahmedesmail.tech may now log in at http://localhost/admin/login.<br>


- Creating a new resource (Core concept)<br>
php artisan make:filament-resource Listing


- For file uploading<br>
php artisan storage:link<br>
http://127.0.0.1:8000/storage/01J5XS72YXHTYXD4TGZ2VM085B.svg

