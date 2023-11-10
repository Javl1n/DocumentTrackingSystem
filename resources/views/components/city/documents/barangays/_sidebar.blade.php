<aside class="w-1/4 p-7 border-r border-gray-600  text-white">
    <div class=" h-[87vh] overflow-y-auto">
        <ul class="mt-2 text-lg">
            @foreach($barangays as $barangay)
                <li class="p-2">
                    <a href="cho/{{ $barangay->slug }}">{{ $barangay->name }}</a>
                </li>
            @endforeach
        </ul>        
    </div>
</aside>
