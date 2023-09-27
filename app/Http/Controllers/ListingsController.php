<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
// use DB;

class ListingsController extends Controller
{
    public function html() {
        return view('search');
    }

    public function index(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'minPrice' => 'nullable|numeric|min:10|max:10000000',
                'maxPrice' => 'nullable|numeric|min:10|max:10000000',
                'minSqrMeters' => 'nullable|numeric|min:20|max:20000',
                'maxSqrMeters' => 'nullable|numeric|min:20|max:20000'
            ]);
            // return response()->json(['message' => 'Data submitted successfully']);
            // return Listing::all();

            $locationId = $request->input('location_id');
            $minPrice = $request->input('minPrice');
            $maxPrice = $request->input('maxPrice');
            $minSqrMeters = $request->input('minSqrMeters');
            $maxSqrMeters = $request->input('maxSqrMeters');
            $typeNames = json_decode($request->input('typeName'), true);
            // '["apartment","studio"]'
            $availability = $request->input('availability');

            //return Listing::with('types')->get();

            $query = Listing::with('types')
            ->select('listings.id', 'price', 'sqr_meters', 'availability', 'locations.name AS location')
            ->leftJoin('locations', 'listings.location_id', '=', 'locations.id');
            // ->leftJoin('listing_type', 'listings.id', '=', 'listing_type.listing_id');
            // ->leftJoin('types', 'listing_type.type_id', '=', 'types.id')
            // // ->when($typeNames, function ($query, $typeNames) {
            // //     return $query->where('types.name', '=', $typeNames);
            // // });
            // ->when($typeNames, function ($query, $typeNames) {
            //     return $query->whereIn('types.name', $typeNames);
            // });

            if (!empty($typeNames)) {
                $query->whereHas('types', function ($query) use ($typeNames) {
                    $query->whereIn('name', $typeNames);
                });
            }

            if ($minPrice !== null) {
                $query->where('price', '>=', $minPrice);
            }

            if ($maxPrice !== null) {
                $query->where('price', '<=', $maxPrice);
            }

            if ($minSqrMeters !== null) {
                $query->where('sqr_meters', '>=', $minSqrMeters);
            }

            if ($maxSqrMeters !== null) {
                $query->where('sqr_meters', '<=', $maxSqrMeters);
            }

            if ($availability !== null) {
                $query->where('availability', '=', $availability);
            }

            if ($locationId !== null) {
                $query->where('location_id', '=', $locationId);
            }

            $results = $query->get();
            return $results;
            // return view('listings.index', ['listings' => $results]);

            // return $results;
            // return  var_export($results, true);

            // return $results;
            // return $results->map(function (Listing $listing) {
            //     $listing->typeNames = $listing->types->pluck('name');
            // });
            // $response = [];
            // foreach($results as $listing){
            //     $listingData = $listing->toArray();
            //     $listingData['types'] = $listing->types->pluck('name');
            //      $response[] = $listingData;
            // }
            // return $response;

        }
        catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }
}


        // return $request->validate([
        //     'location_id' => 'required|max:5'
        // ]);
        // return Listing::find(2);
        // return Listing::all();
        // return view('listings/index');
