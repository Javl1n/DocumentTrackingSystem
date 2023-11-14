<x-app-layout :sidebar="false">
    <x-slot name="header">
        <div class="w-2/4 mx-auto ps-5">
            <span class="font-normal">Create Document: </span> {{ $template->name }}
        </div>
    </x-slot>

    <x-panel class="flex-auto w-2/4 mx-auto">
        <form action="/bhw/documents" method="post" enctype="multipart/form-data">
            @csrf
            <x-text-input name="template" value="{{ $template->id }}" type="hidden" />
            <h1>Download Template</h1>
            <h2>Upload Document</h2>
                <x-primary-button class="mt-10">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </form>
    </x-panel>
</x-app-layout>
