<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
//php artisan make:controller NameController
//The functions must be in the controller, not the routes
class ListingController extends Controller
{
    //Show all listings
    public function index()
    {
        return view('listings.index', [
            //'heading' => 'Latest Listings',
            //'listings' => Listing::all()      //use all the Listing model methods, this is php syntax
            'listings' => Listing::latest()-> //sorted by latest (the jobs)
                filter(request(['tag', 'search']))->get()  //filter by tag (ex: vue), pass search too
        ]);
    }

    //Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' =>  $listing
        ]);
    }

    //Show create form
    public function create()
    {
        return view('listings.create');
    }
}
