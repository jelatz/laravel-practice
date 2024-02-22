 @extends('layouts.app')


 @section('content')
     <div class="container-fluid p-5">
         <h1 class="my-3">{{ $header }}</h1>

         @unless (count($listings) == 0)
             @foreach ($listings as $listing)
                 <h2>
                     <a href="/listings/{{ $listing['id'] }}">
                         {{ $listing['title'] }}
                     </a>
                 </h2>
                 <p>
                     {{ $listing['description'] }}
                 </p>
             @endforeach
         @else
             <p>No listings found</p>
         @endunless
     </div>
 @endsection
