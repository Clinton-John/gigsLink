<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
    //shows all the listings
    public function index(){
        return view('listings.index' , [
            'Listings' => Listing::all()  // from the listing file use the all method and now all the data is coming from the model as opposed to the first scenario when all the data was coming from the route. can only be used for static functions
        ]);
    }
    // shows single listings
    public function show($id){
        $listing = Listing::find($id);
        if($listing){
            return view('listing.show', [ // pass an array that has a listing value and the value can come from a listing model find method and the listing id is passed.
                'listing' => $listing 
            ]);
        }else{
            abort('404');
        }
    }

}
