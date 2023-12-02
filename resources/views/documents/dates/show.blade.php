<x-app-layout>
     <x-slot name="sidebar">
          <x-documents.sidebar :barangay="$barangay" />
     </x-slot>
     <x-slot name="header">
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
          {{ date('F d, Y', strtotime($document->date)) }}
     </x-slot>
     <div class="px-8 h-full">
          <div class="text-lg font-bold">Description</div>
          <div class="p-5 bg-background-light rounded text-justify mt-2 h-1/3">
               {{ $template->description }}
          </div>
          <div class="text-lg font-bold mt-4">History</div>
          <div class="flex flex-col"></div>
     </div>
</x-app-layout>