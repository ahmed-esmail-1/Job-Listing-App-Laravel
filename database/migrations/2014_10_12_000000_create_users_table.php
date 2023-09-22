<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * All migrations has up and down functions, 
     * we don't have to create a table manually just by migrations
     * 
     * To create a new migration (table):- 
     * php artisan make:migration create_{table_name}_table
     * 
     * then migrate everything:-
     * php artisan migrate
     * 
     * Under database section, there is 1- migrations,
     * 2- seeders: fill the database tables with dummy data for testing
     * 3- factories: seeders uses faker from factories
     * to run: php artisan db:seed
     * Now after we check it is working, we refresh so the dummy data is deleted:
     * php artisan migrate:refresh
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
