@props(['icon', 'first' => false, 'group' => [], 'active' ])

@php
     $top = $first ? 'mt-16' : ' mt-4';
     $state = $active ? "fill-background bg-primary" : "fill-text bg-background";
@endphp

<a {{ $attributes }} class="w-8 h-8">
     <x-icon name="{{ $icon }}" class="{{ $state }} dark:hover:bg-accent dark:hover:fill-background rounded-xl w-12 p-2 mx-2 {{ $top }}" />
</a>
