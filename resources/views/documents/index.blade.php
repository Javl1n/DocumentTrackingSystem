<x-app-layout :sidebar="true">
    <x-slot name="sidebar">
        <x-documents.sidebar :barangay="$barangay->id"  />
    </x-slot>
    <x-slot name="header">
        {{ __('Documents') }}
    </x-slot>
    <x-panel>
        <div class="h-full flex flex-col justify-between">
            <div class="grid grid-cols-5 gap-5">
                <a href="templates/create">
                    <div class="text-center shadow-lg rounded-xl bg-slate-600 h-full flex">
                        <x-icon name="plus-circle" height="30" class="m-auto fill-slate-900" />
                    </div>
                </a>
                @foreach ($templates as $template)
                    <a href="/template/{{ $template->slug }}">
                        <div class="text-center shadow-lg rounded-xl bg-slate-900 py-10">{{ $template->name }}</div>
                    </a>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $templates->links() }}
            </div>
        </div>
    </x-panel>
</x-app-layout>
