<x-app-layout :sidebar="true">
    <x-slot name="sidebar">
        <x-documents.sidebar :barangay="$barangay->id" />
    </x-slot>
    <x-slot name="header">
        <span class="font-light text-gray-500"><a href="{{ route('documents.index', $barangay->slug) }}">{{ $barangay->name }}</a> / </span>{{ $template->name }}
    </x-slot>
        <div class="grid grid-cols-10 gap-y-5">
            <div class="col-span-7 font-bold">Date</div>
            <div class="col-span-2 font-bold">Published By</div>
            <div class="col-span-1"></div>
            @foreach ($documents as $document)
                <div class="col-span-7">{{ date('F d, Y', strtotime($document->date)) }}</div>
                <div class="col-span-2">{{ $document->publisher->name }}</div>
                <div class="col-span-1">
                    <a href="{{ route('download', $template->file->id) }}" class="bg-blue-500 rounded-md px-2 py-2">Download</a>
                </div>
            @endforeach
        </div>
        @bhw
            <a href="/bhw/documents/create/{{ $template->slug }}">
                <div class="absolute bottom-16 right-16 bg-blue-500 p-5 rounded-full z-10">Add New</div>
            </a>
        @endbhw
</x-app-layout>
