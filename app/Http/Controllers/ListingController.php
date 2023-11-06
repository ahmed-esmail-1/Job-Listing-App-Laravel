<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Session\Session;
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
                filter(request(['tag', 'search']))->paginate(4)  //Pagination, take a num, how many posts to display
            //Run this command and choose pagination package, it will give you templates
            //php artisan vendor:publish
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

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();
        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    //Show edit form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    //Update listing data
    public function update(Request $request, Listing $listing)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }

    //Delete listing
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }
}
