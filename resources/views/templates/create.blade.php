<x-app-layout :sidebar="false">
    <x-slot name="header">
        <div class="flex justify-between max-w-4xl mx-auto">
            {{ __('Create Template') }}
        </div>
    </x-slot>

    <x-panel class="flex-auto w-2/4 mx-auto">
        <form action="" method="post" enctype="multipart/form-data">
            <x-form.text-input-group name="title" type="text" />
            <x-form.text-input-group name="cycle" type="number" label="Update Cycle" />
            <x-form.text-input-group name="cycle" type="file" label="Update Cycle" />
        </form>
    </x-panel>
</x-app-layout>
