@props(['first' => false])

@php
     $top = $first ? 'mt-16' : ' mt-4';
@endphp

<div class="text-text h-12 text-xl flex flex-col justify-center bg-background {{ $top }}">
     <a {{ $attributes }}>{{ $slot }}</a>
</div>