<x-app-layout :sidebar="false">

    <x-slot name="header">
        <div class="flex justify-between">
            {{ __('Templates') }}
            <a href="templates/create" class="font-thin text-sm border rounded p-2 m-0">Add New</a>
        </div>
    </x-slot>
    <x-panel>
        <div class="grid grid-cols-5 gap-4">
            @foreach ($templates as $template)
                <div class="border p-4 text-center">
                    <x-icon name="spreadsheet" class="fill-white" />
                    {{ $template->name }}
                </div>
            @endforeach
        </div>
    </x-panel>
</x-app-layout>
