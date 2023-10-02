<!-- any elements thats sorrounded by the card below can now be closed by an x-card tag that is in the listing and the listings files in the view  -->

<!-- <div class="bg-gray-50 border border-gray-200 rounded p-6"> this line of code doesmt allow you to change some of the classs with the sam feature for example fi you wanted to change p to p=20 for a given charachter then it wont allow. using the merge attirbute below helps you change some specific classes -->
<div {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6'])}} > 
  
{{$slot}}
</div>