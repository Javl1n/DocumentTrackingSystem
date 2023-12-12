<x-app-layout :hasSidebar="$myDocument">
     <x-slot name="sidebar">
          <livewire:templates-sidebar-search :barangay="$barangay"  />

     </x-slot>
     <x-slot name="header">
          <div class="flex justify-between w-full">
               <div>
                    @if ($myDocument)
                         <span class="font-light text-gray-500">
                              <a href="{{ route('documents.index', $barangay->slug) }}">
                              {{ $barangay->name }}
                              </a>
                              /
                              <a href="{{ route('documents.dates.index', ['barangay' => $barangay->slug, 'template' => $template->slug]) }}">
                              {{ $template->name }}
                              </a>
                              /
                         </span>
                    @else
                         <span class="font-light text-gray-500">
                              {{ $barangay->name }}
                              /
                              {{ $template->name }}
                              /
                         </span>
                    @endif
                    {{ date('F d, Y', strtotime($document->date)) }}
               </div>
               <div class="flex flex-row-reverse gap-2">
                    {{-- <a href="{{ route('download', $document->file->id) }}?fileName={{ "$template->slug-($document->date)" }}"
                         class="bg-secondary rounded-md p-2 text-lg text-center hover:bg-primary w-28">
                         Download
                    </a> --}}
                    @if ($myDocument)
                         @bhw
                              <a 
                                   href="{{ route('documents.dates.edit', [ 'barangay' => $barangay->slug, 'template' => $template->slug, 'date' => $document->date ]) }}" 
                                   class="bg-secondary rounded-md p-2 text-lg text-center hover:bg-primary w-28"
                              >
                                   Edit
                              </a>
                              @if($document->request === null)
                                   <a
                                        href="{{ route('dates.request.store', [ 'barangay' => $barangay->slug, 'template' => $template->slug, 'date' => $document->date ]) }}" 
                                        class="bg-secondary rounded-md p-2 text-lg text-center hover:bg-primary w-28"
                                   >
                                        Delete
                                   </a>
                              @else
                                   <div 
                                        class="rounded-md p-2 text-sm text-center bg-primary w-28"
                                   >
                                        Request Sent
                                   </div>
                              @endif
                         @endbhw
                         @cho
                              @if($document->request !== null)
                                   <form method="POST" action="{{ route('dates.destroy', [ 'barangay' => $barangay->slug, 'template' => $template->slug, 'date' => $document->date ]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                             href="{{ route('dates.request.store', [ 'barangay' => $barangay->slug, 'template' => $template->slug, 'date' => $document->date ]) }}" 
                                             class="bg-secondary rounded-md p-2 text-lg text-center hover:bg-primary w-28"
                                        >
                                             Delete
                                        </button>
                                   </form>
                              @endif
                         @endcho
                         
                         <a 
                              href="{{ route('dates.access.edit', [ 'barangay' => $barangay->slug, 'template' => $template->slug, 'date' => $document->date ]) }}" 
                              class="bg-secondary rounded-md p-2 text-lg text-center hover:bg-primary w-28"
                         >
                              Access
                         </a>
                    @endif

                    
               </div>
          </div>
     </x-slot>
     <div class="px-8 h-full">
          <div class="">
               <div class="text-lg font-bold">Description</div>
               <div class="p-5 bg-background-light rounded text-justify mt-2 h-96 overflow-y-auto">
                    {{ $template->description }}
               </div>
          </div>
          <div class="mt-4 flex-1">
               <div class="text-lg font-bold mt-4 grid grid-cols-12">
                    <div class="col-span-11 pt-2">Edit History</div>
                    
               </div>
               <div class="mt-4 flex flex-col h-96 overflow-y-auto">
                    @foreach ($histories as $history)
                         <div class="w-full bg-background-light mb-4 px-4 py-3 rounded-lg">
                              <div class="flex justify-between">
                                   <div class="text-lg text-text mb-0 leading-5">
                                        {{ date('F d, Y h:m a', strtotime($history->created_at)) }}
                                        <span class="text-gray-500 text-sm mt-0">{{ $history->created_at->diffForHumans() }} <br> {{ $history->editor->name }}</span>
                                   </div>
                                   <a href="{{ route('download', $history->file->id) }}?fileName={{ "$template->slug-($document->date)-v$history->version" }}"
                                   class="bg-secondary rounded-md p-2 text-lg text-center hover:bg-primary w-28">
                                   Download
                              </a>
                              </div>
                              <p class="indent-5 text-xl my-5">  
                                   {{ $history->description }}
                              </p>
                              
                         </div>
                    @endforeach
               </div>
               
          </div>
     </div>
</x-app-layout>
