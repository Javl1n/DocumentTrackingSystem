@props(['name', 'type' => 'text', 'label' => $name, 'placeholder' => ''])

<div class="mt-4">
    <x-input-label for="{{ $name }}" :value="__(ucwords($label))" />
    <x-text-input 
        id="{{ $name }}" 
        class="block mt-1 w-full p-2
        {{-- file:bg-primary file:hover:bg-secondary file:border-none file:rounded-lg file:text-background file:hover:text-text file:text-sm file:px-4 file:py-2 --}}
        file:items-center 
        file:px-4 
        file:py-2 
        file:bg-gray-800 
        file:dark:bg-blue-300 
        file:border 
        file:border-transparent 
        file:rounded-md 
        file:font-semibold 
        file:text-xs 
        file:text-white 
        file:dark:text-gray-800 
        file:tracking-widest 
        file:hover:bg-gray-700 
        file:dark:hover:bg-secondary 
        file:dark:hover:text-text 
        file:focus:bg-gray-700 
        file:dark:focus:bg-primary 
        file:active:bg-gray-900 
        file:dark:active:bg-gray-300 
        file:focus:outline-none 
        file:focus:ring-2 
        file:focus:ring-indigo-500 
        file:focus:ring-offset-2 
        file:dark:focus:ring-offset-gray-800 
        file:transition ease-in-out 
        file:duration-150" 
        type="{{ $type }}"
        name="{{ $name }}" 
        :value="old($name)" 
        placeholder="{{ $placeholder }}"
        required 
        autofocus />
    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
