<ul class="mt-2 text-lg">
    @foreach($templates as $template)
        <li class="p-2">
            <div x-data="{open: false}">
                <div class="flex">
                    <span @click ="open =! open">
                        <x-icon name="dropdown-arrow" class="w-4 mt-1 me-2 -rotate-90" x-bind:class="open ? 'rotate-0' : ''">
                        </x-icon>
                    </span>
                    <h1 class="text-lg" href="{{ route('Home') }}">{{ $template->name }}</h1>
                </div>
                <div x-show="open" x-collapse>
                    <ul class="ms-5 mt-4">
                        @php
                            $documentwithtemplate = $documents->where('document_template_id', $template->id)->first()
                        @endphp
                        @if ($documentwithtemplate)
                            @foreach ($documentDates->where('document_id', $documentwithtemplate->id) as $document)
                            <li>{{ date_format($document->created_at, "F d") }}</li>
                            @endforeach
                        @endif
                        @bhw
                            <a href="/documents/create/{{ $template->id }}" class="hover:text-blue-500">
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