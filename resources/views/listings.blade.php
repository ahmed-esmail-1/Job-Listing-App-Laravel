{{-- Layout is header and footer, everything but the main view 
    yield('content')
    section('content')
    later I will try to make the layout a component
    so it will be easier than extends
    --}}

@extends('layout')


@section('content')
    @include('partials._hero') {{-- Notice here, dot '.' not / --}}
    @include('partials/_search') {{-- Both notation works in blade --}}

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">


        @unless (count($listings) == 0)
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing" />{{-- Send to the child component --}}
            @endforeach
        @else
            <p>No listings found</p>
        @endunless

    </div>
@endsection


{{--
    If there is not listings, or with unless both ways work
    
    @if (count($listings) == 0)
    <p></p>
@endif
--}}

{{-- 
    
             php directive 

Let's say there is something you can't do in the controller or
route, you can do this here like normal coding

@php
    $test = 1;
@endphp
{{ $test }}
--}}
