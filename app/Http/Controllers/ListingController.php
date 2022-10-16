<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Listings/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreListingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListingRequest $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required',
            //'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            //'images' => 'required|image|mimes:png,jpg,webp,jpeg'
        ]);

        $listing = Listing::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => '',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => $request->user()->id
        ]);

        if ($request->hasFile('images')){
            $images = $request->file('images');
            foreach ($images as $image) {
                $pathName = $image->store('listings');
                $listingImage = ListingImage::create([
                    'path' => $pathName,
                    'listing_id' => $listing->id
                ]);
                $listingImage->save();
            }
        }

        return redirect()->route('listing.show', $listing);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        return Inertia::render('Listings/Show',[
            'listing' => Listing::find($listing),
            'images' => ListingImage::query()
            ->where('listing_id', '=', $listing->id)
            ->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateListingRequest  $request
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListingRequest $request, Listing $listing)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        $listing = Listing::find($listing);
        abort_if($listing == null, 404);
        $listing->delete();
    }
}
