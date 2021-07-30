<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Post;
use Illuminate\Http\Request;

class OfferPageController extends Controller
{
    public function show($slug)
    {
        $offer = Offer::where('slug', $slug)->firstOrFail();
        return view('offer.index', compact('offer'));
    }
}
