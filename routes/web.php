<?php

namespace App\Http\Controllers;  
use Illuminate\Support\Facades\Route;
use App\Models\listing;  //bringing in the model we used 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('listings');
// });


/*  passing data to the view file "listings"
Route::get('/', function () {
    return view('listings' , [
        'heading' => 'Latest Listings' ,
        'Listings' => [
            [
                'id' => 1 ,
                'title' => 'Listing one' ,
                'description' => 'A software product which provides solution for baby health, baby food, baby tips, baby products, baby names, parenting etc. Here, user can view baby names, baby names by religion, baby tips, baby food and baby product. Admin can add and delete baby names.'
            ],
            [
                'id' => 2 ,
                'title' => 'Listing two',
                'description' => 'A software product which provides solution for baby health, baby food, baby tips, baby products, baby names, parenting etc. Here, user can view baby names, baby names by religion, baby tips, baby food and baby product. Admin can add and delete baby names.'
            ]
        ] 
    ]);
});

 */

//  /*  passing data to the view file through the model and displaying all the listings
Route::get('/', function () {
    return view('listings' , [
        'heading' => 'Latest Listings' ,
        'Listings' => Listing::all()  // from the listing file use the all method and now all the data is coming from the model as opposed to the first scenario when all the data was coming from the route. can only be used for static functions
    ]);
});

//  */

// displaying a single listing based on the id passed by the user
Route::get('/listings/{id}', function($id){
    return view('listing', [ // pass an array that has a listing value and the value can come from a listing model find method and the listing id is passed.
        'listing' => Listing::find($id)
    ]);
});