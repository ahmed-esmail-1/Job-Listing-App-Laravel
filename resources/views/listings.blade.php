<h1>{{ $heading }} </h1>


@unless (count($listings) == 0)

    @foreach ($listings as $listing)
        {{-- Directive start with @ --}}
        <h2>
            <a href="/listings/{{ $listing['id'] }}">{{ $listing['title'] }} </a>
        </h2>
        <p>
            {{ $listing['description'] }}
        </p>
    @endforeach
@else
    <p>No listings found</p>
@endunless



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