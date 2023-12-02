<x-app-layout>
    <x-slot name="sidebar">
        <x-documents.sidebar :barangay="$barangay" />
    </x-slot>
    <x-slot name="header">
        <div class="grid grid-cols-12">
            <div class="col-span-11">
                <span class="font-light text-gray-500">
                    <a href="{{ route('documents.index', $barangay->slug) }}">
                        {{ $barangay->name }}
                    </a>
                    /
                    <a href="{{ route('documents.dates.index', ['barangay' => $barangay->slug, 'template' => $template->slug]) }}">
                        {{ $template->name }}
                    </a>
                    /
                </span>
                {{ date('F d, Y', strtotime($document->date)) }}
            </div>
            <a href="{{ route('download', $document->file->id) }}?fileName={{ "$template->slug-($document->date)" }}"
                class="bg-secondary rounded-md p-2 text-sm text-center hover:bg-primary">
                Download
            </a>
        </div>
    </x-slot>
    <div class="px-8 h-full">
        <div class="">
            <div class="text-lg font-bold">Description</div>
            <div class="p-5 bg-background-light rounded text-justify mt-2 h-96 overflow-y-auto">
                {{ $template->description }}
            </div>
        </div>
        <div class="mt-4 flex-1">
            <div class="text-lg font-bold mt-4 grid grid-cols-12">
                <div class="col-span-11 pt-2">Edit History</div>
                <a href="{{ route('documents.dates.edit', [ 'barangay' => $barangay->slug, 'template' => $template->slug, 'date' => $document->date ]) }}" class="bg-secondary rounded-md p-2 text-sm text-center hover:bg-primary">Edit</a>
            </div>
            <div class="mt-4 flex flex-col h-96 overflow-y-auto">
                @for ($i = 0; $i <= 10; $i++)
                    <div class="w-full bg-background-light mb-4 px-4 py-3 rounded-lg">
                        <div class="text-lg text-text mb-0 leading-5">January 16, 2023 10:00 <br>
                            <span class="text-gray-500 text-sm mt-0">Frank Leimbergh Armodia</span></div>
                        {{-- <div class="text-gray-500 text-sm mt-0">Frank Leimbergh Armodia</div> --}}
                        <p class="mt-1 indent-5">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, delectus numquam explicabo modi velit distinctio quam hic, autem quis ab quasi nulla rerum nisi tempora amet, praesentium similique. Nam, aperiam!
                        </p>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</x-app-layout>
