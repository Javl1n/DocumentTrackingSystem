<x-app-layout :sidebar="false">
    {{-- <x-slot name="sidebar">
        @include('components.city.documents.barangays._sidebar')
    </x-slot> --}}
    <x-slot name="header">
        {{ __('Select a Barangay') }}
    </x-slot>
    <x-panel>
        <div class="grid grid-cols-5 gap-10">
            @foreach ($barangays as $barangay)
                <a href="/{{ $barangay->slug }}">
                    <div class="text-center shadow-lg rounded-xl bg-slate-900 py-12 uppercase font-bold">{{ $barangay->name }}</div>
                </a>
            @endforeach
        </div>
    </x-panel>
</x-app-layout>
