



<!-- the code shows how to get the passed data from the route when saved using a .blade.php/ using a blade template. the blade template simplifies the view files for example using directives -->

@extends('layout')

@section('content')
<h1>  {{ $heading}} </h1>

 @if(count($Listings) == 0)
  No listing found
 @endif

 @foreach($Listings as $listing) 
 
 <h2> <a href="/listings/{{$listing['id']}}"> {{$listing['title']}} </a> </h2> 
   <p>{{$listing['description'] }} </p>
@endforeach

@endsection