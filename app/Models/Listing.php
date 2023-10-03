<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function scopeFilter($query , array $filters){
        // the scopeFilter funtion is used to filter from a database the tag thats clicked and only show the tag to the screen
        if($filters['tag'] ?? false){
            $query-> where('tags' , 'like' , '%' . request('tag') . '%');  // from the tags column in the database select anything like the request tag
        };
        if($filters['search'] ?? false){
            $query-> where('tags' , 'like' , '%' . request('search') . '%') 
                  ->orwhere('title' , 'like' , '%' . request('search') . '%')
                  ->orwhere('company' , 'like' , '%' . request('search') . '%')
                  ->orwhere('Location' , 'like' , '%' . request('search') . '%')
                  ->orwhere('description' , 'like' , '%' . request('search') . '%');
        };
                 
        
    }
}
