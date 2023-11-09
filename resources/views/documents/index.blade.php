<x-app-layout :sidebar="true">
    <x-slot name="sidebar">
        <x-documents.sidebar />
    </x-slot>
    <x-slot name="header">
        {{ __('Documents') }}
    </x-slot>
    <x-panel>
        @cho
            @isset($currentBarangay)
            <div class="grid grid-cols-5 gap-5">
                <a href="/templates/create">
                        <div class="text-center shadow-lg rounded-xl bg-slate-600 h-full flex">
                            <x-icon name="plus-circle" height="30" class="m-auto fill-slate-900" />
                        </div>
                </a>
                @foreach ($templates as $template)
                    <a href="/template/{{ $template->slug }}?barangay={{ $currentBarangay->id }}">
                        <div class="text-center shadow-lg rounded-xl bg-slate-900 py-10">{{ $template->name }}</div>
                    </a>
                @endforeach
            </div>
            @endisset
            @empty($currentBarangay)
                <div class="text-center text-sm text-gray-300 mt-10">
                    No Barangay Selected
                </div>
            @endempty
        @endcho
        @bhw
        <div class="grid grid-cols-5 gap-5">
            @foreach ($templates as $template)
                <a href="/template/{{ $template->slug }}">
                    <div class="text-center shadow-lg rounded-xl bg-slate-900 py-10">{{ $template->name }}</div>
                </a>
            @endforeach
        </div>
        @endbhw
        {{-- {{ $documents->links() }} --}}
    </x-panel>
</x-app-layout>
