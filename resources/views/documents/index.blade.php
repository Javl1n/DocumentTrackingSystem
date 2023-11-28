<x-app-layout :sidebar="true">
    <x-slot name="sidebar">
        <x-documents.sidebar :barangay="$barangay->id"  />
    </x-slot>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ __($barangay->name) }}
            {{-- @cho
                <a href="templates/create" class="font-thin text-sm border rounded p-2 m-0">Add New</a>
            @endcho --}}
        </div>
    </x-slot>
    <div class="h-[85vh] flex flex-col justify-between w-full">
        <div class="flex flex-col h-full">
            {{-- @cho
                <a href="templates/create">
                    <div class="text-center shadow-lg rounded-xl bg-slate-600 h-full flex">
                        <x-icon name="plus-circle" height="30" class="m-auto fill-slate-900" />
                    </div>
                </a>
            @endcho --}}
            <div class="grid grid-cols-10 px-8 border-b border-primary pb-2">
                <div class="text-lg col-span-5">Name</div>
                <div class="text-lg col-span-2">Versions</div>
                <div class="text-lg col-span-2">Latest Upload</div>
            </div>
            <div class="flex-1 overflow-y-auto h-full pt-2">
                @foreach ($documents as $document)
                    {{-- <a
                        href="/document/{{ $template->slug }}@cho?barangay={{ $barangay->id }}@endcho"
                        class="h-32 bg-slate-900 shadow-lg rounded-xl flex flex-col justify-center">
                        <div class="text-center">{{ $template->name }}</div>
                    </a> --}}
                
                    <div class="grid grid-cols-10 px-8 py-3">
                        <div class="text-lg col-span-5">{{ $document->template->name }}</div>
                        <div class="text-lg col-span-2 ms-6">{{ $document->dates->count() }}</div>
                        <div class="text-lg col-span-2">
                            @isset($document->dates->first()->created_at)
                                {{ date_format($document->dates->first()->created_at, "F d") }}
                            @else
                               None
                            @endisset
                        </div>
                        <div class="text-lg col-span-1">
                            <a href="/document/{{ $document->template->slug }}@cho?barangay={{ $barangay->id }}@endcho"
                            class="bg-secondary p-2 rounded">
                                view all
                            </a>
                            {{-- <form action="/document/{{ $document->template->slug }}?barangay={{ $barangay->id }}@endcho"><x-form.buttons.primary-button>View All</x-form.buttons.primary-button> </form>  --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mt-4 mx-8 mb-5">
            {{ $documents->links() }}
        </div>
    </div>
</x-app-layout>
