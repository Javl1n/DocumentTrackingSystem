<x-app-layout :sidebar="false">
    {{-- <x-slot name="sidebar">
        @include('components.city.documents.barangays._sidebar')
    </x-slot> --}}
    {{-- <x-slot name="header">
        {{ __('Select a Barangay') }}
    </x-slot> --}}
    <x-panel class="overflow-none pt-5 mb-0">
        {{-- <div class="bg-primary text-black p-5 h-32 rounded-lg mb-5">
            <h1>Total Number of Documents Uploaded Today</h1>
            <span>{{ $total }}</span>
        </div> --}}
        <div class="grid grid-cols-12 grid-rows-6 gap-5 h-full">
            <div class="col-span-7 row-span-2 bg-primary text-gray-800 py-10 rounded-lg">
                <div class="flex h-full">
                    <div class="flex flex-col text-center justify-center mx-auto">
                        <h1 class="text-lg">Uploaded <br> Today</h1>
                        <p class="text-9xl font-bold">{{ $today }}</p>
                    </div>
                    <div class="border border-gray-600">
                        
                    </div>
                    <div class="flex flex-col text-center justify-center mx-auto">
                        <h1>Uploaded <br> All Time</h1>
                        <p class="text-9xl font-bold">{{ $total }}</p>
                    </div>
                </div>
            </div>
            <div class="col-span-5 row-span-6 col-start-8 col-end-13 rounded-lg bg-secondary-900">
                <h1 class="text-2xl font-bold py-5 ps-4">Barangays</h1>

                <div class="flex flex-col h-full overflow-y-auto gap-8 px-5">
                    @foreach ($barangays as $barangay)
                        <a href="{{ route('documents.index', ['barangay' => $barangay->slug]) }}">
                            <div class="bg-secondary-700 h-24 px-6 rounded-xl flex justify-between">
                                <div class="flex flex-col justify-center">
                                    <h1 class="font-bold text-2xl">{{ $barangay->name }}</h1>
                                    <div class="flex flex-col">
                                        documents:
                                        {{ $barangay->documents->count() }}
                                    </div>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <x-icon name="dropdown-arrow" class="fill-gray-400 h-7 -rotate-90" />
                                </div>
                            </div>
                        </a>
                    @endforeach 
                </div>
            </div>
            <div class="col-span-7 w-full row-span-4 bg-background rounded-xl">
                ad
            </div>
        </div>
    </x-panel>
</x-app-layout>
