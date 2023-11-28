@props(['name', 'placeholder', 'height' => 'full', 'width' => 'full'])

<textarea 
name="{{ $name }}" 
id="{{ $name }}" 
class="w-{{ $width }} h-{{ $height }} mt-1 bg-background resize-none border-slate-700 rounded-lg"
placeholder="{{ $placeholder }}"
>{{ $slot }}</textarea>  