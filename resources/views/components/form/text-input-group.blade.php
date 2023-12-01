@props(['name', 'type' => 'text', 'label' => $name, 'placeholder' => ''])

<div class="mt-4">
    <x-input-label for="{{ $name }}" :value="__(ucwords($label))" />
    <x-text-input 
        id="{{ $name }}" 
        class="block mt-1 w-full p-2" 
        type="{{ $type }}"
        name="{{ $name }}" 
        :value="old($name)" 
        placeholder="{{ $placeholder }}"
        required 
        autofocus />
    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
