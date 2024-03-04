<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    // SHOW ALL LISTINGS
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }
    // SHOW SINGLE LISTING
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // SHOW CREATE FORM
    public function create()
    {
        return view('listings.create');
    }

    // STORE LISTING DATA
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique(
                'listings',
                'company'
            )],
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

        return redirect('/')->with('message', 'Listing Created Successfully!');
    }

    // SHOW EDIT FORM
    public function edit(Listing $listing)
    {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }



    // UPDATE LISTING DATA
    public function update(Request $request, Listing $listing)
    {
        // MAKE SURE LOGGED IN USER IS OWNER
        if($listing->user_id != auth()->id()){
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
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing Updated Successfully!');
    }

    // DELETE LISTING
    public function destroy(Listing $listing){
          // MAKE SURE LOGGED IN USER IS OWNER
          if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted Successfully!');
    }

    // MANAGE LISTINGS
    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);

    }
}
