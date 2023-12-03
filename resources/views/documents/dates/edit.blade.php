<x-app-layout :sidebar="false">
     <x-slot name="header">
     <div class="w-2/4 mx-auto ps-5">
               <span class="font-light text-gray-500">
                    {{ $document->barangay->name }} / {{ $template->name }} /
               </span>
               <a class="hover:text-primary" href="{{ route('documents.dates.show', ['barangay' => $document->barangay->slug, 'template' => $template->slug, 'date' => $date->date ]) }}">{{ date('F d, Y', strtotime($date->date)) }}</a> - EDIT
     </div>
     </x-slot>

     <x-panel class="flex-auto w-2/4 mx-auto">
     <form action="{{ route('documents.dates.update', $date) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <x-text-input name="file" value="{{ $file }}" type="hidden" />
          <x-input-label for="link" value="Link" class="" />
          <div class="flex">
               <div class="flex-1 me-4">
                    {{-- <x-form.text-input-group name="link" type="file" label="File" /> --}}
                    <x-text-input 
                         id="link" 
                         class="block mt-1 w-full p-2" 
                         type="file"
                         name="link" 
                         {{-- :value="old('link')"  --}}
                         placeholder=""
                         required 
                         autofocus />
               </div>
               <x-form.buttons.primary-link 
                    class="h-23 mt-2 mb-1 dark:hover:bg-secondary dark:hover:text-text" 
                    :href=" route('download', $date->file->id) . '?fileName=' . $file"
               >
                    Download Document
               </x-form.buttons.primary-link >
          </div>
          <x-input-error :messages="$errors->get('link')" class="mt-2" />
          <div class="text-sm text-gray-500 mt-2 mb-10">The file you upload must be in the format of: <span class="font-bold text-primary">{{ $template->slug . '-(' . $date->date . ').xlsx' }}</span> . Once you reuploaded the document, it can never be undone. Be careful.</div>
          
          
               {{-- <x-input-label>Description about your changes</x-input-label>
               <div class="bg-background p-5 rounded-md border border-gray-700 mt-2 h-[56vh] overflow-y-auto">
                    {{ $template->description }}
               </div> --}}
          <x-form.textarea-group height="[56vh]" name="description" label="Description" placeholder="Description about your changes...(15 characters minimum)"></x-form.textarea-group>
          
          <div class="flex justify-end mt-6">
               <x-form.buttons.primary-button>Submit</x-form.buttons.primary-button>
          </div>
     </form>
     </x-panel>
</x-app-layout>
