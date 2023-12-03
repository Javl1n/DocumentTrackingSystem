@props(['name', 'label' => $name, 'placeholder' => '', 'height' => 'full', 'width' => 'full'])

<div class="mt-4 h-full">
    <x-input-label for="{{ $name }}" :value="__(ucwords($label))" />
    <x-textarea-input 
        id="{{ $name }}" 
        name="{{ $name }}" 
        height="{{ $height }}"
        {{-- :value="old($name)"  --}}
        placeholder="{{ $placeholder }}"
        required 
        autofocus>{{ old($name) ?? $slot }}</x-textarea-input>
    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
