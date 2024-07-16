<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;

use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule as RuleRule;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;



class ListingController extends Controller
{
    //Show all listings
    public function index()
    {
        return view('listings.index', [
            //'heading' => 'Latest Listings',
            //'listings' => Listing::all()      
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)

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
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            // Generate a random filename with the original extension
            $extension = $request->file('logo')->getClientOriginalExtension();
            $randomFileName = uniqid('logo_', true) . '.' . $extension;

            $file_content = $request->file('logo')->get();

            if (!Storage::disk('public_uploads')->put($randomFileName, $file_content)) {
                return redirect()->back()->with('error', 'Failed to upload logo.');
            }

            // Store the relative path in the form fields
            $formFields['logo'] = 'logos/' . $randomFileName; // Adjust as necessary
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
        // Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

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
            // Generate a random filename with the original extension
            $extension = $request->file('logo')->getClientOriginalExtension();
            $randomFileName = uniqid('logo_', true) . '.' . $extension;

            // Store the logo using the public_uploads disk
            if (!Storage::disk('public_uploads')->put($randomFileName, $request->file('logo')->get())) {
                return redirect()->back()->with('error', 'Failed to upload logo.');
            }

            // Store the relative path in the form fields
            $formFields['logo'] = 'logos/' . $randomFileName; // Adjust as necessary
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }


    //Delete listing
    public function destroy(Listing $listing)
    {
        //Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    //Manage listings
    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]); //
    }
}
