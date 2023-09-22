<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//deleted old model and created this one that extends model
//php artisan make:model Listing
//by extending it has many functions, 'Eloquent'
class Listing extends Model
{
    use HasFactory;
}
