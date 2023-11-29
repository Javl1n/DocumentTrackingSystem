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
                <x-form.buttons.primary-link href="{{ route('download', $template->id) }}" class="h-23 mt-11 mb-1 dark:hover:bg-secondary dark:hover:text-text" >Download Template</x-form.buttons.primary-link >
            </div>
            <div class="mt-4">
                <x-input-label>Date</x-input-label>
                <div class="grid grid-cols-3 gap-4 mt-2">
                    <select name="month" id="month" class="bg-background rounded-md border-gray-700">
                        @for ($i = 1; $i <= 12; $i++)
                            <option>{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                        @endfor
                    </select>
                    <x-text-input name="day" type="number" placeholder="Date" />
                    <x-text-input name="year" type="text" placeholder="Year" />
                </div>
            </div>
            <div class="mt-4">
                <x-input-label>Description About this template</x-input-label>
                <div class="bg-background p-5 rounded-md border border-gray-700 mt-2 h-[56vh] overflow-y-auto">
                    {{ $template->description }}
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <x-form.buttons.primary-button>Submit</x-form.buttons.primary-button>
            </div>
        </form>
    </x-panel>
</x-app-layout>
