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
            <div class="flex">
                <div class="flex-1 me-4">
                    <x-form.text-input-group name="link" type="file" label="File" />
                </div>
                <x-form.buttons.primary-link href="{{ route('download', $template->id) }}" class="h-23 mt-11 mb-1 dark:hover:bg-secondary dark:hover:text-text" >Download file</x-form.buttons.primary-link >
            </div>
            <div inline-datepicker data-date="02/25/2022"></div>
        </form>
    </x-panel>
</x-app-layout>
