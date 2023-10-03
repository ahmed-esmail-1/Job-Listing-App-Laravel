<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule as RuleRule;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


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

    //Store listing data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required', //Not working so.. ['required', Rule::unique('listings', 'company')]
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
    }
}
