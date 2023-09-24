@props(['tagsCSV']) {{-- The tags are coma separated in the db --}}


@php
    $tags = explode(',', $tagsCSV);
@endphp

<ul class="flex">
    @foreach ($tags as $tag)
        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
            <a href="/?tag={{ $tag }}">{{ $tag }}</a> {{-- /? for filtering by tag pass a query --}}
        </li>
    @endforeach
</ul>
