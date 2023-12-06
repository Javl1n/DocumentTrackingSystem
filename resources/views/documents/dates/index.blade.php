<x-app-layout :hasSidebar="true">
    <x-slot name="sidebar">
        <x-documents.sidebar :barangay="$barangay" />
    </x-slot>
    <x-slot name="header">
        <span class="font-light text-gray-500"><a href="{{ route('documents.index', $barangay->slug) }}">{{ $barangay->name }}</a> / </span>{{ $template->name }}
    </x-slot>
        <div class="grid grid-cols-10 px-8 border-b border-primary pb-2">
            <div class="text-lg col-span-3">Date Created</div>
            <div class="text-lg col-span-3">Date Uploaded</div>
            <div class="text-lg col-span-3">Uploaded By</div>
        </div>
        <div class="flex-1 overflow-y-auto h-full pt-2">
            @isset($documents)
                @foreach ($documents as $document)
                    <div class="grid grid-cols-10 px-8 py-3">
                        <div class="col-span-3">
                            {{ date('F d, Y', strtotime($document->date)) }}
                        </div>
                        <div class="col-span-3">
                            {{ date('F d, Y - h:m a', strtotime($document->created_at)) }}
                        </div>
                        <div class="col-span-3">{{ $document->publisher->name }}</div>
                        <div class="col-span-1">
                            {{-- <a href="{{ route('download', $document->file->id) }}?fileName={{ "$template->slug-($document->date)" }}" class="bg-secondary rounded-md p-2">Download</a> --}}
                            <a class="bg-secondary rounded-md p-2" href="{{ route('documents.dates.show', ['barangay' => $barangay->slug, 'template' => $template->slug, 'date' => $document->date ]) }}" >
                                view all
                            </a>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
        @bhw
            <a href="/bhw/documents/create/{{ $template->slug }}">
                <div class="absolute bottom-16 right-16 bg-blue-500 p-5 rounded-full z-10">Add New</div>
            </a>
        @endbhw
</x-app-layout>
