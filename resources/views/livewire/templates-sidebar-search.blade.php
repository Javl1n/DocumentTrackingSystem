<ul class="mt-2 text-lg">
    @foreach($templates as $template)
        <li class="p-2">
            <div x-data="{open: false}">
                <div class="flex group">
                    <a class="flex-1 pb-1 ps-1 group-hover:text-blue-400 {{ request()->is("document/$template->slug") ? 'underline decoration-blue-400 underline-offset-8' : '' }}" href="/document/{{ $template->slug }}@cho?barangay={{ $barangay }}@endcho">
                        {{ $template->name }}
                    </a>
                    <span @click ="open =! open" class="group-hover:text-blue-400">
                        <x-icon name="dropdown-arrow" class="w-4 mt-1 me-2 -rotate-90" x-bind:class="open ? 'rotate-0' : ''" />
                    </span>
                </div>   
                <div x-show="open" x-collapse>
                    <ul class="ms-5 mt-4">
                        @foreach ($documents->where('document_template_id', $template->id)->first()->dates as $document)
                            <li>{{ date_format($document->created_at, "F d") }}</li>
                        @endforeach
                        @bhw
                            <a href="/bhw/documents/create/{{ $template->slug }}" class="hover:text-blue-500">
                                <li class="text-base flex">
                                    <span>
                                        <x-icon name="circle" class="w-5 ms-0 mt-0.5" />
                                    </span>
                                    <span>
                                        Create New
                                    </span>
                                </li>
                            </a>
                        @endbhw
                    </ul>
                </div>
            </div>
        </li>
    @endforeach
</ul>    