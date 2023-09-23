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
                {{-- Directive start with @ --}}
                <!-- Item 1 -->
                <div class="bg-gray-50 border border-gray-200 rounded p-6">
                    <div class="flex">
                        <img class="hidden w-48 mr-6 md:block" src="{{ asset('images/no-image.png') }}" alt="" />
                        <div>
                            <h3 class="text-2xl">
                                <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
                            </h3>
                            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
                            <ul class="flex">
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                    <a href="#">Laravel</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                    <a href="#">API</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                    <a href="#">Backend</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                    <a href="#">Vue</a>
                                </li>
                            </ul>
                            <div class="text-lg mt-4">
                                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                            </div>
                        </div>
                    </div>
                </div>
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
