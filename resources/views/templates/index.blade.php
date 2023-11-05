<x-app-layout :sidebar="false">
    <x-slot name="header">
        <div class="flex justify-between">
            {{ __('Templates') }}
            <a href="templates/create" class="font-thin text-sm border rounded p-2 m-0">Add New</a>
        </div>
    </x-slot>
    <x-panel>

    </x-panel>
</x-app-layout>
