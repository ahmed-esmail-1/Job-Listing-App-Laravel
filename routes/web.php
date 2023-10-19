<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

//Steps to make a new functionality: Route -> Controller method -> View

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Example of data returning, should be from db
//All listings
Route::get('/', [ListingController::class, 'index']);



//Show create form
Route::get('/listings/create', [ListingController::class, 'create']);


//Store listing data
Route::post('/listings', [ListingController::class, 'store']);

//Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

//Update listing
Route::put('listings/{listing}', [ListingController::class, 'update']);

//Delete listing
Route::delete('listings/{listing}', [ListingController::class, 'destroy']);


//it was looking to this route not show create, that is why I took it to the buttom
//Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Show register create form
Route::get('/register', [UserController::class, 'create']);









 // Common Resource Routes:
    // index - Show all listings
    // show - Show single listing
    // create - Show form to create new listing
    // store Store new listing
    // edit - Show form to edit listing
    // update - Update listing
    // destroy Delete listing




/*
//Testing routes
Route::get('/hello', function () {
    return response('<h1>Hello World</h1>', 404)
        ->header('Content-Type', 'text/plain')  //-> will not render html
        ->header('foo', 'bar');
});

Route::get('/posts/{id}', function ($id) {

    dd($id); //Dump and Die, to debug, stop everything.

    return response('Post ' . $id); //will return Post + id
})->where('id', '[0-9]+') //will make only numbers passed after Posts
    //if letters passed then 404 not found
;

//Route with multiple entries
Route::get('/search', function (Request $request) {
    return $request->name . ' ' . $request->city;
});
*/