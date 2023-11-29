<x-app-layout :sidebar="true">
    <x-slot name="sidebar">
        <ul class="mt-2 text-lg">
            @foreach($templates as $templatebar)
                <li class="p-2">
                    <a href="{{ route('templates.show', ['template' => $templatebar->slug]) }}">{{ $templatebar->name }}</a>
                </li>
            @endforeach
        </ul>
    </x-slot>
    <x-slot name="header">
        {{ $template->name }}
    </x-slot>
    {{-- <x-panel> --}}
        <div class="p-9 pt-0 flex flex-col h-[88vh]">
            <div class="grid grid-cols-5">
                <div class="col-span-3">
                    <div class="text-lg font-bold">how many month do you need to update this per year per year:
                        <span class="font-normal underline ml-2">
                            {{ $template->update_cycle }} per year
                        </span>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="text-lg font-bold">Download this file:
                        <a href="{{ route('download', $template->file->id) }}" class="text-blue-200 hover:text-blue-400 ml-2">Download</a>
                    </div>
                </div>
                {{-- @bhw
                <div class="col-span-2">
                    <a href="{{ route() }}">Create Document For this template</a>
                </div>
                @endbhw --}}
            </div>
            <div class="text-lg mt-4 font-bold">Description about this template: </div>
            <p class="mt-4 flex-1 bg-background-light p-5 rounded-xl overflow-y-auto">
                {{ $template->description }}
            </p>
            @cho
                <div class="h-96 text-lg mt-4 font-bold">Barangays: </div>
                
            @endcho
        </div>
    {{-- </x-panel> --}}
</x-app-layout>
