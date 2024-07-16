<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use Illuminate\Support\Facades\Artisan;


// Route::get('/run-migrations', function () {
//     try {
//         Artisan::call('migrate', ['--force' => true]);
//         return response()->json(['status' => 'success', 'message' => 'Migrations ran successfully.']);
//     } catch (\Exception $e) {
//         return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
//     }
// });


// NOT WORKING BVS SERVER DOES NOT SUPPORT MAYBE, SO DIRECTLY SAVE IN PUBLIC (NOT STORAGE/PUBLIC)
// Route::get('/run-storage-link', function () {
//     try {
//         Artisan::call('storage:link');
//         return response()->json(['status' => 'success', 'message' => 'Storage link created successfully.']);
//     } catch (\Exception $e) {
//         return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
//     }
// });


//All listings
Route::get('/', [ListingController::class, 'index']);



//Show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');


//Store listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update listing
Route::put('listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete listing
Route::delete('listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//it was looking to this route not show create, that is why I took it to the buttom
//Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Show register create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create new user
Route::post('/users', [UserController::class, 'store']);

//Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
