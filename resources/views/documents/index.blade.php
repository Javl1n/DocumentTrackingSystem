<x-app-layout :sidebar="true">
    <x-slot name="sidebar">
        <x-documents.sidebar :barangay="$barangay->id"  />
    </x-slot>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ __('Templates') }}
            <a href="templates/create" class="font-thin text-sm border rounded p-2 m-0">Add New</a>
        </div>
    </x-slot>
    <x-panel>
        <div class="h-full flex flex-col justify-between">
            <div class="grid xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-5">
                @cho
                    <a href="templates/create">
                        <div class="text-center shadow-lg rounded-xl bg-slate-600 h-full flex">
                            <x-icon name="plus-circle" height="30" class="m-auto fill-slate-900" />
                        </div>
                    </a>
                @endcho
                @foreach ($templates as $template)
                    @cho
                        <a href="/template/{{ $template->slug }}?barangay={{ $barangay->id }}">
                            <div class="text-center shadow-lg rounded-xl bg-slate-900 py-10">{{ $template->name }}</div>
                        </a>
                    @endcho
                    @bhw
                        <a href="/template/{{ $template->slug }}">
                            <div class="text-center shadow-lg rounded-xl bg-slate-900 py-10">{{ $template->name }}</div>
                        </a>
                    @endbhw

                @endforeach
            </div>
            <div class="mt-4">
                {{ $templates->links() }}
            </div>
        </div>
    </x-panel>
</x-app-layout>
