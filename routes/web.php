<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => Listing::all()      //use all the Listing model methods, this is php syntax
    ]);
});

//Single listing
Route::get('/listings/{listing}', function (Listing $listing) {
    return view('listing', [
        'listing' =>  $listing
    ]);
});







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