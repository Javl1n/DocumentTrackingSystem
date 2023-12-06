<x-app-layout :sidebar="false">
     <x-slot name="header">
     <div class="w-2/4 mx-auto ps-5">
               <span class="font-light text-gray-500">
                    {{ $document->barangay->name }} / {{ $document->template->name }} /
               </span>
               <a class="hover:text-primary" 
                    href="{{ route('documents.dates.show', ['barangay' => $document->barangay->slug, 'template' => $document->template->slug, 'date' => $date->date ]) }}">{{ date('F d, Y', strtotime($date->date)) }}</a> - ACCESS
     </div>
     </x-slot>

     <x-panel class="flex-auto w-2/4 mx-auto h-full">
          <p class="">file link to share: <span class="font-bold">{{ route('documents.dates.show', ['barangay' => $document->barangay->slug, 'template' => $document->template->slug, 'date' => $date->date ]) }}</span></p>
          <p class="my-4">Check who can access this file: </p>
          <form action="" method="post" enctype="multipart/form-data">
               @csrf
               @method('PUT')

               <div class="flex flex-col h-[75vh]">
                    <div class="flex-1 overflow-y-auto rounded-md">
                         @foreach($date->canAccess as $worker)
                              <div class="flex bg-background w-full mb-2 p-5 rounded-md">
                                   <input name="users[]" type="checkbox" value="{{ $worker->hasAccess->id }}" class="my-auto h-10 w-10 rounded-md me-5 bg-gray-700 border-none" checked>
                                   <div>
                                        <span class="font-bold text-lg leading-5">{{ $worker->hasAccess->user->name }}</span> <br> <span class="text-sm text-gray-600">{{ $worker->hasAccess->user->email }}</span>
                                   </div>
                              </div>
                         @endforeach
                         @foreach($users as $worker)
                              <div class="flex bg-background w-full mb-2 p-5 rounded-md">
                                   <input name="users[]" type="checkbox" value="{{ $worker->id }}" class="my-auto h-10 w-10 rounded-md me-5 bg-gray-700 border-none">
                                   <div>
                                        <span class="font-bold text-lg leading-5">{{ $worker->user->name }}</span> <br> <span class="text-sm text-gray-600">{{ $worker->user->email }}</span>
                                   </div>
                              </div>
                         @endforeach
                    </div>
                    <div class="flex justify-end mt-6">
                         <x-form.buttons.primary-button>Submit</x-form.buttons.primary-button>
                    </div>
               </div>
          </form>
     </x-panel>
</x-app-layout>
