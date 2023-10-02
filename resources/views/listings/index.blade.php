



<!-- the code shows how to get the passed data from the route when saved using a .blade.php/ using a blade template. the blade template simplifies the view files for example using directives -->

@extends('layout')

@section('content')

@include('partials._hero')
@include('partials._search')
<div
class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

 @if(count($Listings) != 0)


 @foreach($Listings as $listing) 
  
 <x-listing-card :listing="$listing" />



 
 <!-- <h2> <a href="/listings/{{$listing['id']}}"> {{$listing['title']}} </a> </h2> 
 <p>{{$listing['description'] }} </p> -->

   @endforeach

   @else
  <p>No listing found </p>
 @endif
</div>
@endsection