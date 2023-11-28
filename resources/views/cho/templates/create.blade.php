<x-app-layout :sidebar="false">
    <x-slot name="header">
        <div class="flex justify-between max-w-4xl mx-auto">
            {{ __('Create Template') }}
        </div>
    </x-slot>

    <x-panel class="flex-auto w-2/4 mx-auto">
        <form action="/cho/templates" method="post" enctype="multipart/form-data" class="flex flex-col h-full">
            @csrf
            <x-form.text-input-group name="title" type="text" />
            <x-form.text-input-group name="cycle" type="number" label="Update Cycle" placeholder="1-12" />
            <x-form.text-input-group name="link" type="file" label="File" />
            <div class="mt-4 flex-1">
                <x-input-label for="description" :value="__('Description')" />
                <x-textarea-input name="description" placeholder="Tell us more about this template..."></x-textarea-input>              
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="flex justify-end">
                <x-form.buttons.primary-button class="mt-10">
                    {{ __('Submit') }}
                </x-form.buttons.primary-button>
            </div>
        </form>
    </x-panel>
</x-app-layout>
