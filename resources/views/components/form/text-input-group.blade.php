@props(['name', 'type' => 'text', 'label' => $name])

<div class="mt-4">
    <x-input-label for="{{ $name }}" :value="__(ucwords($label))" />
    <x-text-input 
        id="{{ $name }}" 
        class="block mt-1 w-full p-2 
        file:bg-slate-500 file:border-none file:rounded-lg file:text-white file:text-sm file:px-4 file:py-2" 
        type="{{ $type }}" 
        name="{{ $name }}" 
        :value="old($name)" 
        required 
        autofocus />
    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
