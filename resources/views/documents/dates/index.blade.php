<x-app-layout :sidebar="true">
    <x-slot name="sidebar">
        <x-documents.sidebar />
    </x-slot>
    <x-slot name="header">
        Documents<span class="font-light text-gray-500">/{{ $template->name }}</span>
    </x-slot>
    <x-panel>
        <div class="grid grid-cols-10 gap-y-5">
            <div class="col-span-7 font-bold text-center">Date Published</div>
            <div class="col-span-2 font-bold">Published By</div>
            <div class="col-span-1"></div>
            <div class="col-span-7">November</div>
            <div class="col-span-2">Me</div>
            <div class="col-span-1"><a href="" class="bg-blue-500 rounded-md px-2 py-2">Download</a></div>

        </div>
    </x-panel>
</x-app-layout>
