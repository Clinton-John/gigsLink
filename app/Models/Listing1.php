<?php

namespace App\Models; // the namespace allows us to access the file from other files


// This file was used to show how to pass data throught the use of models and no longer in use
class Listing{
    public static function all(){ // the function should get all the listings
        
      return [
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
    ] ;

    }

    public  static function find($id){
        
        $Listings = self::all(); // using the self to get all the listings from the first section. 

        foreach($Listings as $listing){  
            if ($listing["id"]== $id) { // if the current listings id is equal to the id thats passed into the function is equal then return the listing
                return $listing;
            }
        }
    }
}