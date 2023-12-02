<ul class="mt-2 text-lg">
    @foreach($templates as $template)
        <li class="p-2">
            <div x-data="{open: {{ request()->is("barangay/$barangay->slug/$template->slug") || request()->is("barangay/$barangay->slug/$template->slug/*") ? 'true' : 'false' }}}">
                <div class="flex group">
                    <a class="flex-1 pb-1 ps-1 group-hover:text-accent {{ request()->is("barangay/$barangay->slug/$template->slug") ||  request()->is("barangay/$barangay->slug/$template->slug/*")  ? 'underline decoration-blue-400 underline-offset-8' : '' }}" href="{{ route('documents.dates.index', ['barangay' => $barangay->slug, 'template' => $template->slug]) }}">
                        {{ $template->name }}
                    </a>
                    <span @click ="open =! open" class="group-hover:text-accent">
                        <x-icon name="dropdown-arrow" class="w-4 mt-1 me-2 -rotate-90" x-bind:class="open ? 'rotate-0' : ''" />
                    </span>
                </div>
                <div x-show="open" x-collapse>
                    <ul class="ms-5 mt-4">
                        @isset($documents->where('document_template_id', $template->id)->first()->dates)
                            @foreach ($documents->where('document_template_id', $template->id)->first()->dates as $document)
                                <li class="mb-2">
                                    <a href="{{ route('documents.dates.show', ['barangay' => $barangay->slug, 'template' => $template->slug, 'date' => $document->date]) }}" class="{{ request()->is("barangay/$barangay->slug/$template->slug/$document->date")  ? 'text-primary' : '' }} hover:text-accent">
                                        {{ date('F d, Y', strtotime($document->date)) }}
                                    </a>
                                </li>
                            @endforeach
                        @endisset

                        @bhw
                            <a href="/bhw/documents/create/{{ $template->slug }}" class="hover:text-accent">
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
