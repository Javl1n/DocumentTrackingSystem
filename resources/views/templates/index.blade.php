<x-app-layout :sidebar="false">

    <x-slot name="header">
        <div class="flex justify-between">
            {{ __('Templates') }}
            <a 
                href="{{ route('templates.create') }}" 
                class="font-thin text-sm border rounded p-2 m-0 hover:bg-blue-500">
                    Add New
            </a>
        </div>
    </x-slot>
    <x-panel>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($templates as $template)
                <a href="{{ route('templates.show', ['template' => $template->slug]) }}" class="rounded-xl bg-slate-900 ps-5 py-4 text-xl font-bold">    
                    {{ $template->name }}
                </a>
            @endforeach
        </div>
    </x-panel>
</x-app-layout>
