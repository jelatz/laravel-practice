@extends('layouts.app')


@section('content')
    <div class="container-fluid p-5">
        <h1 class="my-3">{{$header}}</h1>
        
        @unless(count($listings) ==0)
        @else
<p>No listings found</p>
@endunless

        @foreach ($listings as $listing)
        <h2>
            {{$listing['title']}}
        </h2>
        <p>
            {{$listing ['description']}}
        </p>
        @endforeach
    </div>
@endsection

