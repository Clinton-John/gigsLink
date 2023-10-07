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
      // index -shows all the listings
      //create- show form to create a new Listing
      //show - show single listing
      //store - store a new listing created
      //edit - show form to edit listing
      //update- update the listing
      //destroy - delete the listing
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
Route::get('/', [ListingController::class , 'index']
   /* all this are passed into the controller file 
   return view('listings' , [
        'Listings' => Listing::all()  // from the listing file use the all method and now all the data is coming from the model as opposed to the first scenario when all the data was coming from the route. can only be used for static functions
    ]);
    */
);

//  */


   // post a new job route
// Route::get('/listings/create' , [ListingController::class , 'create']);
Route::get('/listings/create' , [ListingController::class , 'create'])->middleware('auth'); // the middleware makes the form to only show the form when a user is logged in. the middleware is in the middleware->authenticate


//the route involved in showing the post a job form
Route::post('/listings' , [ListingController::class , 'store'])->middleware('auth');


// Show edit form
Route::get('/listings/{listing}/edit' , [ListingController::class , 'edit'])->middleware('auth');


//Update the Listings
Route::put('/listings/{listing}' , [ListingController::class , 'update'])->middleware('auth');



   // delete Listing
Route::delete('/listings/{listing}' , [ListingController::class , 'destroy'])->middleware('auth');



// displaying a single listing based on the id passed by the user. the conditon checks for the id passed and if the passed id doesnt match any in the database returns a 404 error
Route::get('/listings/{id}', [ListingController::class , 'show']

    // $listing = Listing::find($id);
    // if($listing){
    //     return view('listing', [ // pass an array that has a listing value and the value can come from a listing model find method and the listing id is passed.
    //         'listing' => $listing 
    //     ]);
    // }else{
    //     abort('404');
    // }
    
);

// Show register/ create form
Route::get('/register', [UserController::class , 'create'])->middleware('guest'); //guest prevents the user from accessing the page he shouldnt when he tries accessing directly from the url and it redirects the user to / directory. if it redirects to a dfrnt directory then change in the route service providers to the / directory 

// create a new user
Route::post('/users' , [UserController::class , 'store']);


//log user out
Route::post('/logout' , [UserController::class , 'logout'])->middleware('auth');


   //show Login form
Route::get('/login' , [UserController::class , 'login'])->name('login')->middleware('guest'); // naming a route using the name method


// log in user
Route::post('/users/authenticate' , [UserController::class , 'authenticate']);
