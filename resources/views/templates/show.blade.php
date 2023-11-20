<x-app-layout :sidebar="true">
    <x-slot name="sidebar">
        <ul class="mt-2 text-lg">
            @foreach($templates as $template)
                <li class="p-2">
                    <a href="">{{ $template->name }}</a>
                </li>
            @endforeach
        </ul>
    </x-slot>
    <x-slot name="header">
        {{ $template->name }}
    </x-slot>
    <x-panel>
        <div class="grid grid-cols-2">
            <div>
                <div class="text-lg font-bold">how many month do you need to update this per year per year: 
                    <span class="font-normal underline ml-2">
                        {{ $template->update_cycle }} per year
                    </span>
                </div>
            </div>
            <div>
                <div class="text-lg font-bold">Download this file: 
                    <a href="/download?type=template&link={{ $template->link }}" class="text-blue-200 hover:text-blue-400 ml-2">Download</a>
                </div>
            </div>
        </div>
        <div class="text-lg mt-4 font-bold">Description about this template: </div>
        <p class="mt-4 h-64 bg-slate-900 p-5 rounded-xl overflow-y-auto">
            {{ $template->description }}
        </p>
    </x-panel>
</x-app-layout>
