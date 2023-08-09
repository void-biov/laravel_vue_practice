<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    public function index()
    {
        return Listing::find(2);
        // return Listing::all();
        // return view('listings/index');
    }
}
