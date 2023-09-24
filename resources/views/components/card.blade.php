{{-- This is like a background around each card (frame) --}}
{{-- Some forms like inside listings (listing)
    use it with extra attributes that is why we 
    used merge to allow adding there more classes --}}
<div {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6']) }}>

    {{ $slot }}

</div>
