<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
    //shows all the listings
    public function index(){
        return view('listings.index' , [

            'Listings' => Listing::latest()->filter(request(['tag' , 'search']))->paginate(6) // the paginate is used to controll the number of items that can be showed on a screen and a button to take a user to the next page is shown. to add the button its added in the index page where all the listings should be displayed

           // 'Listings' => Listing::latest()->filter(request(['tag' , 'search']))->get() // the filter method helps get the request method using get, if it was a search method then it retrieves if it was a search method then it retireves and passes it
            //'Listings' => Listing::latest()->get() // gets all the methods but sorted from the latest one to be added
            //'Listings' => Listing::all()  // from the listing file use the all method and now all the data is coming from the model as opposed to the first scenario when all the data was coming from the route. can only be used for static functions
        ]);
    }
    // shows single listings
    public function show($id){
        $listing = Listing::find($id);
        if($listing){
            return view('listings.show', [ // pass an array that has a listing value and the value can come from a listing model find method and the listing id is passed.
                'listing' => $listing 
            ]);
        }else{
            abort('404');
        }
    }

    public function create(){
      return view('listings.create');        
    }

    public function store(Request $request){
          // validating the form fields whena user posts a job and storing the data in a variable formFields
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required' , Rule::unique('listings' , 'company')],
             'location' => 'required',
             'website' => 'required', 
             'email' => ['required' , 'email'],
             'tags' => 'required',
             'description' => 'required'
         ]);
       
        //  if a user uploads an image then take the logo , create a folder named logos in the storage-public folder and then using 
         if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
         }
         Listing::create($formFields);

         return redirect('/')->with('message' , 'Listing Created Successfully!');
    }


}
