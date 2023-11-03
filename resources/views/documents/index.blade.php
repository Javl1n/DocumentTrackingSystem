<x-app-layout>
    <x-slot name="header">
        {{ __('Documents') }}
    </x-slot>
    <x-panel>
        <table class="table-auto w-full">
            <thead>
              <tr class="border-b border-gray-50">
                <th class="pb-3">Song</th>
                <th class="pb-3">Artist</th>
                <th class="pb-3">Year</th>
              </tr>
            </thead>
            <tbody>
              @foreach($documents as $document)
                <tr class="border-b border-gray-500">
                    <td class="py-4">The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                    <td class="py-4">Malcolm Lockyer</td>
                    <td class="py-4 text-center">1961</td>
                </tr>
              @endforeach
            </tbody>
            {{ $documents->links() }}
        </table>
    </x-panel>
</x-app-layout>
